<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cerita_model extends CI_Model
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

  public function hapus($id)
  {
    $query = $this->db->query("DELETE FROM user_cerita WHERE id ='$id'");
  }
}

/* End of file cerita_model.php */
