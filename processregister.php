<?php session_start();
    require_once('functions/user.php');
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

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


if($errorCount > 0){

     $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: register.php");

}else{

     $newUserId = ($countAllUsers-1);

    $userObject = [
        'id'=>$newUserId,
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

        if($userExists){
            $_SESSION["error"] = "Registration Failed, User already exits ";
            header("Location: register.php");
            die();
        }
        

    //save in the database;
    save_user($userObject);

    $_SESSION["message"] = "Registration Successful, you can now login " . $first_name;
    header("Location: login.php");
}












//initial code

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

//return back to the message with the status message