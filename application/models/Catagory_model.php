<?php
/**
 *
 */
class Catagory_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }
  function get_catagories(){
    $this->db->order_by('name');
    $query=$this->db->get('catagories');
    return $query->result_array();
  }
  function create_catagory(){
    $data=array(
      'name'=>$this->input->post('name'),
      'user_id'=>$this->session->userdata('user_id')
    );
    return $this->db->insert('catagories',$data);
  }
  function get_catagory($id)
  {
    $query=$this->db->get_where('catagories',array('id'=>$id));
    return $query->row();
  }

  function delete_catagory($id){

    $this->db->where('id',$id);
    $this->db->delete('catagories');
    return true;
  }
}

 ?>
