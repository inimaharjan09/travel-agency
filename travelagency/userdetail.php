<?php
 session_start();

include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
</head>
<body>
<table class="table my-5" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $sql="Select * from user_form ";
      $result=mysqli_query($conn,$sql);
      if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $password=$row['password'];
        echo'<tr>
          <th scope="row">'.$id.'</th>

          <td>'.$name.'</td>
          <td>'.$email.'</td>
          <td>'.$password.'</td>

    
          </tr>';
      }
    }
     ?>
    
   
  </tbody>
</table>
 </div>
</body>
</html>