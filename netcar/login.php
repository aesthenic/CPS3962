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
     background-image: url("img/reg.jpg"); /* The image used */
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
 #btnSgnIn{
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
 #btnSgnIn:hover{
   border: 1px solid gray;
   background: #228b22;

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

         <input id="" name="email" type="text" title="Enter your email" placeholder="Email@gmail.com" /><br/>
         <input id="" name="pwd" type="password" title="Enter your account password" placeholder="******" /><br/>

         <button id="btnSgnIn" name="signIn" type="submit" value="">Sign In</button>
       </form>

       <?php
         // Sign In a Customer / a Car Dealer
         //include 'php/phpFunctions.php';

         if(isset($_POST['signIn'])){
             // Check and Get the input values
             //if(isset($_POST['email']) && isset($_POST['pwd'])){
               //
               //if(!empty($_POST['email']) && !empty($_POST['pwd'])){
                 // Check the input values are ok
               $email = trim(htmlentities ($_POST['email'], ENT_QUOTES));
               $pwd = htmlentities ($_POST['pwd'], ENT_QUOTES);

                   // Check first if the user is a customer
                     // Declare the object
                     $customer = new Customer();
                     $userCustomer = $customer->SignInCustomer($email, $pwd);

                     // In case the user is a customer
                     if($userCustomer){
                       // Initialiaze Customer session
                       //var_dump($userCustomer);
                        foreach ($userCustomer as $row) {
                         // code...
                         //echo $row['customerID']."<br>";
                         //we'll start the sessions informations here
                         $_SESSION['customerID'] = $row['customerID'];
                         $_SESSION['nameCust'] = $row['nameCust'];
                       }
?>
                        <script> window.location.href = 'profile.php'; </script>
<?php
                    }else {

                       // Check if the user is a Dealer
                        $dealer = new Dealer();
                        $userDealer = $dealer->SignInDealer($email, $pwd);

                     // In case the user is a car dealer
                      if($userDealer){
                        // Initialiaze Dealer session
                        //var_dump($userDealer);
                         foreach ($userDealer as $row) {
                          // code...
                          //echo $row['dealerID']."<br>";
                          //we'll start the sessions informations here
                          $_SESSION['dealerID'] = $row['dealerID'];
                          $_SESSION['nameDealer'] = $row['nameDealer'];
                        }
?>
                        <script> window.location.href = 'dealer.php'; </script>
<?php
                      }else{
                        // Error in Email or Password
 ?>
                        <script> alert("Your Email or Password is incorrect"); </script>
 <?php
                      }

                     }
      //  }
      //  }
       }

        ?>

       <a href="register.php" style="color: white; font-size: 10px;">I don't have an account</a>

 </div>
 </div>

 <div id="indBottom">

 <?php include ('bottom.php') ?>
 </div>

 </body>
 </html>
