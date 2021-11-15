<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

class Server extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Server_model', 'server');
  }


  public function index_get()
  {
    // seleksi tampil berdasarkan id
    $id = $this->get('id');
    if ($id === null) {
      $wisata = $this->server->getWisata();
    }else {
      $wisata = $this->server->getWisata($id);
    }

    // respon yang tampil
     if ($wisata) {
       $this->response([
           'status' => true,
           'data' => $wisata
       ], REST_Controller::HTTP_OK);
     }else {
       $this->response([
           'status' => false,
           'message' => 'id not found'
       ], REST_Controller::HTTP_NOT_FOUND);
     }

  }


  // public function index_delete()
  // {
  //   $id = $this->delete('id');
  //   if ($id === null) {
  //     $this->response([
  //         'status' => false,
  //         'message' => 'provide an id'
  //     ], REST_Controller::HTTP_BAD_REQUEST);
  //   }else {
  //     if ($this->server->deleteWisata($id) > 0) {
  //       $this->response([
  //           'status' => true,
  //           'id' => $id,
  //           'message' => 'deleted'
  //       ], REST_Controller::HTTP_OK);
  //     }else {
  //       $this->response([
  //           'status' => false,
  //           'message' => 'id not found'
  //       ], REST_Controller::HTTP_BAD_REQUEST);
  //     }
  //   }
  // }
  //
  //
  // public function index_post()
  // {
  //   $data = [
  //     'kategori' => $this->post('kategori'),
  //     'name' => $this->post('name'),
  //     'sumber' => $this->post('sumber'),
  //     'ulasan' => $this->post('ulasan'),
  //     'image' => $this->post('image'),
  //     'latitude' => $this->post('latitude'),
  //     'longitude' => $this->post('longitude')
  //   ];
  //
  //   if ($this->server->createWisata($data) > 0) {
  //     $this->response([
  //         'status' => true,
  //         'message' => 'new wisata'
  //     ], REST_Controller::HTTP_CREATED);
  //   }else {
  //     $this->response([
  //         'status' => false,
  //         'message' => 'field to create new data'
  //     ], REST_Controller::HTTP_BAD_REQUEST);
  //   }
  //
  // }
  //
  //
  // public function index_put()
  // {
  //
  //   $id = $this->put('id');
  //
  //   $data = [
  //     'kategori' => $this->put('kategori'),
  //     'name' => $this->put('name'),
  //     'sumber' => $this->put('sumber'),
  //     'ulasan' => $this->put('ulasan'),
  //     'image' => $this->put('image'),
  //     'latitude' => $this->put('latitude'),
  //     'longitude' => $this->put('longitude')
  //   ];
  //
  //   if ($this->server->updateWisata($data, $id) > 0) {
  //     $this->response([
  //         'status' => true,
  //         'message' => 'new update'
  //     ], REST_Controller::HTTP_OK);
  //   }else {
  //     $this->response([
  //         'status' => false,
  //         'message' => 'field to update new data'
  //     ], REST_Controller::HTTP_BAD_REQUEST);
  //   }
  // }
  //
  //
  //





















}

  /* End of file Server.php */
