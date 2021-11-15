<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model
{

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }


  function hapus($id)
  {
    $query = $this->db->query("DELETE FROM user_wisata WHERE id = '$id'");
  }

  public function aktif()
  {
    return $this->db->get_where("user", array('role_id' => '2'));
  }

  function hapus_user($id)
  {
    $query = $this->db->query("DELETE FROM user WHERE id = '$id'");
  }

  function hapus_pesan($id)
  {
    $query = $this->db->query("DELETE FROM kontak WHERE id = '$id'");
  }

}
