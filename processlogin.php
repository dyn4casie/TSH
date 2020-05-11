<?php if(session_status() ==PHP_SESSION_NONE) {
session_start();
}

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    
    set_alert('error',$session_error);
      
    redirect_to("login.php");

}else{
    
    $currentUser = find_user($email);

        if($currentUser){
          //check the user password.
            $currentUserEmail = $currentUser->email;
            $userString = file_get_contents("db/users/".$currentUserEmail . ".json");
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;

            $passwordFromUser = password_verify($password, $passwordFromDB);
            
            if($passwordFromDB == $passwordFromUser){

                 //Timing
                 $currentTimeinSecs = time();
                 $currentDate = date("Y-m-d", $currentTimeinSecs); 
                 $currentTime=date("h:i a"); 
                 //Create a  timing object
                 $timingObject =[
                     //'id' =>$newTimeId,
                     'time'=>$currentTime,
                     'date'=>$currentDate
                     ];

                //redicrect to dashboard
                $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION['department']=$userObject->department;
                $_SESSION['reg_date']=$userObject->reg_date;
                
                //Login based on designation/Access Level
                if($_SESSION['role']=='Medical Team(MT)') {
                    save_log($currentUserEmail,$timingObject);
                    redirect_to("Med-Team.php");
                }elseif($_SESSION['role']=='Patient'){
                    save_log($currentUserEmail,$timingObject);
                    redirect_to("patient.php");  
                }
                die();
            }
          
        }        
        

    set_alert('error',"Invalid Email or Password");
    redirect_to("login.php");
    die();

}

?>