
<html>
<head>
  <title>NetCar</title>

  <style>
body{

}

#mainBody1{
  text-align: center;
  padding: 20px;
  color: white;

  background-image: url("img/profileCover.jpg"); /* The image used */
  background-color: #cccccc; /* Used if the image is unavailable */
  height: 25%; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
  border-bottom: 1px solid gray;

}
 #mainBody2{
   margin: auto;
   background: white;
   /*border-bottom: 1px solid gray;*/
   text-align: center;
   box-shadow: 0 8px 6px -6px black;
 }
#mainBody2 .avatar{
  margin: auto;
  width: 200;
  font-size: 50px;
  margin-top: 10px;
  box-sizing: border-box;
  border-radius: 10px;
  text-align: center;
  color: white;
  padding: 50px;
  background: gray;
  border: 1px solid dimgray;

  /*-webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);*/

  box-shadow: 0 8px 6px -6px black;

}
#mainBody2 .avatarName{

  padding-top: 20;
  font-size: 20;
  color: black;

 }
#mainBody2 .mainMenu{
   margin: auto;
   width: 75%;

 }
#mainBody2 .mainMenu td{
  font-size: 10px;
  font-weight: bold;
  cursor: pointer;
  padding: 15px;
  text-align: center;
  color: black;
  border: 1px solid white;

}
#mainBody2 .mainMenu td:hover{
    /*background: #0099FF;*/
    color: #0099FF;
    border: 1px solid #0099FF;

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
   margin: auto;
   float: left;

 }



#indBottom{
  float: left;
  width: 100%;

}
  </style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
// When doc is ready
  $(document).ready(function(){
    //alert("test");

    // New cars added
      $(".mainMenuLink1").click(function(){
        //alert("test2");
          $(".left").load("bottom.php");

      });
      // Inbox
        $(".mainMenuLink2").click(function(){
          //alert("test2");
            $(".left").load("bottom.php");

        });
        // Wishlink
          $(".mainMenuLink3").click(function(){
            //alert("test2");
              $(".left").load("bottom.php");

          });
          // Appointments
            $(".mainMenuLink4").click(function(){
              //alert("test2");
                $(".left").load("bottom.php");

            });
            //   //mainMenuLink links click function
              $(".mainMenuLink5").click(function(){
                //alert("test2");
                  $(".left").load("bottom.php");

              });
  });


  </script>

</head>
<body>
  <div id="">
<?php include ('top.php') ?>
</div>

<div style="background: #FFFFFF; ">

<div id="mainBody1">

</div>

<div id="mainBody2">

  <div class="avatar">FL</div>

  <div class="avatarName">Firstname Lastname</div>

  <div style="padding:10; border-bottom: 1px solid whitesmoke; ">union, NJ</div>

  <div class="mainMenu">
    <table width="100%">
      <td width="" class="mainMenuLink1">

                <div>Add a car to Inventory</div>
      </td>
      <td width="" class="mainMenuLink2">

                <div>Inbox</div>
      </td>
      <td width="" class="mainMenuLink3">

                <div>Stattistics</div>
      </td>
      <td width="" class="mainMenuLink4">

                <div>Appointments</div>
      </td>
      <td width="" class="mainMenuLink5">

                <div>Preferrences</div>
      </td>
    </table>
  </div>

</div>
</div>


<div id="mainBody3">
  <div class="left">
    <br/>
    <table width="100%" style="">
      <td width="75%">

        <label style="color: black; font-weight: bold; font-size: 11px ; ">Cars you might be interested in</label>

      </td>
      <td width="25%">
    <class style="text-align: right; float: right; margin-right: 10px;"><a href="" title="Filter" style="color: black; font-weight: bold; font-size: 10px ; ">Filter</a></class>
      </td>
    </table>
    <br/>


    <div class="" style="float: left; margin: 5px; background: white; border: 1px solid whitesmoke; border-radius: 0; border-bottom: 1px solid gray; width: 45%; ">
      <img src="img/car.jpg" style="width: 100%; "/>
      <br/><br/>
      <div style=" font-weight: bold; font-size: 10; padding: 10; ">$150, 000</div>
    </div>

    <div class="" style="float: left; margin: 5px; background: white; border: 1px solid whitesmoke; border-radius: 0; border-bottom: 1px solid gray; width: 45%; ">
      <img src="img/car2.jpg" style="width: 100%; "/>
      <br/><br/>
      <div style=" font-weight: bold; font-size: 10; padding: 10; ">$200, 000</div>
    </div>

    <div class="" style="float: left; margin: 5px; background: white; border: 1px solid whitesmoke; border-radius: 0; border-bottom: 1px solid gray; width: 45%; ">
      <img src="img/indexMustang.jpg" style="width: 100%; "/>
      <br/><br/>
      <div style=" font-weight: bold; font-size: 10; padding: 10; ">$70, 000</div>
    </div>

    <div class="" style="float: left; margin: 5px; background: white; border: 1px solid whitesmoke; border-radius: 0; border-bottom: 1px solid gray; width: 45%; ">
      <img src="img/car3.jpg" style="width: 100%; "/>
      <br/><br/>
      <div style=" font-weight: bold; font-size: 10; padding: 10; ">$30, 000</div>
    </div>



  </div>




  <div class="right">
    <br/>
    <label style="color: black; font-weight: bold; font-size: 11 ; ">Ads</label>
    <br/><br/>
    <div class="" style="border: 1px solid whitesmoke; border-radius: 0; border-bottom: 1px solid gray; background: white; ">
      <img src="img/ad.jpg" style="width: 100%; "/>
      <br/><br/>
      <div style=" font-weight: bold; font-size: 10; padding: 10; padding-bottom: 10; ">Get a new rim today for a 15% off. Hurry up and call +1(999) 999 9999</div>
    </div>
  </div>





</div>

<div id="indBottom" style=" ">

<?php include ('bottom.php') ?>
</div>

</body>
</html>
