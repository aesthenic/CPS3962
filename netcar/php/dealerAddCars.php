<?php
/*
Linked pages
    dealer.php -> dealerAddCars.php -> uploadCarFiles.php
*/

 ?>
<?php
// Inialize session
session_start();

// Check, if the user is already logged in, then jump to the right page
// // Customer
// if (!isset($_SESSION['customerID'])){
// header('Location: index.php');
// }
// If Dealer session does not exist, go back to login page
if (!isset($_SESSION['dealerID'])){
header('Location: login.php');
}
?>
<?php
// Script called by $('.addCarMain1Guide4').click(function(){...}) to add a car to the DB
// Call by clicking on post link click
if(isset($_POST ['yearCar']) && isset($_POST ['nameCar'])  && isset($_POST ['modelCar'])  && isset($_POST ['typeCar'])  && isset($_POST ['extcolorCar'])  && isset($_POST ['intColorCar'])  && isset($_POST ['sellPriceCar'])  &&
isset($_POST ['vinCar'])  && isset($_POST ['descripCar'])  /*&& isset($_POST ['hiddenDataCar'])*/){
//if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
// Retrieve the VALUES
$yearCar = trim(htmlentities ($_POST['yearCar'], ENT_QUOTES));
$nameCar = htmlentities ($_POST['nameCar'], ENT_QUOTES);
$modelCar = trim(htmlentities ($_POST['modelCar'], ENT_QUOTES));
$typeCar = htmlentities ($_POST['typeCar'], ENT_QUOTES);
$extcolorCar = trim(htmlentities ($_POST['extcolorCar'], ENT_QUOTES));
$intColorCar = htmlentities ($_POST['intColorCar'], ENT_QUOTES);
$sellPriceCar = trim(htmlentities ($_POST['sellPriceCar'], ENT_QUOTES));
$vinCar = htmlentities ($_POST['vinCar'], ENT_QUOTES);
$descripCar = trim(htmlentities ($_POST['descripCar'], ENT_QUOTES));
// received from "uploadCarFiles.php" page
$hiddenDataCar = $_SESSION['thisCarPictures'];
$dealerID = $_SESSION['dealerID'];

    // List a Vehicle
    include ('phpFunctions.php');
    $vehicle = new Vehicle();
    $result = $vehicle->listACar($yearCar, $nameCar, $modelCar, $typeCar, $extcolorCar, $intColorCar, $sellPriceCar, $vinCar, $descripCar, $hiddenDataCar, $dealerID);
    // Upon method execution, then sussess message

}
?>
<html>
<head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
// When page is ready, these function uplad car pictures
      $('.file_drag_area').on('dragover', function(){
           $(this).addClass('file_drag_over');
           return false;
      });
      $('.file_drag_area').on('dragleave', function(){
           $(this).removeClass('file_drag_over');
           return false;
      });
      //
      $('.file_drag_area').on('drop', function(e){
           e.preventDefault();
           $(this).removeClass('file_drag_over');
           var formData = new FormData();
           var files_list = e.originalEvent.dataTransfer.files;
           //console.log(files_list);
           for(var i=0; i<files_list.length; i++)
           {
                formData.append('file[]', files_list[i]);
           }
           //console.log(formData);
           $.ajax({
                url:"php/uploadCarFiles.php",
                method:"POST",
                data:formData,
                contentType:false,
                cache: false,
                processData: false,
                success:function(data){
                     $('#uploaded_file').html(data);
                }
           })
      });
// End

// $('.nextSelector').click(function(){
//     $("#addCarMain2").fadeIn();
//     $("#addCarMain3").fadeOut();
//   });

// Add car description link
$('.addCarMain1Guide1').click(function(){
  //   $("#addCarMain2").animate({
  //     left: '250px',
  //     opacity: '0.5',
  //     height: '150px',
  //     width: '150px'
  // });
  $("#addCarMain2").fadeOut();
  $("#addCarMain3").fadeIn();
  });
// When addCarMain4 div is clicked
  $("#addCarMain4").click(function(){
    // Relod this section of the page
    $(".left").load("php/dealerAddCars.php");
    });

  // upload picture link
  $('.addCarMain1Guide2').click(function(){
      $("#addCarMain2").slideToggle();
    });
// review link
    $('.addCarMain1Guide3').click(function(){

      $("#addCarMain2").fadeIn();
      $("#addCarMain3").fadeIn();
      });


// submit the post
    $('.addCarMain1Guide4').click(function(){
        // $("#addCarMain2").slideToggle();
        // $("#addCarMain3").slideToggle();

        //alert('Test');
    // get the values from the form
		var yearCar = $('#yearCar').val();
    var nameCar = $('#nameCar').val();
    var modelCar = $('#modelCar').val();
    var typeCar= $('#typeCar').val();
    var extcolorCar = $('#extColorCar').val();
    var intColorCar = $('#intColorCar').val();
    var sellPriceCar = $('#sellPriceCar').val();
    var vinCar = $('#vinCar').val();
    var descripCar = $('#descripCar').val();
    //var hiddenDataCar = $('#hiddenDataCar').val();

    // if ENTER key is pressed
	//	if (event.keyCode == 13) {
		//$("msg_side_2_post_area_textarea").val('');
		//if ($.trim(content_message) == "") {

    // check that all entries are good to go
			if (yearCar == "" || nameCar == "" || modelCar == "" || typeCar == "" || extColorCar == "" || intColorCar == "" || sellPriceCar == "" || vinCar =="" || descripCar == "" /*|| hiddenDataCar ==""*/){
				alert("Pictures or some input information missing");
			} else{

        $.post('php/dealerAddCars.php',{yearCar: yearCar,
                                  nameCar: nameCar,
                                  modelCar: modelCar,
                                  typeCar: typeCar,
                                  extcolorCar: extcolorCar,
                                  intColorCar: intColorCar,
                                  sellPriceCar: sellPriceCar,
                                  vinCar: vinCar,
                                  descripCar: descripCar,
                                /*hiddenDataCar: hiddenDataCar*/},
	     function(output){
		       //$('#addCarMain4').html(output).show();
					});
        // Upon success
      // JQuery Effects here
			$('#addCarMain4').fadeIn(1000);
      $('#addCarMain2').fadeOut();
      $('#addCarMain3').slideToggle(1000);
      // Relod this section of the page
      //$(".left").load("php/dealerAddCars.php");

      // Empty the inputs.
      $('#yearCar').val('');
      $('#nameCar').val('');
      $('#modelCar').val('');
       $('#typeCar').val('');
      $('#extColorCar').val('');
      $('#intColorCar').val('');
      $('#sellPriceCar').val('');
      $('#vinCar').val('');
      $('#descripCar').val('');
      $('#hiddenDataCar').val('');

		}
//	}

      });
