<?php echo form_open('users/login');?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
  <h1 class="text-center"><?php echo $title; ?></h1>

  <div class="form-group">
    <input type="text" name="username" placeholder=" enter username"class="form-control" required autofocus>
  </div>
  <div class="form-group">
    <input type="password" name="password" placeholder=" enter password" class="form-control" required autofocus>
  </div>
  <button type="submit" name="button" class="btn btn-primary btn-block">Login</button>
</div>
</div>
<?php echo form_close();?>
