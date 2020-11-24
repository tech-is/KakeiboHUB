<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Passreset extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->library('session');
        date_default_timezone_set('Asia/Tokyo');
    }

    public function index()
    {
        //ヘルパー呼び出し
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        //バリデーション設定
        $this->form_validation->set_rules('email', 'メールアドレス', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'パスワード', 'trim|required|min_length[4]');
        //エラーメッセージの基本形設定
        $this->form_validation->set_message('required', '%sが入力されていません。');

        //バリデーション失敗ならそのまま
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('passreset_view');
            return;
        }

        // postの受け取り
        $mail = $this->input->post('email', true);
        $name = $this->input->post('name', true);
        $password = $this->input->post('pass', true);

        // Modelsディレクトリーの_modelにアクセス
        $this->load->model('hub_model');
        $data = $this->hub_model->get_by_mail($mail);

        //二ックネームが確認して正しければ
        //  if ($name != $data['name']) {
        //     $data = null;
        //     $data['error_message'] = 'xxx';
        //     $this->load->view('passreset_view', $data);
        //     return;
        //}

        $result = $this->hub_model->reset($mail, $password);
        if (!$result) {
            echo 'error';
        }

        // passwordを変える処理
        // // post情報を配列に格納
        // $data = [
        //     'email' => $mail,
        //     'password' => $password,
        // ];
        $this->load->view('resetOK_view');
    }
}
