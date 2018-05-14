<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test</title>
  </head>
  <body>
    <table>
      <tr>
        <th>id</th>
        <th>username</th>
        <th>email</th>
      </tr>
      <?php
      foreach ($userArray as $key => $value) {
        // code...
        echo "<tr>
              <td>".$value['id']."</td>
              <td>".$value['username']."</td>
              <td>".$value['email']."</td>
        </tr>";
      }
     ?>
    </table>
  </body>
</html>
