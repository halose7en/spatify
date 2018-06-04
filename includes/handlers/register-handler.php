<?php 
//Login Form input FILTERS (functions)
function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}
function sanitizeFormUserName($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}
function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
    //protects site from users inputing custome code
    $inputText = str_replace(" ", "", $inputText);
    //It replaces all spaces with no spaces(It's a swap function) examp "a" to "b"
    //no spaces for user data base MSQL
    $inputText = ucfirst(strtolower($inputText));
    //to upper case the first letter of the string
    return $inputText;
}
if(isset($_POST['registerButton'])) {
//Register button was pressed (String sanitization function code above)
				//Calling a function
	$userName = sanitizeFormUserName($_POST['userName']);
	$firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($userName, $firstName, $lastName, $email, $email2, $password, $password2);

	if($wasSuccessful == true) {
		header("Location: index.php");
	}
	//If registration is succesfull bring user to index page

}

 ?>