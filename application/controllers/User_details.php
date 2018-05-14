<?php
/**
 *
 */
class User_details extends CI_Controller
{

  function index()
  {
    $this->load->model("User_model");
    $data['userArray'] = $this->User_model->return_users();
    $this->load->view("user_view",$data);
  }
}

 ?>
