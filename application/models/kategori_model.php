<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model
{

  // public function data_cari($keyword)
  // {
  //     $this->db->select('*');
  //     $this->db->from('user_wisata');
      
  //     $this->db->like('name',$keyword);
     
  //     return $this->db->get()->result_array();
  // }

  public function data_alam()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'alam'));
  }

  public function data_kuliner()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'kuliner'));
  }

  public function data_religi()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'religi'));
  }

  public function data_budaya()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'budaya'));
  }

  public function data_sejarah()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'sejarah'));
  }

  public function data_terbaru()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'terbaru'));
  }

  public function data_populer()
  {
    return $this->db->get_where("user_wisata", array('Kategori ' => 'populer'));
  }

  public function data_detail($id)
  {
    $result = $this->db->where('id', $id)->get('user_wisata');
    if ($result->num_rows() > 0) {
      return $result->result();
    }else {
      return false;
    }

  }


}

/* End of file Kategori_model.php */
