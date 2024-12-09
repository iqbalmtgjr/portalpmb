<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('captcha');
        $this->load->model('pengguna');

        if (!empty($this->session->userdata('email_simkeu'))) {
            redirect('dispensasi/index');
        }
    }


    public function index()
    {

        $data = array(
            //	'title' => 'Login', 

        );
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required');

        $values = array(
            'word_length' => 4,
            'img_path' => './assets/images/captcha/',
            'img_url' => base_url() . 'assets/images/captcha/',
            'font_path' => FCPATH . 'system/fonts/texb.ttf',
            'img_width' => '120',
            'img_height' => 50,
            'expiration' => 7200,
            'pool'          => '0123456789'
        );

        $data['cap'] = create_captcha($values);

        $data1 = array(
            'captcha_time'  => $data['cap']['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $data['cap']['word'],
            'file'          => $data['cap']['filename']
        );

        $query = $this->db->insert_string('captcha', $data1);
        $this->db->query($query);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login', $data);
        } else {
            // First, delete old captchas
            $expiration = time() - 120; // Two hour limit
            $quer = $this->db->get_where('captcha', array('captcha_time < ' => $expiration))->result();
            foreach ($quer as $bah) {
                @unlink('assets/images/captcha/' . $bah->file);
            }

            $this->db->where('captcha_time < ', $expiration)
                ->delete('captcha');

            // Then see if a captcha exists:
            $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
            $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();

            if ($row->count == 0) {
                // set error alert
                $this->session->set_flashdata('salah', '<small class="text-danger">Angka yang anda masukkan salah.</small>');
                redirect('main/index');
            }

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // get data account		

            $account = $this->pengguna->set_akun($email);

            if ($account->status == '1') {
                // set error alert
                $this->session->set_flashdata('pesan', '<div class="text-danger text-center">Akun anda telah dinonaktifkan.</div');
                redirect('main/index');
            }
            // authentifaction dengan password verify
            if (password_verify($password, $account->password)) {
                // set session data
                $this->_set_account_login($account);
                $this->pengguna->updateLoginTime($account->pengguna_id);
                // if session destroy in other page
                if ($this->input->get('from_url') != '') {
                    redirect($this->input->get('from_url'));
                } else {
                    redirect('beranda/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="text-danger text-center">Email atau password anda salah.</div');
                redirect('main/index');
            }
        }
    }

    public function captcha_refresh()
    {

        $values = array(

            'word_length' => 4,
            'img_path' => './assets/images/captcha/',
            'img_url' => base_url() . 'assets/images/captcha/',
            'font_path' => FCPATH . 'system/fonts/texb.ttf',
            'img_width' => '120',
            'img_height' => 50,
            'expiration' => 7200,
            'pool'          => '0123456789'
        );

        $data['cap'] = create_captcha($values);
        $data1 = array(
            'captcha_time'  => $data['cap']['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $data['cap']['word']
        );

        $query = $this->db->insert_string('captcha', $data1);
        $this->db->query($query);


        echo $data['cap']['image'];
    }

    /**
     * Take a data administrator account
     *
     * @param String (username)
     * @access private
     * @return Object
     **/
    private function _get_account($param = 0)
    {
        // get query prepare statmennts
        $query = $this->db->query("
			SELECT * FROM pengguna WHERE email = ?", array($param));

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            // hilangkan error object
            return (object) array('password' => '');
        }
    }

    /**
     * Membuat sesi login
	 
     **/
    private function _set_account_login($account)
    {

        // set session data

        $account_session = array(
            'pengguna_id_simkeu' => $account->pengguna_id,
            'unit_pengguna_simkeu' => $account->unit_pengguna,
            'email_simkeu' => $account->email,
            'nama_simkeu' => $account->nama,
            'pangkat_simkeu' => $account->pangkat,
            'status_simkeu' => $account->status,
            'foto_simkeu' => $account->foto,
            'apli' => $account->apli,
            'last_login_simkeu' => $account->last_login
        );
        $this->session->set_userdata($account_session);
    }


    public function lupa()
    {


        $data = array(
            //	'title' => 'Login', 

        );
        $this->form_validation->set_rules(
            'email1',
            'Email',
            'required|valid_email'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan', '<div class="text-danger text-center">Email atau password anda salah.</div');
            redirect('main/index');
        } else {
            $email = $this->input->post('email1');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->pengguna->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('pesan', '<span class="text-danger">Kami tidak menemukan email anda</span>');
                redirect('main/index');
            }

            //build token 

            $token = $this->pengguna->insertToken($userInfo->pengguna_id);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . 'main/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';
            $message = '';
            $message .= '<strong>Anda melakukan permintaan penggantian password pada akun dakjaya.desa.id</strong><br>';
            $message .= '<strong>Silahkan klik:</strong> ' . $link . ' untuk proses lebih lanjut';
            $this->load->library('email');
            $ci = get_instance();
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://srv40.niagahoster.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "admin@dakjaya.desa.id";
            $config['smtp_pass'] = "e=]Qi)vopMro";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            $ci->email->initialize($config);
            $ci->email->from('admin@dakjaya.desa.id', 'Admin Dak Jaya');
            $list = $this->input->post('email1');
            $ci->email->to($list);
            $ci->email->subject('Penggantian Password dakjaya.desa.id');
            $ci->email->message($message);
            if ($this->email->send()) {
                $this->session->set_flashdata('pesan', '<div class="text-success text-center">Link penggantian password sudah dikirim ke email anda.</div');
                redirect('main/index');
            } else {
                $this->session->set_flashdata('pesan', '<div class="text-danger text-center">Pengiriman email gagal.</div');
                redirect('main/index');
            }
        }
    }
    public function reset_password()
    {

        $data = array(
            //'title' => 'Login', 

        );
        $token = $this->base64url_decode($this->uri->segment(4));

        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->pengguna->isTokenValid($cleanToken); //either false or array();               

        if (!$user_info) {
            $this->session->set_flashdata('pesan', 'Token tidak sah atau kadaluarsa');
            redirect('main/index');
        }
        $data = array(
            'nama' => $user_info['nama'],
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required'      => '%s harus diisi!',
            )
        );
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|matches[password]',
            array(
                'required'      => '%s harus diisi!',
                'matches' => '%s tidak sama',
            )
        );

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('lupa', $data);
        } else {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $cleanPost['password'] = password_hash($cleanPost['password'], PASSWORD_DEFAULT);
            $cleanPost['pengguna_id'] = $user_info['pengguna_id'];
            unset($cleanPost['passconf']);

            if (!$this->pengguna->updatePassword($cleanPost)) {
                $this->session->set_flashdata('pesan', '<small class="text-danger">Penggantian password gagal</small>');
                redirect(site_url() . 'main/index');
            } else {
                $this->pengguna->batalToken($user_info['id']);
                $this->session->set_flashdata('pesan', '<small class="text-white">Password anda telah diganti, silahkan masuk!!!</small>');
                redirect(site_url() . 'main/index');
            }
        }
    }
    /**
     * Sign Out session Destroy
     *
     * @return Void (destroy session)
     **/

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}

/* End of file Login.php */
/* Location: ./application/modules/Admin/controllers/Login.php */