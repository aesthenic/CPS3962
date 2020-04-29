
<?php
// Class that gets connect to the DB
class DBConnection{

  // Private members
  private $server = "localhost";
  private $username = "root";
  private $password = "";
  private $db = "netcardb";
  private $conn;

    // Protected methods
    // Method connecting to the database
    protected function dbConnect(){

      try{
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);

      } catch (Exception $e){

        //echo $e->getMessage();
  ?>
      <script> alert("Connection failed, please check your Internet connection.");</script>
  <?php
      }

      return  $this->conn;
    }

    protected function dbClose(){

      // Close the DB fann_get_total_connections
      mysqli_close($this->conn);
    }

}
?>




<?php
// Class
class Customer extends DBConnection{

  // Private members




  // Public members
  // Create a new customer
  public function createNewCutomer($val){


    if(isset($_POST['signUp'])){
      //echo "test";
?>
      <script> alert("<?php echo $val; ?>"); </script>
<?php
    }
  }

    // Method to retrieve customer row information from the DB
    public function getCustomerInfo(){

      $sql = "SELECT * FROM `customer`";
      // Method dbConnect of the class DBConnection
      $result = $this->dbConnect()->query($sql);
      $numRows = $result->num_rows;
      // Close the DB fann_get_total_connections
      $this->dbClose();
      //
      if($numRows > 0){
        //
        while($row = $result->fetch_assoc()){

          ?>
          <script> alert("test"); </script>
          <?php

          $data[] = $row;
/*
          //
          foreach ($data as $value) {
            // code...
            echo $value['nameCust']."<br>";
            echo $value['adrCust']."<br>";
          }
*/
        }
        return $data;
      }
    }



}
 ?>

 <?php
 // Class
 //class Dearler extends DBConnection{

   // Private members




   // Public members
//}
?>

























<?php
/*
class User{

  private $server = "localhost";
  private $username = "root";
  private $password = "";
  private $db = "netcardb";
  private $con;

  // Connection to the server
  public function __construct(){

    try{
      $this->con = new mysqli($this->server, $this->username, $this->password, $this->db);

    } catch (Exception $e){
?>
    <script> alert(<? echo "connection failed" . $e->getMessage(); ?>);</script>
<?php
    }
  }

  // Create a new
  public function createNewCutomer(){
    //echo "test";

    if(isset($_POST['signUp'])){
?>
      //echo "TEST";
      <script> alert("test"); </script>
<?php
    }
  }

}
*/
 ?>
