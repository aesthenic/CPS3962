<?php
// Inialize session
session_start();

// Check, if the user is already logged in, then jump to the right page
// Customer
if (isset($_SESSION['customerID'])){
header('Location: profile.php');
}
// Dealer
if (isset($_SESSION['dealerID'])){
header('Location: dealer.php');
}
?>
<html>
<head>
  <title>Welcome to NetCar</title>
  <style>
#innerBody{

  margin: auto;
  width: 100%;
  padding-top: 10%;
  text-shadow: 2px 2px 4px #000000;
  color: white;
    background-image: url("img/register.jpg"); /* The image used */
    background-color: #cccccc; /* Used if the image is unavailable */
    height: 100%; /* You must set a specified height */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */

  }
#mainBody1{
  width: 50%;
  margin: auto;
  box-shadow: 0 8px 6px -6px black;
  border-radius: 5px;
  border: 1px solid gray;
  padding: 15px;
  text-align: center;
}
#mainBody1 input{
  width: 65%;
  /*border: none;
  border-bottom: 1px solid gray;*/
  border: 1px solid gray;
  padding: 15px;
  text-align: center;
  background: whitesmoke;
  margin: 5px;

}
#mainBody1 select{
  border: none;
  border-bottom: 1px solid gray;
  padding: 15px;
  text-align: center;
  background: whitesmoke;
  width: 100%
  margin: 5px;
}
#btnSgnUp{
  width: 65%;
  border: 1px solid #0099FF;
  padding: 15px;
  text-align: center;
  background: whitesmoke;
  margin: 5px;
  background: #0099FF;
  color: white;
  cursor: pointer;
  /*font-weight: bold;*/

}
#btnSgnUp:hover{
  border: 1px solid gray;

}


 #indBottom{
   width: 100%;

 }
  </style>
</head>
<body>
  <div id="">
<?php include ('top.php') ?>
</div>

<div id="innerBody">

<div id="mainBody1">

  <h2 style="font-weight: bold; color: white; text-align: center; border-bottom: 1px solid dimgray; padding: 5px; ">Welcome to Netcar</h2><br/>

  <form id="searchForm" action="" method="post">

        <input id="" name="name" type="text" title="Enter your Username" placeholder="Username" /><br/>
        <input id="" name="email" type="text" title="Enter your email" placeholder="Email@gmail.com" /><br/>
        <input id="" name="pwd" type="password" title="Create your account password" placeholder="******" /><br/>
        <input id="" name="pwdCheck" type="password" title="Confirm your account password" placeholder="******" /><br/>
        <select id="" name="type" title="What type of user are you?">
          <option value=""></option>
          <option value="customer">Car buyer</option>
          <option value="dealer">Car Seller</option>
        </select><br/>

        <button id="btnSgnUp" name="signUp" type="submit" value="">Sign Up</button>
    </form>

<?php
      // Sign Up a new Customer / a new Car Dealer
      //include 'php/phpFunctions.php';

      if(isset($_POST['signUp'])){
        // Check that both passwords are the same value
        if(($_POST['pwd']) != ($_POST['pwdCheck'])){
?>
              <script> alert("Both passwords should match"); </script>
<?php
        }else{
          // Check and Get the input values
          //if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['pwdCheck']) isset($_POST['type'])){
            //
            //if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdCheck']) !empty($_POST['type'])){
              // Check the input values are ok
          if(strlen($_POST['name']) > 1 && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", ($_POST['email'])) &&  strlen($_POST['pwd']) > 3 &&  strlen($_POST['type']) > 5){
            //
            $username = trim(htmlentities ($_POST['name'], ENT_QUOTES));
            $email = trim(htmlentities ($_POST['email'], ENT_QUOTES));
            $pwd = htmlentities ($_POST['pwd'], ENT_QUOTES);
            //$pwdCheck = htmlentities ($_POST['pwdCheck'], ENT_QUOTES);
            //$type = trim(htmlentities ($_POST['type'], ENT_QUOTES));

                // In case the user is a customer
                if(($_POST['type']) == "customer"){
                  // Declare the object
                  $customer = new Customer();
                  //$createNewCutomer = $customer->createNewCutomer();
                  $customer->signUpCustomer($username, $email, $pwd);
                }
                  // The user is definetly a Car dealer
                  if(($_POST['type']) == "dealer"){
                    //echo "Programers are working on this";
                    // Declare the object
                    $dealer = new Dealer();
                    //$createNewCutomer = $customer->createNewCutomer();
                    $dealer->signUpDealer($username, $email, $pwd);
                }
         }
    //  }
   //  }
      }
    }
?>

      <a href="login.php" style="color: white; font-size: 10px;">I already have an account</a>

</div>
</div>

<div id="indBottom">

<?php include ('bottom.php'); ?>
</div>

</body>
</html>
