  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_model
{
  public function getsubmenu()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            ";
        return $this->db->query($query)->result_array();
  }


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
    $query = $this->db->query("DELETE FROM user_sub_menu WHERE id = '$id'");
  }

  function hapus_menu($id)
  {
    $query = $this->db->query("DELETE FROM user_menu WHERE id = '$id'");
  }

}
