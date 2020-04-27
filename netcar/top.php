
<?php //include ('php\phpFunctions.php'); ?>

<html>
<head>
  <script type="text/javascript">
/*   setTimeout(function(){
       location.reload();
   },5000);*/
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
  body{
    margin: auto;
    width: 100%;
    font-family: 'Comic Neue', cursive;
    font-family: 'Roboto', sans-serif;
    font-family: Arial, Helvetica, sans-serif;
     font-size: 12px;
     /*text-shadow: 2px 2px 4px #000000;*/
     background: whitesmoke;
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
  </style>
</head>
<body>
  <div id="topArea">
  <table width="100%">
    <td width="70%">
      <a href="index.php" id="netCar" style="">NetCar</a>

    </td>
    <td width="30%">
      <div style="text-align: right; ">
        <a href="login.php" style="color: white; font-size: 12px;"> Login</a>
        <label style="color: white; "> | </label>
        <a href="register.php" style="color: white; font-size: 12px;">Register</a>
      </div>
    </td>
  </table>
</div>

</body>
</html>
