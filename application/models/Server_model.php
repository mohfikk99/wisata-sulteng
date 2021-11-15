<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server_model extends CI_Model
{

  public function __construct() {
        parent::__construct();

        $this->load->database();

       $this->userTbl = 'user';

    }

  public function getWisata($id = null)
  {
    if ($id === null) {
      return $this->db->get('user_wisata')->result_array();
    }else {
      return $this->db->get_where('user_wisata', ['id' => $id])->result_array();
    }
  }

  public function getJenis($kategori = null)
  {
    if ($kategori === null) {
      return $this->db->get('user_wisata')->result_array();
    }else {
      return $this->db->get_where('user_wisata', ['kategori' => $kategori])->result_array();
    }
  }

  public function getCerita($email = null)
  {
    if ($email === null) {
      return $this->db->get('user_cerita')->result_array();
    }else {
      return $this->db->get_where('user_cerita', ['email' => $email])->result_array();
    }
  }

  public function deleteCerita($id)
  {
    $this->db->delete('user_cerita', ['id' => $id]);
    return $this->db->affected_rows();
  }

  public function createCerita($data)
  {
    $this->db->insert('user_Cerita', $data);
    return $this->db->affected_rows();
  }

  public function updateCerita($data, $id)
  {
    $this->db->update('user_Cerita', $data, ['id' => $id]);
    return $this->db->affected_rows();
  }


  function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);

        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
            }
        }

        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{

            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->row_array():false;
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():false;
            }
        }

        //return fetched data
        return $result;
    }

}

/* End of file Server.php */
