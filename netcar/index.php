<html>
<head>
  <title>Welcome to NetCar</title>
  <style>
body{

}

#searchArea{
  text-align: center;
  padding: 20px;
  color: white;

  background-image: url("img/indexMustang.jpg"); /* The image used */
  background-color: #cccccc; /* Used if the image is unavailable */
  height: 80%; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */


}
 #searchArea label{
   font-size: 25px;
   font-weight: bold;
   text-shadow: 2px 2px 4px #000000;
 }
#searchInput{
  padding: 15px;
  border: 1px solid gray;
  border: none;
  margin-right: 0px;
  text-align: center;
  box-shadow: 2px 2px 4px #000000;

}
#btnSearch{
  background: white;
  padding: 15px;
  border: 1px solid gray;
  margin-left: -5px;
  cursor: pointer;
  box-shadow: 2px 2px 4px #000000;

}
#btnSearch:hover{
  background: #0099FF;
  padding: 15px;
  color: dimgray;
  border: 1px solid #0066FF;
  margin-left: -5px;
  cursor: pointer;
  color: white;
  font-weight: bold;

}
#mainBody3{
  margin: auto;
  width: 75%;
  padding: 5;

}
 #mainBody3 .left{
   width: 75%;
   margin: auto;
   float: left;

 }
 #mainBody3 .right{
   width: 25%;
   float: left;

 }


 #indBottom{
   float: left;
   width: 100%;

 }
  </style>
</head>
<body>
  <div id="">
<?php include ('top.php') ?>
</div>

<div id="mainBody1">

</div>

<div id="mainBody2">
  <div id="searchArea">
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <label> Purchase your dream car today</label><br/><br/><br/>
  <form id="searchForm" action="" method="post">

        <input id="searchInput" type="text" title="Enter car year make and model" placeholder="2020 Ford Mustang" size="55%" />

        <input id="btnSearch" type="button" value="Search" />


      </form>
    </div>
</div>

<div id="mainBody3" style="height: 50%; ">

  <div class="left">gghljgkjkjk</div>

  <div class="right">iyuiuyiuyiuyuiy</div>



    <br/><br/><br/>
  From Slide Tooggle menu of User (Settings - Logout)

  https://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_eff_slidetoggle

</div>

<div id="indBottom">

<?php include ('bottom.php') ?>
</div>

</body>
</html>
