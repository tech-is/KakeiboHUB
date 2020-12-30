<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hub_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //新規登録
    public function add($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    // mail password 確認
    public function get_login($mail, $password)
    {
        $query = $this->db->get_where('user', array('mail' => $mail, 'pass' => $password));
        return $query->row_array();
    }

    //メールアドレスが登録されているか
    public function get_by_mail($mail)
    {
        return $this->db->where('mail', $mail)
            ->get('user')
            ->row_array();
    }

    //パスワード再設定
    public function reset($mail, $password)
    {
        return $this->db->where('mail', $mail)
            ->update('user', ['pass' => $password]);
    }

    // 設定画面dbから取得
    public function update_setting($id)
    {
        // $query = $this->db->where('id', $id);
        $query = $this->db->get_where('user', array('id' => $id));
        // $result = $query->result('array');↓
        $result = $query->result_array();
        return $result;
    }

    // 設定画面db変更
    public function update($id,$array)
    {
        $this->db->where('id', $id);
        $this->db->set($array);
        $this->db->update('user', $array);
    }

    // payデータ取り出す
    public function dashboard_get()
    {
        // $query = $this->db->order_by('post_id','DESC');
        // $query = $this->db->get_where('pay', array('delete_flag' => 0));
        // // 結果を配列として返す
        // $result = $query->result_array();
        // return $result;
    }

    // チャットへ格納
    public function chat_add($data)
    {
    $this->db->insert('chat',$data);
    }

    // チャットデータ取り出す
    public function chat_get()
    {
    // idの降順に要素を取り出す
    $query = $this->db->order_by('chat_id','DESC');
    // table名chatから取得
    $query = $this->db->get('chat');
    // 結果を配列として返す
    $result = $query->result('array');
    return $result;
    }

    // 配列に入れた情報をDBに格納する
    public function pay_add($data)
    {
        $this->db->insert('pay',$data);
    }

    // payデータ取り出す
    public function pay_get($id)
    {
        // delete_flagが0のもののみを取り出す
        // $query = $this->db->where('delete_flag',0);
        // table名payから取得
        // $query = $this->db->get('pay');
        // $idとpay_idが同じものをpayテーブルから取り出す
        $query = $this->db->get_where('pay', array('pay_id' => $id ,'delete_flag' => 0));
        // 結果を配列として返す
        $result = $query->result_array();
        return $result;
    }

    public function pay_delete($data)
    {
    $this->db->where('post_id',$data);
    $this->db->update('pay',array('delete_flag' => 1));
    }


}

?>
