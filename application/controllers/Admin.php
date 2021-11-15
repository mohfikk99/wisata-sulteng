<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();

      $this->load->model('admin_model');
  }

  public function index()
  {

    $data['title'] = 'Folder';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['data_wisata'] = $this->db->get('user_wisata')->result_array();

    $this->form_validation->set_rules('name', 'Nama Wisata', 'required|trim');
    $this->form_validation->set_rules('ulasan', 'ulasan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer');
    }else{
      $data =[
          'kategori' => $this->input->post('kategori'),
          'name' => $this->input->post('name'),
          'sumber' => $this->input->post('sumber'),
          'ulasan' => $this->input->post('ulasan'),
          'latitude' => $this->input->post('latitude'),
          'longitude' => $this->input->post('longitude'),

        ];
        // gambar
          $upload_gambar = $_FILES['image']['name'];
          if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/wisata/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
              $new_gambar = $this->upload->data('file_name');
              $this->db->set('image', $new_gambar);
            }else {
              echo $this->upload->dispay_errors();
            }
          }
          // akhir gambar
          $this->db->insert('user_wisata', $data);
          $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
          wisata telah berhasil ditambahkan</div>');
          redirect('admin/index');


    }


  }


  public function edit($id)
  {
    $data['title'] = 'Edit Data  Wisata';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('admin_model');

    $where = array('id' => $id);
    $data['wisata'] = $this->admin_model->edit_data($where, 'user_wisata')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit', $data);
      $this->load->view('templates/footer');
  }


  public function update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $kategori = $this->input->post('kategori');
    $sumber = $this->input->post('sumber');
    $ulasan = $this->input->post('ulasan');
    $latitude = $this->input->post('latitude');
    $longitude = $this->input->post('longitude');

    // gambar
      $upload_gambar = $_FILES['image']['name'];
      if ($upload_gambar) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/wisata/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $new_gambar = $this->upload->data('file_name');
          $this->db->set('image', $new_gambar);
        }else {
          echo $this->upload->dispay_errors();
        }
      }
      // akhir gambar


    $data = array(
      'name' => $name,
      'kategori' => $kategori,
      'sumber' => $sumber,
      'ulasan' => $ulasan,
      'latitude' => $latitude,
      'longitude' => $longitude,

    );

    $where = array(
      'id' => $id
    );

    $this->admin_model->update_data($where, $data, 'user_wisata');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    wisata telah berhasil di edit</div>');
    redirect('admin/index');



}


public function hapus($id)
{

  $this->load->model('admin_model');
  $title = $this->admin_model->hapus($id);
  $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
  wisata telah berhasil dihapus</div>');
  redirect('admin/index');
}


  public function users_aktif()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['aktif'] = $this->admin_model->aktif()->result();
    $data['pesan'] = $this->db->get('kontak')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar');
    $this->load->view('admin/users_aktif', $data);
    $this->load->view('templates/footer');

  }

  public function hapus_user($id)
  {

    $this->load->model('admin_model');
    $title = $this->admin_model->hapus_user($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    user telah berhasil di hapus</div>');
    redirect('admin/users_aktif');
  }

  public function hapus_pesan($id)
  {

    $this->load->model('admin_model');
    $title = $this->admin_model->hapus_pesan($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    pesan telah berhasil di hapus</div>');
    redirect('admin/users_aktif');
  }


  public function role()
  {
    $data['title'] = 'role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }


  public function roleAccess($role_id)
  {
    $data['title'] = 'role access';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1);

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');
  }


  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'menu_id' => $menu_id,
      'role_id' => $role_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    }else{
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Akses Berubah!</div>');

  }




}
