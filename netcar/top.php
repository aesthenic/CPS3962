<?php include ('php/phpFunctions.php'); ?>

<html>
<head>
  <script type="text/javascript">

   // setTimeout(function(){
   //     location.reload();
   // },5000);

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</script>
  <style>
  body{
    margin: auto;
    width: 100%;
    font-family: 'Comic Neue', cursive;
    font-family: 'Roboto', sans-serif;
    font-family: Arial, Helvetica, sans-serif;
     font-size: 10px;
     /*text-shadow: 2px 2px 4px #000000;*/
     background: whitesmoke;
     /*background: #333333;
     text-align: justify;*/
     color: dimgray;

  }
  a{
    text-decoration: none;
    cursor: pointer;
  }
#topArea{
  /*width: 85%;*/
  margin: auto;
  padding-left: 5%;
  padding-right: 5%;
  padding-top: 5px;
  padding-bottom: 5px;
  color: #FFFFFF;
  position: fixed;
    width: 90%;
    top: 0;
    left: 0;
    background: #17202a;
    /*box-shadow: 0 8px 6px -6px black;*/
    text-shadow: 2px 2px 4px #000000;
}
#netCar{
  font-size: 30px;
  text-decoration: none;
  font-weight: bold;
  color: #e67e22;
  font-family: Broadway, Helvetica, sans-serif;
}
#topSearchInput{
  text-align: center;
  color: #FFFFFF;
  width: 100%;
  /*border-radius: 10px;*/
  padding: 5px;
  background: #17202a;
  border: none;
  border-bottom: 1px solid dimgray;

}
#topSearchInput:hover{
  border-bottom: 1px solid #FFFFFF;

}
  </style>
</head>
<body>
  <div id="topArea">
  <table width="100%">
    <td width="25%">
      <a href="index.php" id="netCar" style="">NetCar</a>

    </td>

    <td width="50%">
      <?php
      // $uri = $_SERVER['REQUEST_URI'];
      // echo $uri .'<br>'; // Outputs: URI
      //
      // $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
      //
      // $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      // echo $url .'<br>'; // Outputs: Full URL
      //
      // $query = $_SERVER['QUERY_STRING'];
      // echo $query .'<br>'; // Outputs: Query String
      ?>

      <?php
      // Check if page is car search related to display the search bar
      $currentURI = $_SERVER['REQUEST_URI'];
      // If current URI is search related
      if($currentURI == '/netcar/browse.php'){
        // Display the search bar
       ?>
      <form id="" action="browse.php" method="POST" style="text-align: center; ">
        <input id="topSearchInput" name="topSearchInput" type="text" title="Enter car year make and model" placeholder="2020 Ford Mustang" size="" />
      </form>
      <?php
      }
       ?>
    </td>

    <td width="25%">
<?php
// If both Customer and Dealer session does not exit, show -> sign In | Get Started
if (!isset($_SESSION['customerID']) && !isset($_SESSION['dealerID'])){
?>

<div style="text-align: right; ">
  <a href="browse.php" style="color: white; font-size: 12px;">Browse</a>
  <label style="color: white; "> | </label>
  <a href="login.php" style="color: white; font-size: 12px;">Sign In</a>
  <label style="color: white; "> | </label>
  <a href="register.php" style="color: white; font-size: 12px;">Get Started</a>
</div>

<?php
}else{
  // In case both customer and dealer sessions exist
  // If only the customer session exists -> Sign Out | customer First Lastname
  if(isset($_SESSION['customerID']) && !isset($_SESSION['dealerID'])){
?>

<div style="text-align: right;">
  <a href="logout.php" style="color: white; font-size: 12px;">Sign Out</a>
  <label style="color: white; "> | </label>
  <a href="register.php" style="color: white; font-size: 12px;"><?php echo $_SESSION['nameCust']; ?></a>
</div>

<?php
  }
  // If only the dealer session exists -> Sign Out | dealer First Lastname
  if(!isset($_SESSION['customerID']) && isset($_SESSION['dealerID'])){
?>

<div style="text-align: right;">
  <a href="logout.php" style="color: white; font-size: 12px;">Sign Out</a>
  <label style="color: white; "> | </label>
  <a href="register.php" style="color: white; font-size: 12px;"><?php echo $_SESSION['nameDealer']; ?></a>
</div>

<?php
  }
}
?>
    </td>
  </table>
</div>
</body>
</html>