// End

 });
 </script>
<style>
#addCarMain{
  background: #FFFFFF;
  padding: 5px;
  color: dimgray;

}

#addCarMain1 .addCarMain1Guide1{
  text-align: center;
  font-size: 10px;
  color: #FFFFFF;
  background: #0099FF;
  padding: 10px;
  cursor: pointer;

}
#addCarMain1 .addCarMain1Guide2, .addCarMain1Guide3, .addCarMain1Guide4{
  /*visibility: hidden;*/
  text-align: center;
  font-size: 10px;
  color: #FFFFFF;
  background: #0099FF;
  padding: 10px;
  cursor: pointer;

}
#addCarMain1 .addCarMain1Guide1:hover{
  background: #228b22;
}
#addCarMain1 .addCarMain1Guide2:hover{
  background: #228b22;
}
#addCarMain1 .addCarMain1Guide3:hover{
  background: #228b22;
}
#addCarMain1 .addCarMain1Guide4:hover{
  background: #228b22;
}

#addCarMain2{
  display: none;
}
#addCarMain2 .file_drag_area{
                width:70%;
                margin: auto;
                height:100px;
                border:1px dashed #ccc;
                line-height:100px;
                text-align:center;
                font-size:10px;
           }
#addCarMain2 .file_drag_over{
                color: #0099FF;
                border-color: #0099FF;
           }
#uploaded_file{
  width: 100%;
  margin: auto;
  text-align: center;
}

#addCarMain3{
  width: 70%;
  margin: auto;
  text-align: center;
  /*border: 1px solid gainsboro;*/
}
#addCarMain3 input{
  width: 100%;
  margin: auto;
  border: none;
  text-align: center;
  border-bottom: 1px solid gainsboro;
  padding: 10px;

}
#addCarMain3 select{
  width: 100%;
  border: none;
  text-align: center;
  border-bottom: 1px solid gainsboro;
  padding: 10px;
}
#addCarMain3 textarea{
  font-family: 'Roboto', sans-serif;
  width: 100%;
  border: none;
  border-bottom: 1px solid gainsboro;
  padding: 10px;
}

#addCarMain3 input:hover{
  cursor: pointer;
}
#addCarMain3 textarea:hover{
  cursor: pointer;
}
#addCarMain3 input:focus{
  border-bottom: 1px solid gray;
}
#addCarMain3 textarea:focus{
  border-bottom: 1px solid gray;
}
</style>
</head>
<body>
<div id="addCarMain">
<div id="addCarMain1">
  <table width="100%" style="border-bottom: 1px solid gainsboro; ">
    <td width="25%" >
      <div class="addCarMain1Guide1" style=" ">Car informations</div>
    </td>

    <td width="25%">
<div class="addCarMain1Guide2" style=" ">Upload pictures</div>
</td>

<td width="25%">
<div class="addCarMain1Guide3" style=" ">Review</div>
</td>

<td width="25%">
<div class="addCarMain1Guide4" style=" ">Post</div>
</td>
  </table>

  <br/>
</div>

<div id="addCarMain2">
              <div class="file_drag_area">
                     Drop Car Pictures Here
                </div>
                <br/>
                <div id="uploaded_file"></div>

</div>


<div id="addCarMain3">
              <input type="text" id="yearCar" placeholder="2020" class="" title="What is this car year?"/><br/>
              <input type="text" id="nameCar" placeholder="Ford" class="" title="What is this car Make?"/><br/>
              <input type="text" id="modelCar" placeholder="Mustang GT" class="" title="What is this car model?"/><br/>
              <select id="typeCar" name="typeCar" style="text-align: center;" title="What type of car is it?">
                <option value=""></option>
                <option value="sedean">Sedan</option>
                <option value="suv">Suv</option>
                <option value="truck">Truck</option>
              </select><br/>
              <input type="text" id="extColorCar" placeholder="Exterior color" class="" title="What color is the exterior?"/><br/>
              <input type="text" id="intColorCar" placeholder="Interior color" class="" title="What color is the interior?"/><br/>
              <input type="text" id="sellPriceCar" placeholder="$40,000 " class="" title="How much are you selling this car?"/><br/>
              <input type="text" id="vinCar" placeholder="VIN number" class="" title="What is this car VIN number of this car?"/><br/>
              <textarea value="" id="descripCar" placeholder="More Info about this car.." name="" cols=""  rows="4" id="" value=""></textarea>
  </div>
<br><br>
  <div id="addCarMain4" style="width: 90%; margin: auto; padding: 15px; color: white; background: #e67e22; text-align: center; cursor: pointer; display: none;">
    This car is succefully posted online. Click here to continue
  </div>

  <br/><br/><br/>
</div>
</div>
</body>
</html>
