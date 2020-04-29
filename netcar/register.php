
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

        <input id="" type="text" title="Enter your Full name" placeholder="Username" /><br/>
        <input id="" type="text" title="Enter your email" placeholder="Email@gmail.com" /><br/>
        <input id="" type="text" title="Create your account password" placeholder="******" /><br/>
        <input id="" type="text" title="Confirm your account password" placeholder="******" /><br/>
        <select id="" title="What type of user are you?">
          <option value="customer">Car buyer</option>
          <option value="dealer">Car Seller</option>
        </select><br/>

        <button id="btnSgnUp" name="signUp" type="submit" value="">Sign Up</button>
    </form>

    <?php
      //
      //include 'php/phpFunctions.php';
      $customer = new Customer();
      //$createNewCutomer = $customer->createNewCutomer();
      $customer->createNewCutomer("Value");

     ?>

      <a href="login.php" style="color: white; font-size: 10px;">I already have an account</a>

</div>
</div>

<div id="indBottom">

<?php include ('bottom.php'); ?>
</div>

</body>
</html>
