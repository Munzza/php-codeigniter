<?php
/**
 *
 */
class Post_model extends CI_Model
{

  function __construct()
  {
    // code...
    $this->load->database();
  }
  public function get_Posts($slug=FALSE, $limit=FALSE, $offset=FALSE)
  {
    if ($limit) {
      $this->db->limit($limit,$offset);
    }
    if($slug === FALSE){
      $this->db->order_by('posts.id','Desc');
      $this->db->join('catagories','catagories.id=posts.catagory_id');
      $query=$this->db->get('posts');
      return $query->result_array();
    }
    $query=$this->db->get_where('posts',array('slug'=>$slug));
    return $query->row_array();

    }
    function create_post($post_image){
      $slug=url_title($this->input->post('title'));
      $data=array(
        'title'=>$this->input->post('title'),
        'slug'=>$slug,
        'body'=>$this->input->post('body'),
        'catagory_id'=>$this->input->post('catagory_id'),
        'user_id'=>$this->session->userdata('user_id'),
        'post_image'=>$post_image
      );
      return $this->db->insert('posts',$data);

    }
    function delete_post($id){
      $image_file_name=$this->db->select('post_image')->get_where('post',array('id'=>$id))->row()->post_image;
      $cwd=getcwd();//save the current workin directory
      $image_file_path=$cwd."\\assets\\images\\posts\\";
      chdir($image_file_path);
      unlink($image_file_name);
      chdir($cwd);//restore previous workin directory
      $this->db->where('id',$id);
      $this->db->delete('posts');
      return true;
    }
    function update_post(){
      $slug=url_title($this->input->post('title'));
      $data=array(
        'title'=>$this->input->post('title'),
        'slug'=>$slug,
        'body'=>$this->input->post('body'),
        'catagory_id'=>$this->input->post('catagory_id')
      );
      $this->db->where('id',$this->input->post('id'));
      return $this->db->update('posts',$data);
    }
    function get_catagories(){
      $this->db->order_by('name');
      $query=$this->db->get('catagories');
      return $query->result_array();
    }
    function get_posts_by_catagory($catagory_id){
      $this->db->order_by('posts.id','DESC');
      $this->db->join('catagories','catagories.id=posts.catagory_id');
      $query=$this->db->get_where('posts',array('catagory_id'=>$catagory_id));
      return $query->result_array();
    }
}


 ?>
