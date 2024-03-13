<?php
include "header.php";
session_start();

include "connect.php";
$fnameMsg = "";
$lnameMsg = "";
$emailMsg = "";
$passwordMsg = "";
$errorpass = "";
$doublemail = "";
$successMsg = "";

$fname = "";
$lname = "";
$email = "";
$password = "";


if (isset($_POST["submit1"])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  if(empty($fname)){
    $fnameMsg = "First name can't be empty";
  }else if(empty($lname)){
    $lnameMsg = "Last name can't be empty";
  }else if(empty($email)){
    $emailMsg = "Email fields can't be empty";
  }else if(empty($password)){
    $passwordMsg = "Password must be atleast 4 character ";
  }else if($password !== $cpassword){
    $errorpass = "Password does not match";
  }else{
    if(isset($email)){
      $select = mysqli_query($conn, "SELECT * FROM `ecommerce` WHERE `email` = '$email'");
      $result = mysqli_fetch_row($select);
      if($result > 0){
        $emailMsg = "Email already exist";
      }else{
        $insert = mysqli_query($conn, "INSERT INTO `ecommerce`( `fname`, `lname`, `email`, `password`, `cpassword`) VALUES ('$fname','$lname','$email','$password','$cpassword')");
        
        $successMsg = "Account Successfully created";
        header("location:login.php");
      }

    }
  }

}


?>

<div class="signUp-section ">
  <section class="singUp  container">
    <form class="form m-auto mt-4"  action="" method="post">
      <p class="title">Sign Up </p>
      <p class="message">Signup now and get full access to our app. </p>
      <div class="flex">
        <label>
          <input name="fname" value="<?php echo htmlspecialchars($fname) ?>" placeholder="" type="text" class="input">
          <span>Firstname</span>
          <p class=" text-danger"><?php echo $fnameMsg; ?></p>
        </label>
        

        <label>
          <input  name="lname" placeholder="" value="<?php echo htmlspecialchars($lname) ?>" type="text" class="input">
          <span>Lastname</span>
          <p class=" text-danger"><?php echo $lnameMsg; ?></p>
        </label>
      </div>

      <label>
        <input  name="email" placeholder="" value="<?php echo htmlspecialchars($email) ?>" type="email" class="input">
        <span>Email</span>
        <p class=" text-danger"><?php echo $emailMsg; ?></p>
      </label>

      <label>
        <input  name="password" placeholder="" type="password" value="<?php echo htmlspecialchars($password) ?>" class="input">
        <span>Password</span>
        <p class=" text-danger"><?php echo $passwordMsg; ?></p>

      </label>
      <label>
        <input  name="cpassword" placeholder="" type="password" class="input">
        <span>Confirm password</span>
      </label>
      <p class="text-danger"><?php echo $errorpass ?></p>
      <button class="submit" name="submit1">Sign Up</button>
      <p class="signin">Already have an account ? <a href="login.php">Signin</a> </p>
      <p class="fs-5 text-success"><?php echo $successMsg ?></p>
    </form>
  </section>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>