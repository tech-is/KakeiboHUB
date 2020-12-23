<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hub extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('hub_model');
        date_default_timezone_set('Asia/Tokyo');
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
            $this->load->view('hub_register', $data);
        } else {
            $mail = $this->input->post('email', true);
            $password = $this->input->post('pass', true);

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
        $id = $this->hub_model->add($data);
        $_SESSION['id'] = $id;
        $this->load->helper('phpmailer');
        phpmailer_send($mail, $password, $url);
        $this->load->view('hubsuccess_view');
    }

    public function dashboard() {
        //$id = $this->input->get('id');
        $id = $_SESSION['id'];
        $data['array'] = $this->hub_model->update_setting($id);
        $this->load->helper(array('form', 'url'));
        $this->load->view('hub_view',$data);
    }

    public function chat() {
        $id = $_SESSION['id'];
        $data['array'] = $this->hub_model->update_setting($id);
        $data['array_inf'] = $this->hub_model->chat_get();
        $this->load->helper(array('form', 'url'));
        $this->load->view('chat_view',$data);
    }

    public function chat_add()
    {
    // postの受け取り
    $user_id = $this->input->post('user_id');
    $chat_name = $this->input->post('chat_name');
    $message = $this->input->post('message');
    // 空の場合エラーメッセージを表示する
    if($message == ""){
        if($message == ""){
            $data['error_message'] = [
            "message" => "メッセージを入力してください！"
            ];
        }
    }
    // XSS フィルタリング
    $user_id = $this->security->xss_clean($user_id);
    $chat_name = $this->security->xss_clean($chat_name);
    $message = $this->security->xss_clean($message);
    // post情報を配列に格納
    $data = [
    'user_id' => $user_id,
    'chat_name' => $chat_name,
    'message' => $message
    ];
    // bbs_modelのbbs_addメソッドにアクセスしpost情報を渡す
    $this->hub_model->chat_add($data);
    $this->load->view('Chat_view',$data);
    header("location: http://localhost/KakeiboHUB/hub/chat");
    exit;
    }

    public function setting()
    {
        //$id = $this->input->get('id');
        $id = $_SESSION['id'];
        $data['array'] = $this->hub_model->update_setting($id);
        $this->load->helper(array('form', 'url'));
        $this->load->view('setting_view',$data);
    }

    public function update()
    {
        $income = $this->input->post('income');
        $food_cost = $this->input->post('food_cost');
        $utility_cost = $this->input->post('utility_cost');

        $rent = $this->input->post('rent');
        $etc = $this->input->post('etc');
        $budget = $this->input->post('budget');
        $name = $this->input->post('name');
        $age = $this->input->post('age');
        $from = $this->input->post('from');
        $job = $this->input->post('job');
        $id = $this->input->post('id',true);
        
        $array = array(
            'income' => $income,
            'food_cost' => $food_cost,
            'utility_cost' => $utility_cost,
            'rent' => $rent,
            'etc' => $etc,
            'budget' => $budget,
            'name' => $name,
            'age' => $age,
            'from' => $from,
            'job' => $job
        );

        // バリデーション
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		if (!$this->form_validation->run('hub'))
		{
            header("location: http://localhost/KakeiboHUB/hub/setting");
            exit;
		} else {
            $this->load->model('hub_model');
            $this->hub_model->update($id,$array);
            $data['array'] = $this->hub_model->update_setting($id);
            $this->load->view('setting_view',$data);
            header("location: http://localhost/KakeiboHUB/hub/setting");
            exit;
        }
    }

    public function history()
    {
        $this->load->view('history_view.php');
    }

    public function Post()
    {
        $this->load->view('pay_view.php');
    }

    public function add() 
    {
        $this->load->helper('url');
        // postの受け取り
        $cost = $this->input->post('cost');
        $private_cost = $this->input->post('private_cost');
        // XSS フィルタリング
    $user_id = $this->security->xss_clean($user_id);
    $chat_name = $this->security->xss_clean($chat_name);
    $message = $this->security->xss_clean($message);
        // post情報を配列に格納
        $data= [
            'cost'         => $cost,
            'private_cost' => $private_cost,
            'created_at'   => date('Y-m-d H:i:s')
        ];

        // Modelsディレクトリーのbbs_modelにアクセス
        $this->load->model('hub_model');
        // bbs_modelのbbs_addメソッドにアクセスしpost情報を渡す
        $this->hub_model->hub_add($data);
        // redirect機能を使うためにhelper(url)を呼び出す

        redirect('http://localhost/KakeiboHUB/hub/post');

    }

    public function logout()
    {
        if (!empty($_SESSION['user_data'])) {
            session_destroy();
        }
        header('location: http://localhost/KakeiboHUB/hublogin');
        exit();
    }
}

?>
