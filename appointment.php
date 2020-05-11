<?php 
    include_once('lib/header.php') ;
    require_once('functions/user.php');
?>
<?php if(!is_user_loggedIn() && $_SESSION['role']!=="Patients"){
    set_alert("error","You are'nt authorized to view that page.");
    redirect_to("login.php");

} ?>
<?php $loggedIn = $_SESSION['loggedIn']; ?>
<div class="container">
        <div >
        <div class = "row col-6"><strong> Book an Appointment</strong></div>
        </div>
        <div class= "row col-6 ">
        <div class="jumbotron text-center">
            <form action="processappointment.php" method="post">
                <?php print_alert();?>
                <p>
                    <label for="date">Date Of Appointment</label>
                    <input type="date" class="form-control" name="date"  placeholder= "Date of Appointment" minlength="2" required >
                </p>
                <p>
                    <label for="time">Time Of Appointment </label>
                    <input type="time" class="form-control" name="time"  placeholder= "Time Of Appointment" minlength="2" required >
                </p>
                <p>
                    <label for="appointment_nature">Nature Of Appointment</label>
                    <textarea  class="form-control" name="appointment_nature"  placeholder= "Nature of Appointment" rows="3" required ></textarea>
                </p>
                <p>
                    <label for="complaint">Initial Complaint</label>
                    <textarea  class="form-control" name="complaint"  placeholder= "Initial Complaint" rows="3" required ></textarea>
                </p>
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
                <button class="btn btn-success" type="submit">Submit request</button>
                </p>
            </form>
               </div>             
        </div>
</div>