<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location:login_form.php");
    // echo "<script>window.location.href='';</script>";
    // if it is logged in already then it will send to the view deal page else they must login first
}
include_once "config.php";

if(isset($_POST["Book"])){
    $name = $_POST["name"];
    $date= $_POST["date"];
    // $date = date('Y-m-d',$date);
    $mid = $_POST['id'];

    function insert_booking($name,$date,$mid){
        global $conns;
        $sql="INSERT INTO reservation(res_name,res_date,id) VALUES(?,?,?)";
        $stmt = $conns->prepare($sql);
        $stmt->execute(array($name,$date,$mid));
        // $statement->execute([
        //     'fname' => 'Bob',
        //     'sname' => 'Desaunois',
        //     'age' => '18',
        // ]);
        // $reservations = $stmt->fetchAll();
        $stmt->closeCursor();
    // return $reservations;
      }
    //   $statement->execute([
    //     'fname' => 'Bob',
    //     'sname' => 'Desaunois',
    //     'age' => '18',
    // ]);


//     echo "<br>".$name."<br>";
//     echo $date."<br>";
//     echo $mid."<br>";
//     // die();
// var_dump($name);
// var_dump($date);
// var_dump($mid);

try {
    insert_booking($name,$date,$mid);
} catch (Exception $e){
    //throw $th;
    echo $e->getMessage();
    die();
}
    // $sql = "INSERT INTO `reservation`(`res_name`, `res_date`, `id`) VALUES($name,$date,$mid)";
    // if ($con_obj->query($sql) === TRUE) {
    // echo "New record created successfully";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    // $sql = "INSERT INTO `reservation`(res_name, res_date, id) VALUES($name,$date,$mid)";
    // mysqli_query($conn,$sql);
}

?>
<html>

<head>
    <title>Travel Agency System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Travel Agency</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        <!-- <span class="sr-only">(current)</span> -->
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Tour package</a>
                </li>

                <?php if(!isset($_SESSION['user_name'])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="login_form.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register_form.php">Register</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <center>
    <form action="" method="post" name="booking" onsubmit="return validate()">
        <?php 
            if(isset($_GET['id'])){
                $main_id = $_GET['id'];
                $sql = mysqli_query($conn, "SELECT * FROM packages WHERE id = $main_id");
                while($main_result = mysqli_fetch_assoc($sql)){
        ?>
        <div class="card" style="width: 18rem;">
        <br>
        
                    <img src="images/<?= $main_result['images'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $main_result['Place'] ?></h5>
                        <p class="card-text"><?= $main_result['description'] ?></p>
                        <p class="card-text"><?= $main_result['cost'] ?></p>
                        
                    </div>
                </div>
        <input type="hidden" name="id" value="<?=$main_result['id']?>" > <br>
        <?php }
            } ?>
        <input type="text" name="name" placeholder= "Enter your Name" id="name"> <br>
        <input type="date" name="date" placeholder="Date" id="date"> <br>
       <button name="Book" type="submit" id="submit">Book</button>
    </form>
        </center>
        <script>
            function validate(){
            var name = document.booking.name;
            var letters = /^[A-Za-z_ -]+$/;
            if (name.value.match(letters)){
                return true;
            }
            else{
                alert('Fullname must have alphabet characters only');
                name.focus();
                return false;
            }
            const btn1 = document.getElementById("submit");
            const checkIn = document.getElementById("date");
            submit.addEventListener("click", minDate);

            function minDate() {
            const checkInDate = new Date(checkIn.value);
            const nowDate = new Date();

            if (checkInDate > nowDate) {
                alert("Invalid date provided");
            }
            }
            alert("Booking has been Success");
            return true;
        }
        </script>