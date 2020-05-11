<?php 
include_once('lib/header.php') ;

if(!isset($_SESSION['loggedIn'])){
    header("Location: login.php");
}

require_once('functions/alert.php');
require_once('functions/user.php');
require_once('functions/email.php');
require_once('functions/redirect.php');
require_once('functions/token.php');

?>

<div class="container">
        <div >
        <div class = "row col-6"><strong>PAY BILLS</strong></div>        </div>
        <div class= "row col-6 ">
            <form action="processbill.php" method="post">
                <?php print_alert();?>
                <p>
                    <label for="department">Department</label >
                    <select  required class="form-control" name="department" >
                        <option value="">Select One</option>
                        <option>Trauma</option>
                        <option>Laboratory</option>
                        <option>Pediatrics</option>
                        <option>Obstetrics and Gynecology</option>
                        <option>Surgical</option>
                        <option>Accident & Emergency</option>
                        <option>Geriatrics</option>
                    </select>
                </p>
                <p>
                <p>You are to pay 5000 to book an appointment</p>
                <label for="amount">To Pay</label>
                <input class="form-control" name="amount" placeholder= "Bill Cost" required >
                </p>
                <p>
                <button class="btn btn-success" type="submit">Pay Bill</button>
                </p>
            </form>
                            
        </div>
</div>