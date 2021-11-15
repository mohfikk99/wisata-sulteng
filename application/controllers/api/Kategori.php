<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

class Kategori extends REST_Controller
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
    $kategori = $this->get('kategori');
    if ($kategori === null) {
      $jenis = $this->server->getJenis();
    }else {
      $jenis = $this->server->getJenis($kategori);
    }

    // respon yang tampil
     if ($jenis) {
       $this->response([
           'status' => true,
           'data' => $jenis
       ], REST_Controller::HTTP_OK);
     }else {
       $this->response([
           'status' => false,
           'message' => 'kategori not found'
       ], REST_Controller::HTTP_NOT_FOUND);
     }

  }





}

  /* End of file Server.php */
