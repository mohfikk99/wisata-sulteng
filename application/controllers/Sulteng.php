<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sulteng extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

      $this->load->model('kategori_model');
  }



  public function alam()
  {
    $data['title'] = 'Wisata Alam';

    $data['alam'] = $this->kategori_model->data_alam()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/alam', $data);
    $this->load->view('templates/footer');
  }


  public function kuliner()
  {
    $data['title'] = 'Wisata Kuliner';

    $data['kuliner'] = $this->kategori_model->data_kuliner()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/kuliner', $data);
    $this->load->view('templates/footer');



  }

  public function religi()
  {
    $data['title'] = 'Wisata Religi';

    $data['religi'] = $this->kategori_model->data_religi()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/religi', $data);
    $this->load->view('templates/footer');



  }

  public function budaya()
  {
    $data['title'] = 'Wisata Budaya';

    $data['budaya'] = $this->kategori_model->data_budaya()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/budaya', $data);
    $this->load->view('templates/footer');



  }

  public function sejarah()
  {
    $data['title'] = 'Wisata Sejarah';

    $data['sejarah'] = $this->kategori_model->data_sejarah()->result();

    $data['terbaru'] = $this->kategori_model->data_terbaru()->row();
    $data['populer'] = $this->kategori_model->data_populer()->row();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/sejarah', $data);
    $this->load->view('templates/footer');



  }


  // public function cari()
  // {
  //     $data['title'] = 'Wisata';
   
      

  //     $this->load->view('templates/auth_header', $data);
  //     $this->load->view('templates/jumbotron', $data);
  //     $this->load->view('sulteng/alam', $data);
  //     $this->load->view('sulteng/kuliner', $data);
  //     $this->load->view('templates/footer');
  

  // }


  public function gelery()
  {
    $data['title'] = 'Gelery';

    $data['wisata'] = $this->db->get('user_wisata')->result_array();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/gelery');
    $this->load->view('templates/footer');


  }

  public function cerita()
  {
    $data['title'] = 'Cerita';

    $data['cerita'] = $this->db->get('user_cerita')->result_array();

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/cerita', $data);
    $this->load->view('templates/footer');


  }

  public function detail_wisata($id)
  {
    $data['title'] = 'Detail Wisata';

    $data['detail'] = $this->kategori_model->data_detail($id);

    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/jumbotron', $data);
    $this->load->view('sulteng/detail_wisata', $data);
    $this->load->view('templates/footer');
  }



  public function tentang_kami()
  {
    $data['title'] = 'Tentang Kami';

    $this->form_validation->set_rules('nama', 'Nama Anda', 'required|trim');
    $this->form_validation->set_rules('email', 'email', 'required|trim');
    $this->form_validation->set_rules('pesan', 'pesan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/jumbotron', $data);
      $this->load->view('sulteng/tentang_kami', $data);
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
      redirect('sulteng/tentang_kami');
    }
    


  }


}
