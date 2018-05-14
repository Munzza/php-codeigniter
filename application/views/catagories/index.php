<h2><?= $title; ?></h2>
<ul class="list-group">
  <?php foreach($catagories as $catagory):?>
  <li class="list-group-item" ><a href="<?php echo site_url('/catagories/posts/'.$catagory['id']);?>">
    <?php echo $catagory['name'];?></a>
    <?php if($this->session->userdata('user_id')==$catagory['user_id']):?>
      <form class="cat-delete" action="catagories/delete/<?php echo $catagory['id'];?>" method="post">
          <input type="submit" class="btn-link text-danger" value="[x]">
      </form>
    <?php endif;?>
  </li>
  <?php endforeach;?>
</ul>
