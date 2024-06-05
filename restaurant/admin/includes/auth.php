<?php

// I used this auth.php file for classes and functions..

session_start();


class dbConfig // this is the class for database connection
{
    // Database Connection Properties (host name, dbusername, dbpassword and dbname)
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = "food";

    // connection property (make sure that no db is connected before)
    public $con = null; 

    // call constructor (constructor call without making object it means that when the file run constructor will be automaticly call and strat db connection)
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database); // here we have mysqli_connect function which coonect db, we put parameter to coonect
        if ($this->con->connect_error){ // this check the connection is made or not
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct() // when program ends __destruct call and discoonect the db
    {
        $this->closeConnection(); // this call the bellow funtion to disconnect
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}

class Auth  // this is the class where all other function are created
{

	public $db = null;
    private $userTable = 'user'; // varable for user table


    public function __construct(dbConfig $db) // thsi connect the class with the dbconfig class
    {
        if (!isset($db->con)) return null;
        $this->dbConnect = $db;
    }

//this check if user/admin login the redirct it from login page to other pages
	public function LoginCheck(){ 
		if(isset($_SESSION["UserUserid"])) {
			header("Location: index.php");
		} elseif(isset($_SESSION["adminUserid"])) {
			header("Location: index.php");
		}
	}

	//this check if admin is not login than dont allow to spacfic page
	public function adminLoginStatus(){
		if(empty($_SESSION["adminUserid"])) {
			header("Location: ../login.php");
		}
	}

	//this check if user is not login than dont allow to spacfic page

    public function UserLoginStatus(){
		if(empty($_SESSION["UserUserid"])) {
			header("Location: login.php");
		}
	}

	//this is the function when user give login detail and click login than this function is called and this check what to do.. uf infor is correct function create a _SESSION if worng than display error message
    public function login(){
		$errorMessage = '';
		if(isset($_POST["login"]) && $_POST["loginId"]!=''&& $_POST["loginPass"]!='') {

			$loginId = $_POST['loginId'];
			$password = $_POST['loginPass'];

			if(isset($_COOKIE["loginPass"]) && $_COOKIE["loginPass"] == $password) {
				$password = $_COOKIE["loginPass"];
			} else {
				$password = md5($password);
			}
			$sqlQuery = "SELECT * FROM ".$this->userTable."
				WHERE email='".$loginId."' AND password='".$password."' AND status = 'active' ";

			$resultSet = mysqli_query($this->dbConnect->con, $sqlQuery);
			$isValidLogin = mysqli_num_rows($resultSet);
			if($isValidLogin){
				if(!empty($_POST["remember"]) && $_POST["remember"] != '') {
					setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60));
					setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
				} else {
					$_COOKIE['loginId' ]='';
					$_COOKIE['loginPass'] = '';
				}
				$userDetails = mysqli_fetch_assoc($resultSet);
				if($userDetails['type'] == 'user'){
					$_SESSION["UserUserid"] = $userDetails['id'];
					$_SESSION["UserName"] = $userDetails['name'];
					$errorMessage = " login!";
	
					header("location: index.php");
				} 
				
				elseif($userDetails['type'] == 'admin') {
					$_SESSION["adminUserid"] = $userDetails['id'];
					$_SESSION["admin"] = $userDetails['name'];
					$errorMessage = " login!";
	
					header("location: index.php");
				}
			
			} else {
				$errorMessage = "Invalid login!";
			}
		} else if(!empty($_POST["loginId"])){
			$errorMessage = "Enter Both username and password!";
		}
		return $errorMessage;
	}

	// this is call when user register this save the infrmation in user tabel in db and also check the, wheter user is already exest or not
    public function register(){
		$message = ''; 
		if(isset($_POST["register"]) && !empty($_POST["passwd"]) && $_POST["passwd"] !='' && $_POST["passwd"] != $_POST["cpasswd"]){
			$message = "Confirm password is not same.";
		}
		elseif(isset($_POST["register"]) && $_POST["email"] !='') {
			$sqlQuery = "SELECT * FROM ".$this->userTable."
				WHERE email='".$_POST["email"]."'";
			$result = mysqli_query($this->dbConnect->con, $sqlQuery);
			$isUserExist = mysqli_num_rows($result);
			if($isUserExist) {
				$message = "User already exist with this email address.";
			} else {
				$insertQuery = "INSERT INTO ".$this->userTable."(name, contact, address, email, password)
				VALUES ('".$_POST["name"]."', '".$_POST["contact"]."', '".$_POST["address"]."','".$_POST["email"]."', '".md5($_POST["passwd"])."')";
				$userSaved = mysqli_query($this->dbConnect->con, $insertQuery);
				if($userSaved) {
					$message = "Registration Completed.";
				} else {
					$message = "User register request failed.";
				}
			}
		}
		return $message;
	}

	// this take the information form db tables and display it where we want
    public function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect->con, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($result));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
    }

	//this set the data in db table when we want to edit or delele or add
    public function setData($sqlQuery) {
        $message = '';
        $userSaved = mysqli_query($this->dbConnect->con, $sqlQuery);

        if($userSaved){
            $message = 'Data Updated';
        }

    return $message;

    }

	// this count only rows for spacfic table in db but we dont need it still.. i just create as convention
	public function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect->con, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($result));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
    }
    

}

// we need to create object of class to execte it
$db = new dbConfig();   //this is db object 
$Auth = new Auth($db); // this is the 2nd class object





?>