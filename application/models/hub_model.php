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
}
?>
