<?php 
            include_once "../config.php";
            if(isset($_POST['Submit'])){
                $place = $_POST['Place'];
                $description = $_POST['description'];
                $cost = $_POST['cost'];
                $image = $_FILES['image']['name'];
            
                $sql = "insert into packages (Place,description,cost,images) values ('$place','$description','$cost','$image')";
            
                move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$image);
            
                mysqli_query($conn,$sql);
                header("location:dashboard.php");
            }
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
            <li class="active">
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
            <li>
                <a href="manage-bookings.php">
                <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Manage Booking</span>
                </a>
            </li>
            <li>
                <a href="#">
                <i class='bx bxs-message-dots'></i>
                    <span class="text">Manage Enquiries</span>
                </a>
            </li>
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
                    <h1>Tour Package</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="../index.php">Package</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
             
            </div>
<!-- <style>
.container{
    display: grid;
    place-items: center;
    margin-top: 50px;
}

body{
    background-color: rgb(209, 185, 185) ;
}
</style> -->
<div class="container">
            <div class="row">
                <br>
                <div class="col-md-7">
                <h1 >Add Package</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <p>
                        <label for="">Place</label>
                   <input type="text" name="Place" placeholder="Place">
                    </p>
                    <p>
                       <label for="">Description</label>
                       <br>
                        <textarea name="description" placeholder="Description"  rows="10" cols="25"></textarea>
                    </p>
                    <p>
                       <label for="">Price</label>
                        <input type="text" name="cost" placeholder="Cost in NRs"  >
                    </p>
                    <P>
                       
                        <input type="file" name="image" placeholder="Images">
                    </P>
        

                    <button name="Submit">Submit</button>
                </form>
                </div>
            </div>
           
        </div>


</body>
</html>