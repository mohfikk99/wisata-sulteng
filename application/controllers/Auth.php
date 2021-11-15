<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('kategori_model');
  }

  public function index()
  {
    if($this->session->userdata('email')) {
      redirect('user');
    }
    
    
    // $keyword = $this->input->post('keyword');
    // $data['cari'] = $this->kategori_model->data_cari($keyword=null);
   
    
    $data['title'] = 'Wisata Sulteng';
    $data['map'] = $this->db->get('user_wisata')->result_array();

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');


    if($this->form_validation->run() == false){
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login', $data);
      $this->load->view('templates/footer');
      
    }else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    // usenya ada
    if($user){
      //usenya aktif
      if($user['is_active'] == 1){
        //cek password
        if(password_verify($password, $user['password'])){
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          if($user['role_id'] == 1) {
            redirect('admin');
          }else {
            redirect('user');
          }

        }else {
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
          Password Salah!</div>');
          redirect('auth');
        }

      }else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
        Email anda belum diaktifkan!</div>');
        redirect('auth');
      }

    }else {
      $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
      Email anda tidak terdaftar!</div>');
      redirect('auth');
    }

  }

  public function registration()
  {

    if($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email ini sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password tidak cocok!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if($this->form_validation->run() == false){
      $data['title']= 'Wpu User Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    }else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time(),
      ];


      //siapkan token
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Selamat! Akun anda telah dibuat. Silakan aktifkan akun Anda</div>');
      redirect('auth');

    }

    }


    private function _sendEmail($token, $type)
    {
      $config = [
        'protocol'  =>'smtp',
        'smtp_host' =>'ssl://smtp.googlemail.com',
        'smtp_user' =>'wisatasulteng077@gmail.com',
        'smtp_pass' =>'valkri111120',
        'smtp_port' => 465,
        'mailtype'  =>'html',
        'charset'   =>'utf-8',
        'newline'   =>"\r\n"
      ];

      $this->email->initialize($config);

      $this->email->from('wisatasulteng077@gmail.com', 'wisatasulteng');
      $this->email->to($this->input->post('email'));

      if($type == 'verify') {
        $this->email->subject('Account Verification');
        $this->email->message('Click this link to verify you account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
      }else if ($type == 'forgot') {
        $this->email->subject('Reset Password');
        $this->email->message('Click this link to reset  your password : <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
      }

      if($this->email->send()) {
        return true;
      }else {
        echo $this->email->print_debugger();
        die;
      }
    }


    public function verify()
    {
      $email = $this->input->get('email');
      $token = $this->input->get('token');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();
      //if satu
      if($user) {
        $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

        //if dua
        if($user_token) {

          // if tiga
          if(time() - $user_token['date_created'] < (60*60*24)) {
            $this->db->set('is_active', 1);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            '. $email .' Telah diaktifkan! Silahkan masuk</div>');
            redirect('auth');
            //else if tiga
          }else {

            $this->db->delete('user', ['email' => $email]);
            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Aktivasi Akun gagal! Pesan kedaluwarsa</div>');
            redirect('auth');
          }
          //else if dua
        }else {
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
          Aktivasi Akun gagal! Pesan salah</div>');
          redirect('auth');
        }
        //else if satu
      }else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
        Aktivasi Akun gagal! email salah</div>');
        redirect('auth');
      }
    }




    public function logout()
    {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');

      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
      Anda telah keluar!</div>');
      redirect('auth');
    }

    public function blocked()
    {
      $this->load->view('auth/blocked');
    }



    public function forgotpassword()
    {
      $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

      if ($this->form_validation->run() == false) {
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/forgot-password');
        $this->load->view('templates/auth_footer');
      }else {
        $email = $this->input->post('email');
        $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

        if($user) {
          $token = base64_encode (random_bytes(32));
          $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
          ];
          $this->db->insert('user_token', $user_token);
          $this->_sendEmail($token, 'forgot');
          $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
          Silakan periksa email Anda untuk mengatur ulang kata sandi Anda!</div>');
          redirect('auth/forgotpassword');
        }else{
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
          Email tidak terdaftar atau diaktifkan!</div>');
          redirect('auth/forgotpassword');
        }
      }
    }


    public function resetpassword()
    {
      $email = $this->input->get('email');
      $token = $this->input->get('token');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      if($user) {
        $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

        if($user_token) {
          $this->session->set_userdata('reset_email', $email);
          $this->changepassword();
        }else {
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
          Reset password gagal! Pesan salah</div>');
          redirect('auth');
        }

      }else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
        Reset password gagal! email salah</div>');
        redirect('auth');
      }
    }


    public function changepassword()
    {
      if (!$this->session->userdata('reset_email')) {
        redirect('auth');
      }

      $this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[3]|matches[password2]');
      $this->form_validation->set_rules('password2', 'Repeat password', 'trim|required|min_length[3]|matches[password1]');

      if ($this->form_validation->run() == false) {
        $data['title'] = 'Change Password';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/change-password');
        $this->load->view('templates/auth_footer');
      }else {
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email = $this->session->userdata('reset_email');

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->unset_userdata('reset_email');

        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
        Kata sandi telah diubah! Silahkan masuk</div>');
        redirect('auth');
      }

    }



}
