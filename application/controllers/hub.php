<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hub extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data = null;
        //セッション破棄
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
            $this->load->view('hub_view', $data);
        } else {
            $mail = $this->input->post('email', true);
            $password = $this->input->post('pass', true);

            //メールの重複チェック
            //$mailcheck = $this->hub_model->get_by_mail($mail);


            // post情報を配列に格納
            $data = [
                'email' => $mail,
                'pass' => $password,
            ];

            $_SESSION['user_data'] = $data;
            $this->load->view('hubconfirm_view', $data);
        }
    }

    //登録
    public function register()
    {
        if (!empty($_SESSION['user_data'])) {
            $_SESSION = array();
            session_destroy();
        }
        $mail = $this->input->post('email', true);
        $password = $this->input->post('pass', true);
        $url = site_url('hublogin');

        // post情報を配列に格納
        $data = [
            'mail' => $mail,
            'pass' => $password,
        ];
        $this->load->model('hub_model');
        $this->hub_model->add($data);
        $this->load->helper('phpmailer');
        phpmailer_send($mail, $password, $url);
        $this->load->view('hubsuccess_view');
    }

    public function aaaa()
    {
        $this->load->view('techis');
    }


}
