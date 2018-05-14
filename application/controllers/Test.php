<?php
defined("BASEPATH") OR exit("No script access allowed");
/**
 *
 */
class Test extends CI_Controller
{

  function index()
  {
    // code...
    echo "index method test controller";
  }
  public function test_index()
  {

    $this->load->model('Mymodel');
    $firstName = $this->Mymodel->firstName();
    echo "My name is  " .$firstName;
  }
}

 ?>
