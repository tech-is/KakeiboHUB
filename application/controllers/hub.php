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
            header("location: http://localhost/Hub/setting");
            exit;
		} else {
            $this->load->model('hub_model');
            $this->hub_model->update($id,$array);
            $data['array'] = $this->hub_model->update_setting($id);
            $this->load->view('setting_view',$data);
            header("location: http://localhost/Hub/setting");
            exit;
        }
    }
}

?>
