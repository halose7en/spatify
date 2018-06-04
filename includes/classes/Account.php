<?php 
	class Account {
//Private means these can only be called within this class
		private $con;
		private $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}
 
//This function (register is calling all other functions bellow)
		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUserName($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
				//Insert into db
				//If array is empty insert data into data base if not give error
				return insertUserDetails($un, $fn, $ln, $em, $pw);
			}
			else {
				return false;
			}
		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				//this checks that $error exits in $errorArray
				$error = "";
			}
			return "<span class='erroMessage'>$error</span>";
		}
		private function insertUserDetails($un, $fn, $ln, $em, $pw) {
				$encryptedPw = md5($pw);  //Password will "return" -> lsadkjsldfjlsdkf
                //md5 Ecription method 
				$profilePic = "assets/images/profile-pics/craig.jpg";
				$date = date("Y-m-d");  //year/month/date

				$results = mysqli_master_query($this->con, "INSERT INTO users VALUES (")
		}		

		//Login Form input VALIDATION (functions)
		private function validateUserName($un)	{
 	//check length of user name
 			if (strlen($un) > 25 || strlen($un) <5){
 				array_push($this->errorArray, Constants::$userNameCharacters);
 				return;
 				//This sets character limits and minimums
 				//if string length is greater than 25 characters or if (sl) is less than 5
 			}
//TODO: check if username exists (users tables must be setup)
		}
		private function validateFirstName($fn)	{
 			if (strlen($fn) > 25 || strlen($fn) <2){
 				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;	
 				//This sets character limits and minimums
			}
		}
		private function validateLastName($ln)	{
 			if (strlen($ln) > 25 || strlen($ln) <2){
 				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;	
 				//This sets character limits and minimums
 			}
		}
		private function validateEmails($em, $em2)	{

			if($em != $em2)	{
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
				//if $em is not euql to $em2 push error array(checking they are the same)
				//This makes sure both emails match
			}
//TODO: Check that username hasen't already been used
			
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
				//checking the email contains @
			}
		}
		private function validatePasswords($pw, $pw2)	{
			if($pw != $pw2)	{
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
				//this makes sure that both passwords match
			}
			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
				//if it dosent have the folloing characters assigned (its set up to only accept letters and numbers)
			}
			if (strlen($pw) > 30 || strlen($pw) <5){
 				array_push($this->errorArray, Constants::$passwordCharacters);
				return;	
 				//This sets character limits and minimums
 				//To check if it contains anything more than numeric characters.
 			}


		}

	}
 ?>