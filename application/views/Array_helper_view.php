<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo "<pre> SEO";
    print_r($seo);
     ?>
     <p>2.random_element</p>
     <?php

     echo random_element($seo);
      ?>
      <p>3.elements()</p>
      <?php
      $new_array=elements(array("meta_disc","meta_key"),$seo);
      print_r($new_array); ?>
  </body>
</html>
