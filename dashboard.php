<?php include_once('lib/header.php'); 
require_once('functions/user.php');
require_once('functions/redirect.php');
require_once('functions/alert.php');
require_once('functions/token.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
?>

<?php 
$allLogs = scandir("db/logs/");
$countLogs = count($allLogs);
for ($counter =0; $counter < $countLogs; $counter++){
$currentUser = $allLogs[$counter];
$email = $_SESSION['email'];
if($currentUser == $email. ".json"){
    $detailString = file_get_contents("db/logs/".$currentUser);
    $userObject = json_decode($detailString);
    $prevlogindate = $userObject->date;
    $prevlogintime = $userObject->time;
}
}
?>

<h3>Dashboard</h3>

Welcome, <?php echo $_SESSION['fullname']; ?>, 
You are logged in as (<?php echo $_SESSION['role'] ?>), 
and your ID is <?php echo $_SESSION['loggedIn'] ?> <br>
<hr>
You Registered on <?php echo $_SESSION['reg_date']?> <br>
<hr>
Your last login date was: <?php echo $prevlogindate?> at <?php echo $prevlogintime ?>
<?php
//Display options based on user role
if($_SESSION['role']=='Medical Team(MT)'){?>
    <a class="btn btn-lg btn-success" href="med_team.php" role="button">View Active Appointments</a> 
<?php }elseif($_SESSION['role']=='Patients'){ ?>
    <a class="btn btn-lg btn-success" href="appointment.php" role="button">Book an Appointment</a> |
    <a class="btn btn-lg btn-success" href="bill.php" role="button" >Pay Bills</a></button>
<?php }  ?>

<?php include_once('lib/footer.php'); ?>