<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class Hub_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        // databaseに接続
        $this->load->database();
    }
    // 配列に入れた情報をDBに格納する
    public function hub_add($data)
    {
        $this->db->insert('user',$data);
    }
    
}
?>