<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hublogin extends CI_Controller
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
        $data = null;
        if (!empty($_SESSION['user_data'])) {
            $data['email'] = $_SESSION['user_data']['email'];
            $data['pass'] = $_SESSION['user_data']['pass'];
            $_SESSION = array();
            session_destroy();
        }

        //ヘルパー呼び出し
        $this->load->helper(array('form', 'url'));

        //ライブラリ呼び出し
        $this->load->library('form_validation');

        //バリデーション設定
        $this->form_validation->set_rules('email', 'メールアドレス', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'パスワード', 'trim|required|min_length[4]');
        //エラーメッセージの基本形設定
        $this->form_validation->set_message('required', '%sが入力されていません。');

        if ($this->form_validation->run() == FALSE) {
            //初回読み込み、またはエラー時のview呼び出し
            $this->load->view('hublogin_view');
        } else {
            // postの受け取り
            $mail = $this->input->post('email', true);
            $password = $this->input->post('pass', true);
            // post情報を配列に格納
            $data = [
                'email' => $mail,
                'pass' => $password,
            ];

            // Modelsディレクトリーの_modelにアクセス
            $this->load->model('hub_model');
            $data = $this->hub_model->get_by_mail($mail);

            $_SESSION['user_data'] = $data;
            $_SESSION['id'] = $data['id'];
            
            // $this->load->view('toppage_view', $data);
            header('location: http://localhost/Hub/dashboard/');
            exit;
        }
    }
}