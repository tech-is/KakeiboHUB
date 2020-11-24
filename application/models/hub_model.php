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
    }

    //重複確認

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

    // 配列に入れた情報をDBに格納する
    public function hub_add($data)
    {
        $this->db->insert('user',$data);
    }
    
}
?>
