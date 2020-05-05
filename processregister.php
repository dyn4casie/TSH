<?php session_start();
    require_once('functions/user.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
    require_once('functions/token.php');
//Collecting the data

$errorCount = 0;

//Verifying the data, validation

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :  $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] :  $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] :  $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;
$date = date("Y-m-d, h:i:sa");

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;
$_SESSION['reg_date'] = $date;

if($errorCount > 0){

     $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: register.php");

}else{

date_default_timezone_get("Africa/Lagos");
$reg_date = date('d M Y h:i:s A');

    $allUsers = scandir("db/users/"); // return @array (2 filled)
    $countAllUsers = count($allUsers);

    $newUserId = ($countAllUsers - 1);

    $userObject = [
        'id'=>$newUserId,
        'reg_date'=>$reg_date,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=> password_hash($password, PASSWORD_DEFAULT), //password hashing
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department
    ];

    //Check if the user already exists.
    $userExists = find_user($email);

        if($userExists == $email . ".json"){
            $_SESSION["error"] = "Registration Failed, User already exits ";
            header("Location: register.php");
            die();
        }
        

    //save in the database;
    save_user($userObject);

    $_SESSION["message"] = "Registration Successful, you can now login " . $first_name;
    header("Location: login.php");
}

//Validating email entry
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is a valid email address");
  } else {
    $_SESSION["error"] = "Invalid Email address" ;
      header("Location: register.php");
  }
  if (strlen($email) < 5){
      $_SESSION["error"] = "email must have more than 5 characters";
      header("Location: register.php");
  }
  
  // validate first name 
  if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
    $_SESSION["error"] = "For names Only letters and white space allowed" ;
      header("Location: register.php");
  }
  if (strlen($first_name) < 3){
      $_SESSION["error"] = "Firstname must have more than 2 characters";
      header("Location: register.php");
  }
  
  // validate last name
  if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    $_SESSION["error"] = "For names Only letters and white space allowed" ;
    header("Location: register.php");}
  if (strlen($last_name) < 3){
      $_SESSION["error"] = "lastname must have more than 2 characters";
      header("Location: register.php");}
    ?>










<!--//initial code

/*$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$designation = $_POST['designation'];
$department = $_POST['department']; 

$errorArray = [];
//verifying the data - validation

if($first_name == "") {
    $errorArray = "First_name cannot be blank";
}
if($last_name == "") {
    $errorArray = "Last_name cannot be blank";
}
if($email == "") {
    $errorArray = "Email cannot be blank";
}
if($password == "") {
    $errorArray = "Password cannot be blank";
}
if($gender == "") {
    $errorArray = "Gender cannot be blank";
}
if($designation == "") {
    $errorArray = "Designation cannot be blank";
}
if($department == "") {
    $errorArray = "Department cannot be blank";
}

print_r($errorArray);*/

//saving the data into the database

//return back to the message with the status message-->