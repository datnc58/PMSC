<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }

    public function loginAdmin($username, $password)
    {   
        
        if ($username == null || $password == null)
            return false;
        $this->db->where('phone', $username);
        $user = $this->db->get('users');
        if ($user->num_rows <= 0 || $user->num_rows > 1)
            return false;
        $user = $user->first_row();
        for ($i = 1; $i <= 5; $i++)
            $password = md5($password);
        if ($user->password === $password)
            return $user;
    }
    public function login($phone, $pass){

        $phone = $this->db->escape_str($phone);
        $this->db->select('*');
        $this->db->where('phone',$phone);
        $query=$this->db->get('users');
        if($query->num_rows()==0) return false;
        $admin = $query->first_row();
        for ($i=0; $i < 5; $i++) { 
           $pass = md5($pass);
        }
        if ($pass != $admin->password){
                return 'Wrong password';
        }
        return $admin;
    }
    /*public function update($id,$data){
        if(isset($data) && $data != NULL){
            $this->db->where('id',$id);
            $this->db->update('users',$data);
        }
    }*/
    public function Update_usermodules($table, $id, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->where('id', $id);
            $this->db->update($table, $data);
        }
    }
    public function get_user_modules($id)
    {
        $this->db->where('user_id', $id);
        $q = $this->db->get('user_modules');
        return $q->first_row();
    }
    public function get_user_list()
    {
        $this->db->select('nt_admin.*,user_modules.*,nt_admin.id as admin_id');
        $this->db->where('nt_admin.id <>', 1);
        $this->db->join('user_modules', 'user_modules.user_id=nt_admin.id','left');

        $q = $this->db->get('nt_admin');
        return $q->result();
    }

}
