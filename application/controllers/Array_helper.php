<?php
defined('BASEPATH') OR exit("no direct script access allowed");
class Array_helper extends CI_Controller{
  public function index()
  {
    // code...
    $this->load->helper("array");
    $data['seo'] = array(
      "meta_disc"=>"this is my desc of the page",
      "meta_key"=>"this,is,a,keyword",
      "title"=>"this is my title"
    );
    $this->load->view("Array_helper_view",$data);
  }
}

 ?>
