<?php
include "header.php";
include "connect.php";


$email = "";
$password = "";
$erroeMsg = "";
$passwordMsg = "";

if (isset($_POST["submit2"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email && $password)){
        $erroeMsg = "Invalid Password or email";
    }
    $select2 = mysqli_query($conn, "SELECT * FROM `ecommerce` WHERE `email` = '$email' AND `password` = '$password'");
 
    if(mysqli_num_rows($select2) > 0){
      $user = mysqli_fetch_assoc($select2);
      $_SESSION["email"] = $user["email"];
      $_SESSION["password"] = $user["password"];
  
      echo '<h2 style= "color: green">Succesfully login</h2>';
      header("location: index.php");
  }
}



?>

<div class="signUp-section pt-5  ">
    <section class="singUp mt-5 my-auto container">
        <form class="form m-auto  " method="post">
            <p class="title">Sign In </p>
            <p class="message">Signin now and get track of the new product </p>


            <label>
                <input  name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="" type="email" class="input">
                <span>Email</span>
            </label>

            <label>
                <input  name="password" placeholder="" value="<?php echo htmlspecialchars($password); ?>" type="password" class="input">
                <span>Password</span>
            </label>
            <p class="text-danger text-center"><?php echo $erroeMsg; ?></p>

            <button class="submit" name="submit2">Sign In</button>
            <p class="signin">Don't have an account ? <a href="signup.php">Signup</a> </p>
        </form>
    </section>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>