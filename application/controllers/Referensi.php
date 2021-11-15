<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class referensi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('kategori_model');

  }

  public function alam()
  {
    $data['title'] = 'Wisata Alam';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alam'] = $this->kategori_model->data_alam()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('referensi/alam', $data);
    $this->load->view('templates/footer');
  }


  public function kuliner()
  {
    $data['title'] = 'Wisata Kuliner';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kuliner'] = $this->kategori_model->data_kuliner()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('referensi/kuliner', $data);
    $this->load->view('templates/footer');
  }


  public function religi()
  {
    $data['title'] = 'Wisata Religi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['religi'] = $this->kategori_model->data_religi()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('referensi/religi', $data);
    $this->load->view('templates/footer');
  }


  public function budaya()
  {
    $data['title'] = 'Wisata Budaya';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['budaya'] = $this->kategori_model->data_budaya()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('referensi/budaya', $data);
    $this->load->view('templates/footer');
  }



  public function sejarah()
  {
    $data['title'] = 'Wisata Sejarah';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['sejarah'] = $this->kategori_model->data_sejarah()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('referensi/sejarah', $data);
    $this->load->view('templates/footer');
  }


  public function detail_wisata($id)
  {
    $data['title'] = 'Detail Wisata';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['detail'] = $this->kategori_model->data_detail($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('referensi/detail_wisata', $data);
    $this->load->view('templates/footer');
  }


  public function tentang_kami()
  {
    $data['title'] = 'Tentang Kami';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 

    $this->form_validation->set_rules('nama', 'Nama Anda', 'required|trim');
    $this->form_validation->set_rules('email', 'email', 'required|trim');
    $this->form_validation->set_rules('pesan', 'pesan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('referensi/tentang_kami', $data);
      $this->load->view('templates/footer');
    }else {
      $data = [
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'pesan' => $this->input->post('pesan'),
      ];

      $this->db->insert('kontak', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      pesan anda telah dikirim</div>');
      redirect('referensi/tentang_kami');
    }
  }





}

  /* End of file Kategori.php */
