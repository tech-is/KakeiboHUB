<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hub extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->library('session');
        $this->load->model('hub_model');
        date_default_timezone_set('Asia/Tokyo');
    }

    public function index()
    {
        
    }

    public function add()
    {
        // postの受け取り
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

        // バリデーション
        $this->load->helper(array('form', 'url'));
		
        $this->load->library('form_validation');

		if ($this->form_validation->run('hub') == FALSE)
		{
            $this->load->view('header_view.php');
            $this->load->view('setting_view');
		} else {

        // 空の場合エラーメッセージを表示する
        // if($income == ""){
        //     $data['error_income'] = [
        //     "income" => "収入を入力してください"
        //     ];
        // }
        // if($food_cost == ""){
        //     $data['error_food_cost'] = [
        //     "food_cost" => "食費を入力してください"
        //     ];
        // }
        // $this->load->model('bbs_model');
        // // 配列として返ってきた結果を$dataに格納する
        // $data['array_inf'] = $this->bbs_model->bbs_get();
        // // $dataを第2引数にいれviewに送る
        // $this->load->view('bbs_view',$data);

        // XSS フィルタリング
        $income = $this->security->xss_clean($income);
        $food_cost = $this->security->xss_clean($food_cost);
        $utility_cost = $this->security->xss_clean($utility_cost);
        $rent = $this->security->xss_clean($rent);
        $etc = $this->security->xss_clean($etc);
        $budget = $this->security->xss_clean($budget);
        $name = $this->security->xss_clean($name);
        $age = $this->security->xss_clean($age);
        $from = $this->security->xss_clean($from);
        $job = $this->security->xss_clean($job);

        // post情報を配列に格納
        $data = [
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
        ];

        // Modelsディレクトリーのhub_modelにアクセス
        $this->load->model('hub_model');
        // hub_modelのhub_addメソッドにアクセスしpost情報を渡す
        $this->hub_model->hub_add($data);
        // redirect機能を使うためにhelper(url)を呼び出す
        // $this->load->helper('url');
        // redirect('http://localhost/Hub/setting/');
        header('location: http://localhost/Hub/setting/');
        exit;
    }
    }

    public function setting()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->view('header_view.php');
        $this->load->view('setting_view');
    }

}

?>
