<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pay extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Tokyo');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('pay_view');
    }

    public function add() 
    {
        $this->load->helper('url');
        // postの受け取り
        $cost = $this->input->post('cost');
        $cost_name = $this->input->post('cost_name');
        // post情報を配列に格納
        $data= [
            'cost'         => $cost,
            'private_cost' => $cost_name,
            'created_at'   => date('Y-m-d H:i:s')
        ];

        // Modelsディレクトリーのbbs_modelにアクセス
        $this->load->model('hubhistory_model');
        // bbs_modelのbbs_addメソッドにアクセスしpost情報を渡す
        $this->hub_model->hub_add($data);
        // redirect機能を使うためにhelper(url)を呼び出す

        redirect('http://localhost/KakeiboHUB/hub/post');
    }

}

?>