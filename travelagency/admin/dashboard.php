<?php
    session_start();
    include_once "../config.php";

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
            <li class="active">
                <a href="#">
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
            <li>
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="../index.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
             
            </div>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>

                        <div class="number">
                        <?php                                                                        
                            $sql = "SELECT Id FROM user_form ORDER BY Id";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_num_rows($result);
                            echo $row;
                            ?>
                    </div>

                        </h3>
                        <div class="card-name">No. of Users</div>
                    </span>
                </li>
                <li>
                    <i class='bx bx-task-x'></i>
                    <span class="text">
                        <h3>

                        <div class="number">
                        <?php                                                                        
                            $sql2 = "SELECT res_id FROM reservation ORDER BY res_id";
                            $result2=mysqli_query($conn,$sql2);
                            $row = mysqli_num_rows($result2);
                            echo $row;
                            ?>
                    </div>

                        </h3>
                        <p><a href="manage-bookings.php">Booked detail</p>
                        
                    </span>
                </li>
              
            </ul>
          
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../js/dash.js"></script>
</body>

</html>