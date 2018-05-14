<?php
/**
 *
 */
class Catagories extends CI_Controller
{
function index(){
  $data['title']='Catagories';
  $data['catagories']=$this->catagory_model->get_catagories();
  $this->load->view('templates/header');
  $this->load->view('catagories/index',$data);
  $this->load->view('templates/footer');
}
  function create()
  {
    // check login
    if (!$this->session->userdata('logged_in')) {
    redirect('users/login');
    }
  $data['title']='Create Catagories';
  $this->form_validation->set_rules('name','Name','required');
  if ($this->form_validation->run() === FALSE) {
    $this->load->view('templates/header');
    $this->load->view('catagories/create',$data);
    $this->load->view('templates/footer');
  }else {
    $this->catagory_model->create_catagory();
       $this->session->set_flashdata('catagory_created','your catagory has been created');
    redirect('catagories');
  }
  }
  function posts($id){
    $data['title']=$this->catagory_model->get_catagory($id)->name;
    $data['posts']=$this->Post_model->get_posts_by_catagory($id);
    $this->load->view('templates/header');
    $this->load->view('posts/index',$data);
    $this->load->view('templates/footer');
  }

public function delete($id)
{
  // check login
  if (!$this->session->userdata('logged_in')) {
  redirect('users/login');
  }
  $this->catagory_model->delete_catagory($id);
   $this->session->set_flashdata('catagory_deleted','your catagory has been deleted');
    redirect('catagories');
}
}
 ?>
