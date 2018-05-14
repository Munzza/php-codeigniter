<?php


class Users extends CI_Controller
{

  function register()
  {
  $data['title'] = 'Sign Up';

  $this->form_validation->set_rules('name','Name','required');
  $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
  $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
  $this->form_validation->set_rules('password','Password','required');
  $this->form_validation->set_rules('password2','Confirm Password','matches[password]');

  if ($this->form_validation->run() === FALSE) {
   $this->load->view('templates/header');
   $this->load->view('users/register',$data);
   $this->load->view('templates/footer');
 }else {
   $enc_password=md5($this->input->post('password'));
   $this->User_model->register($enc_password);
   $this->session->set_flashdata('user_registered','you are now registered and can log in');
   redirect('posts');
 }
  }

  public function login()
    {
          $data['title'] = 'Sign In';


          $this->form_validation->set_rules('username','Username','required');

          $this->form_validation->set_rules('password','Password','required');


          if ($this->form_validation->run() === FALSE) {
           $this->load->view('templates/header');
           $this->load->view('users/login',$data);
           $this->load->view('templates/footer');
         }else {
        //get username
           $username = $this->input->post('username');
           //get and encript the password
           $password = md5($this->input->post('password'));
           //login user
           $user_id= $this->User_model->login($username,$password);

           if ($user_id) {
             // create session
             $user_data=array(
               'user_id'=>$user_id,
               'username'=>$username,
               'logged_in'=>true
             );
             $this->session->set_userdata($user_data);
        //set message
             $this->session->set_flashdata('user_loggedin','you are now logged in');
             redirect('posts');
           }else{
             $this->session->set_flashdata('login_failed','login is invalid');
             redirect('users/login');
           }
         }
  }

  public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');

        $this->session->set_flashdata('user_loggedout','you are now logged out');
        redirect('users/login');
  }

  function check_username_exists($username){
          $this->form_validation->set_message('check_username_exists','This username is already exists');
          if ($this->User_model->check_username_exists($username)) {
          return true;
        }else{
          return false;
        }
  }

  function check_email_exists($email){
          $this->form_validation->set_message('check_email_exists','This email is already exists');
          if ($this->User_model->check_email_exists($email)) {
          return true;
        }else{
          return false;
        }
        }
}

 ?>
