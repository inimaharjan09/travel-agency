<?php

include("config.php");

session_start();

// if (!empty( $_SESSION['user_name'])) {
//      header("Location:viewdeal.php");// if it is logged in already then it will send to the view deal page else they must login first
// }

if(isset($_POST['submit'])){

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
  // $cpass = md5($_POST['cpassword']);
  // $user_type = $_POST['user_type'];

//   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
  $select = " SELECT * FROM user_form WHERE email = '$email' AND  password = '$pass' ";
  $result = mysqli_query($conn, $select);
   

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
//   $pass=password_verify($pass,$row['password']);
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin/dashboard.php');
      }
      elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
        //   header('location: viewdeal.php');
        echo "<script>window.location.href='/travelagency'</script>";
      } 
   }
   else{
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
            <h2>Login form</h2>

            <?php
            if(isset($error)){
                foreach($error as $err){
                    echo '<span class="error-msg">'.$err.'</span>';
                };
            };
            ?>

            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>Don't have an account? <a href="register_form.php">Register now</a></p>
        </form>
    </div>
    <script>
        const formInputs = [...document.querySelectorAll('.form-control input')];
        // const username = document.getElementById('username');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        // const confPassword = document.getElementById('conf-password');
        const form = document.getElementById('form');
        /*for label of inputs*/
        formInputs.forEach((formInput) => {
            formInput.addEventListener('focusin', formInputFocusInHandler);
            formInput.addEventListener('focusout', formInputFocusOutHandler);
        });

        function formInputFocusInHandler() {
            const label = this.parentElement.querySelector('label');
            label.classList.add('active');
        }

        function formInputFocusOutHandler() {
            if (this.value === '') {
                const label = this.parentElement.querySelector('label');
                label.classList.remove('active');
            }
        }

        /*for form validation*/

        form.addEventListener('login', (e) => {
            e.preventDefault();

            checkRequire([email, password]);
            checkEmail(email);
            checkLength(password, 8, 15);
            // checkMatch(password, confPassword);
        });

        function checkEmail(input) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (re.test(input.value.trim())) {
                showSuccess(input);
            } else {
                showError(input, 'Email not valid');
            }
        }

        function showError(input, message) {
            const parent = input.parentElement;
            const smallTag = parent.querySelector('small');
            if (parent.classList !== 'form-control error')
                parent.classList = 'form-control error';
            smallTag.innerText = message;
        }

        function showSuccess(input) {
            const parent = input.parentElement;
            const smallTag = parent.querySelector('small');
            if (parent.classList !== 'form-control success')
                parent.classList = 'form-control success';

        }

        function checkRequire(inputArray) {
            inputArray.forEach(function (input) {
                if (input.value.trim() === '') {
                    const message =
                        input.id.charAt(0).toUpperCase() + input.id.slice(1) + ' is require';
                    showError(input, message);
                } else {
                    showSuccess(input);
                }
            });
        }

        function checkMatch(firstInput, secondInput) {
            if (firstInput !== secondInput) {
                const message =
                    secondInput.id.charAt(0).toUpperCase() +
                    secondInput.id.slice(1) +
                    ' not match';
                showError(secondInput, message);
            } else {
                showSuccess(secondInput);
            }
        }

        function checkLength(input, min, max) {
            if (input.value.length < min) {
                const message =
                    input.id.charAt(0).toUpperCase() +
                    input.id.slice(1) +
                    ` length must be at least ${min} characters`;
                showError(input, message);
            } else if (input.value.length > max) {
                const message =
                    input.id.charAt(0).toUpperCase() +
                    input.id.slice(1) +
                    ` length must be less than ${max} characters`;
                showError(input, message);
            } else {
                showSuccess(input);
            }
        }

    </script>
    <script src="main.js"></script>

</body>

</html>