<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function view($content, $data = NULL)
	{
        if ( ! $content)
        {
            return NULL;
        }  else  {
            $this->template['header']          = $this->ci->load->view('_template/header', $data, TRUE);
            $this->template['navbar']     = $this->ci->load->view('_template/navbar', $data, TRUE);
            $this->template['left_sidebar']     = $this->ci->load->view('_template/left_sidebar', $data, TRUE);
            $this->template['content']         = $this->ci->load->view($content, $data, TRUE);
            $this->template['right_sidebar']     = $this->ci->load->view('_template/right_sidebar', $data, TRUE);
            $this->template['footer']          = $this->ci->load->view('_template/footer', $data, TRUE);

            return $this->ci->load->view('_template/template', $this->template);
        }
	}
	public function pagination_list()
    {
       $config['first_link']       = '<<';
        $config['last_link']        = '>>';
        $config['next_link']        = '>';
        $config['prev_link']        = '<';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center pagination-sm">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        return $config;
    }
}