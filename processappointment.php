<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();}

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');




//Verification and Validation

$date = $_POST['date']  ;
$time = $_POST['time'] ;
$nat_app= $_POST['appointment_nature'] ;
$complaint = $_POST['complaint'] ;
$department = $_POST['department'] ;



$loggedIn = $_SESSION['loggedIn'];
$email = $_SESSION['email'];
$name = $_SESSION['fullname'];


$_SESSION['date']= $date;
$_SESSION['time']= $time;
$_SESSION['nat_app']= $nat_app;
$_SESSION['complaint']= $complaint;
$_SESSION['department']= $department;

$allApps = scandir("db/appointment/"); // return @array (2 filled)
$countAllApps = count($allApps);

print_r($nat_app);
$newAppId = ($countAllApps - 1);

    $appObject = [
    'id'=>$newAppId,
    'name'=>$name,
    'date'=>$date,
    'time'=>$time,
    'email'=>$email,
    'nat_app'=>$nat_app,
    'complaint'=>$complaint,
    'department'=>$department,
    ];

    $new = json_encode($appObject);
    file_put_contents("db/appointment/". $email . ".json", $new);
    set_alert("message","Your appointment has been made ");
    redirect_to("appointment.php");

?>