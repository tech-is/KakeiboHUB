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
        $data['array_inf'] = $this->hub_model->dashboard_get();
        $this->load->helper(array('form', 'url'));
        $name = $data['array'][0]['name'];
        if($name == ""){
        header("location: http://localhost/KakeiboHUB/hub/first");
        exit;
        }else{
            $this->load->view('hub_view',$data);
        }
    }
    
    public function pay()
    {
        $id = $_SESSION['id'];
        $data['array'] = $this->hub_model->update_setting($id);
        $this->load->helper(array('form', 'url'));
        $this->load->view('pay_view',$data);
    }
    
    public function pay_add() 
    {
        $this->load->helper('url');
        // postの受け取り
        $pay_id = $this->input->post('pay_id');
        $cost = $this->input->post('cost');
        $private_cost = $this->input->post('private_cost');
        // 空の場合エラーメッセージを表示する
        if($cost == "" | $private_cost == ""){
            $data = [
                'error' => '※金額と何に使ったかはっきりしてください！',
            ];
            $id = $_SESSION['id'];
            $data['array'] = $this->hub_model->update_setting($id);
            $this->load->helper(array('form', 'url'));
            $this->load->view('pay_view',$data);
        }else{
        // XSS フィルタリング
        $pay_id = $this->security->xss_clean($pay_id);
        $cost = $this->security->xss_clean($cost);
        $private_cost = $this->security->xss_clean($private_cost);
        // post情報を配列に格納
        $data= [
            'pay_id'       => $pay_id,
            'cost'         => $cost,
            'private_cost' => $private_cost
            // 'created_at'   => date('Y-m-d H:i:s')
        ];
        // bbs_modelのbbs_addメソッドにアクセスしpost情報を渡す
        $this->hub_model->pay_add($data);
        $this->load->view('pay_view',$data);
        header("location: http://localhost/KakeiboHUB/hub/pay");
        exit;
        }
    }
    
    public function history()
    {
        $id = $_SESSION['id'];
        $data['array'] = $this->hub_model->update_setting($id);
        $data['array_inf'] = $this->hub_model->pay_get($id);
        $this->load->helper(array('form', 'url'));
        $this->load->view('history_view',$data);
    }

    public function history_delete()
    {
        $delete_num = $this->input->get('num',true);
        $this->hub_model->pay_delete($delete_num);
        header("location: http://localhost/KakeiboHUB/hub/history");
        exit;
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

    public function first()
    {
        $id = $_SESSION['id'];
        $data['array'] = $this->hub_model->update_setting($id);
        $this->load->helper(array('form', 'url'));
        $this->load->view('first_view',$data);
    }

    public function first_add()
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
            header("location: http://localhost/KakeiboHUB/hub/first");
            exit;
		} else {
            $this->load->model('hub_model');
            $this->hub_model->update($id,$array);
            $data['array'] = $this->hub_model->update_setting($id);
            $this->load->view('setting_view',$data);
            header("location: http://localhost/KakeiboHUB/hub/dashboard");
            exit;
        }
    }

    public function logout()
    {
        if (!empty($_SESSION['user_data'])) {
            session_destroy();
        }
        header('location: http://localhost/KakeiboHUB/');
        exit();
    }
}

?>
