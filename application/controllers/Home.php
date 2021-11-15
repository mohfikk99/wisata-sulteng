<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }


  public function index()
  {
    $data['title'] = 'Halaman Utama';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['map'] = $this->db->get('user_wisata')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/utama', $data);
    $this->load->view('templates/footer');

 }


 public function gelery()
 {
   $data['title'] = 'Geleri';
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

   $data['wisata'] = $this->db->get('user_wisata')->result_array();

   $this->load->view('templates/header', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('templates/topbar', $data);
   $this->load->view('home/gelery', $data);
   $this->load->view('templates/footer');
 }



 }
