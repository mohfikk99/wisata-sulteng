<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

class Pengguna extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Server_model', 'server');

    // $this->method['METHOD_NAME']['limit'] = [NUM_REQUESTS_PER_HOUR];
  }


  public function index_post()
  {

    $email = $this->post('email');
    $password = $this->post('password');


    if (!empty($email) && !empty($password)) {

      $con['returnType'] = 'single';
      $con['conditions'] = array(
        'email' => $email,
        'password' => password_verify('password', $password),
    
      );
      $user = $this->server->getRows($con);

        if($user){
              // Set the response and exit
          $this->response([
              'status' => TRUE,
              'message' => 'User login successful.',
              'data' => $user
          ], REST_Controller::HTTP_OK);
        }else{
          // Set the response and exit
          //BAD_REQUEST (400) being the HTTP response code
          $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
      }

    }else {
      $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
    }
  }

}

  /* End of file Server.php */
