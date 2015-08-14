<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model 
{
    public function cek_login($data)
    {
        return $this->db->get_where('tbl_user',$data);
    }

}