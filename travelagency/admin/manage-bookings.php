<?php
 session_start();

include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="dashboard.css">
    <title>Admin</title>
</head>
<body>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <span>Travel Agency</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="packageadd.php">
                <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Tour Packages</span>
                </a>
            </li>
            <li>
                <a href="manage-users.php">
                <i class='bx bxs-group'></i>
                    <span class="text">Manage Users</span>
                </a>
            </li>
            <li class="active">
                <a href="manage-bookings.php">
                <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Manage Booking</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                <i class='bx bxs-message-dots'></i>
                    <span class="text">Manage Enquiries</span>
                </a>
            </li> -->
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="../logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            
          
        </nav>
        <!-- NAVBAR -->
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Booked Detail</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="../index.php">Booking</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
             
            </div>
<table class="table my-5" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
  <thead>
    <tr>
    <th scope="col" style=" background-color: skyblue; border: 1px solid #dddddd; text-align: left; padding: 8px;">S.N.</th>
      <th scope="col" style=" background-color: skyblue; border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</th>
      <th scope="col" style=" background-color: skyblue; border: 1px solid #dddddd; text-align: left; padding: 8px;">Date</th>

    </tr>
  </thead>
  <tbody>
  <?php
  function get_reservation(){
    global $conns;
    $sql="SELECT * FROM reservation";
    $stmt = $conns->prepare($sql);
    $stmt->execute();
    $reservations = $stmt->fetchAll();
    $stmt->closeCursor();
return $reservations;
  }

try {
    $reservation = get_reservation();

} catch (Exception $e) {
    $error=$e->getMessage();
    echo $error;
    die();
}
?>

<?php
if($reservation){
    foreach($reservation as $reserve):?>
<tr>
    <td><?=$reserve['res_id'];?></td>
    <td><?=$reserve['res_name'];?></td>
    <td><?=$reserve['res_date'];?></td>
    <td></td>
    <td></td>
</tr>


<?php
    endforeach;
}else{
 if(isset($error)){
    echo  $error;
 }   
}?>
<!-- 


      $sql="SELECT * FROM reservation";
      $result=mysqli_query($conn,$sql);
      if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['res_id'];
        $name=$row['res_name'];
        $date=$row['res_date'];
        echo'<tr>
          <th scope="row">'.$id.'</th>

          <td>'.$name.'</td>
          <td>'.$date.'</td>    
          </tr>';
      }
    }
      -->
    
   
  </tbody>
</table>
 </div>
</body>
</html>