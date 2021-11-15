<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

class Cerita extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Server_model', 'server');

    // $this->method['METHOD_NAME']['limit'] = [NUM_REQUESTS_PER_HOUR];
  }


  public function index_get()
  {
    // seleksi tampil berdasarkan id
    $email = $this->get('email');
    if ($email === null) {
      $cerita = $this->server->getCerita();
    }else {
      $cerita = $this->server->getCerita($email);
    }

    // respon yang tampil
     if ($cerita) {
       $this->response([
           'status' => true,
           'data' => $cerita
       ], REST_Controller::HTTP_OK);
     }else {
       $this->response([
           'status' => false,
           'message' => 'kategori not found'
       ], REST_Controller::HTTP_NOT_FOUND);
     }

  }



    public function index_delete()
    {
      $id = $this->delete('id');
      if ($id === null) {
        $this->response([
            'status' => false,
            'message' => 'provide an id'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }else {
        if ($this->server->deleteCerita($id) > 0) {
          $this->response([
              'status' => true,
              'id' => $id,
              'message' => 'deleted'
          ], REST_Controller::HTTP_OK);
        }else {
          $this->response([
              'status' => false,
              'message' => 'id not found'
          ], REST_Controller::HTTP_BAD_REQUEST);
        }
      }
    }


    public function index_post()
    {

      $data = [
          'email' => $this->post('email'),
          'name' => $this->post('name'),
          'lokasi' => $this->post('lokasi'),
          'caption' => $this->post('caption'),
        ];

      // cek gambar akan di upload
      $upload_image = $_FILES['gambar']['name'];

      if($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/cerita/';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('gambar')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        }else {
          echo $this->upload->dispay_errors();
        }
      }

      if ($this->db->insert('user_Cerita', $data) > 0) {
        $this->response([
            'status' => true,
            'message' => 'new Cerita'
        ], REST_Controller::HTTP_CREATED);
      }else {
        $this->response([
            'status' => false,
            'message' => 'field to create new data'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }


    }


    public function index_put()
    {

      $id = $this->put('id');

      $data = [
        'lokasi' => $this->put('lokasi'),
        'caption' => $this->put('caption'),
      ];

      // cek gambar akan di upload
      $upload_image = $_FILES['gambar']['name'];

      if($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/cerita/';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('gambar')) {
          $old_image = $data['user_cerita']['gambar'];
          if($old_image != 'cerita.jpg') {
            unlink(FCPATH . 'assets/img/cerita/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        }else {
          echo $this->upload->dispay_errors();
        }
      }


      if ($this->server->updateCerita($data, $id) > 0) {
        $this->response([
            'status' => true,
            'message' => 'new update'
        ], REST_Controller::HTTP_OK);
      }else {
        $this->response([
            'status' => false,
            'message' => 'field to update new data'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }





}

  /* End of file Server.php */
