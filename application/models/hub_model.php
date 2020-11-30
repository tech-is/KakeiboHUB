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

    // public function dashboard_get()
    // {
    //     $query = $this->db->select('id,mail,name, budget, name, from');
    //     $query = $this->db->get('member');
    //     $result = $query->result('array');
    //     return $result;
    // }

    public function update_setting($id)
    {
        // $query = $this->db->where('id', $id);
        // $query = $this->db->select('id,income,food_cost,utility_cost,rent,etc, budget, name, age,from,job');
        $query = $this->db->get_where('user', array('id' => $id));
        // $result = $query->result('array');
        $result = $query->result_array();
        return $result;
    }

    public function update($id,$array)
    {
        $this->db->where('id', $id);
        $this->db->select('id,income,food_cost,utility_cost,rent,etc, budget, name, age,from,job');
        $this->db->set($array);
        $this->db->update('user', $array);
    }
}
?>
