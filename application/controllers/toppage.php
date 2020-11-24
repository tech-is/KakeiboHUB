<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Toppage extends CI_Controller
{
    public function index()
    {
        $this->load->view('toppage_view');
    }
}
