
<?php
//
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
 ?>
