<?php
/**
 *
 */
class Mymodel extends CI_Model
{

  function firstName()
  {
    $lastName=$this->lastName();
    return "zainab" .$lastName;
  }
  private function lastName()
  {
    return "Mohi";
  }
}

 ?>
