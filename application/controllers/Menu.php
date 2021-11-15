<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();

      $this->load->model('menu_model');
  }

  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    }else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Menu baru ditambahkan!</div>');
      redirect('menu');
    }

  }

  public function edit_menu($id)
  {
    $data['title'] = 'Edit Menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $where = array('id' => $id);
    $data['user_menu'] = $this->menu_model->edit_data($where, 'user_menu')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/edit_menu', $data);
      $this->load->view('templates/footer');
  }

  public function update_menu()
  {
    $id = $this->input->post('id');
    $menu = $this->input->post('menu');

    $data = array(
      'menu' => $menu,
    );


    $where = array(
      'id' => $id
    );

    $this->menu_model->update_data($where, $data, 'user_menu');
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Menu Telah Di Edit</div>');
    redirect('menu');

  }

  public function hapus_menu($id)
  {
    $this->load->model('menu_model');
    $title = $this->menu_model->hapus_menu($id);
    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
    Menu Telah Di Hapus</div>');
    redirect('menu');
  }

  public function submenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('menu_model', 'menu');

    $data['submenu'] = $this->menu->getsubmenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'url', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    }else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Submenu baru ditambahkan</div>');
      redirect('menu/submenu');
    }
  }


  public function edit($id)
  {
    $data['title'] = 'edit submenu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('menu_model');

    $where = array('id' => $id);
    $data['user_sub_menu'] = $this->menu_model->edit_data($where, 'user_sub_menu')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/edit', $data);
      $this->load->view('templates/footer');
  }

    public function update()
    {
      $id = $this->input->post('id');
      $title = $this->input->post('title');
      $menu_id = $this->input->post('menu_id');
      $url = $this->input->post('url');
      $icon = $this->input->post('icon');
      $is_active = $this->input->post('is_active');

      $data = array(
        'title' => $title,
        'menu_id' => $menu_id,
        'url' => $url,
        'icon' => $icon,
        'is_active' => $is_active,
      );


      $where = array(
        'id' => $id
      );

      $this->menu_model->update_data($where, $data, 'user_sub_menu');
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Submenu Telah Di Edit</div>');
      redirect('menu/submenu');


  }


  public function hapus($id)
  {

    $this->load->model('menu_model');
    $title = $this->menu_model->hapus($id);
    redirect('menu/submenu');
  }


}
