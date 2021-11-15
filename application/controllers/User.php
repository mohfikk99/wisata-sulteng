<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('cerita_model');
  }

  public function index()
  {
    $data['title'] = 'My Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('name', 'Full name', 'required|trim');

    if($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    }else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $bio = $this->input->post('bio');

      // cek gambar akan di upload
      $upload_image = $_FILES['image']['name'];

      if($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')) {
          $old_image = $data['user']['image'];
          if($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        }else {
          echo $this->upload->dispay_errors();
        }
      }

      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Profil Anda telah diperbarui</div>');
      redirect('user');
    }

  }


  public function changepassword()
  {
    $data['title'] = 'Ubah Password';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'new password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'confirm new password', 'required|trim|min_length[3]|matches[new_password1]');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/changepassword', $data);
      $this->load->view('templates/footer');
    }else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if(!password_verify($current_password, $data['user']['password'])){
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
        Password saat ini salah</div>');
        redirect('user/changepassword');
      }else {
        if($current_password == $new_password){
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
          Password baru tidak boleh sama dengan kata sandi saat ini!</div>');
          redirect('user/changepassword');
        }else {
          //password sudah fix
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');

          $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
          Password telah diubah!</div>');
          redirect('user/changepassword');
        }
      }
    }
  }

  public function cerita()
  {
    $data ['title'] = 'Cerita Anda';

    $data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['user_cerita'] = $this->db->get_where('user_cerita', ['email' =>$this->session->userdata('email')])->result_array();

    $this->form_validation->set_rules('caption', 'caption', 'required|trim');

  if ($this->form_validation->run()== false) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/cerita', $data);
    $this->load->view('templates/footer');
  }else{
    $data = [
      'email' => $this->input->post('email'),
      'name' => $this->input->post('name'),
      'lokasi' => $this->input->post('lokasi'),
      'caption' => $this->input->post('caption'),
    ];

    // gambar
      $upload_gambar = $_FILES['gambar']['name'];
      if ($upload_gambar) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/cerita/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          $new_gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $new_gambar);
        }else {
          echo $this->upload->dispay_errors();
        }
      }
      // akhir gambar
      $this->db->insert('user_cerita', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Cerita berhasil ditambahkan</div>');
      redirect('user/cerita');

    }

  }

  public function edit_cerita($id)
  {
    $data['title'] = 'edit cerita';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


    $where = array('id' => $id);
    $data['cerita'] = $this->cerita_model->edit_data($where, 'user_cerita')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/edit_cerita', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id = $this->input->post('id');
    $lokasi = $this->input->post('lokasi');
    $caption = $this->input->post('caption');

    // gambar
      $upload_gambar = $_FILES['gambar']['name'];
      if ($upload_gambar) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/cerita/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          $new_gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $new_gambar);
        }else {
          echo $this->upload->dispay_errors();
        }
      }
      // akhir gambar

      $data = array(
        'lokasi' => $lokasi,
        'caption' => $caption,
      );

      $where = array(
        'id' => $id,
      );

      $this->cerita_model->update_data($where, $data, 'user_cerita');
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Cerita Berhasil Di Edit</div>');
      redirect('user/cerita');

  }


  public function hapus($id)
  {
    $title = $this->cerita_model->hapus($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Cerita Berhasil Di Hapus</div>');
    redirect('user/cerita');
  }


  public function tampilan()
  {
    $data ['title'] = 'Cerita';

    $data ['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cerita'] = $this->db->get('user_cerita')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/tampilan', $data);
    $this->load->view('templates/footer');
  }



}
