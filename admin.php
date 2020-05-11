<?php  include_once('lib/header.php'); 
   if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
    if($_SESSION['role']=='Medical Team(MT)'){
        header("Location: Med-Team.php");
    }elseif($_SESSION['role']=='Patient'){
        header("Location: patient.php");}
}
?>


<h3>Admin Login</h3>
<form action="processadmin.php" method="post">
        <p>
            <label for="username">Username</label>
            <input class = "form-control" type="email" name="username" placeholder= "Username" >
        </p>
        <p>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder= "Password" >
        </p>
        <p>
        <button class="btn btn-sm btn-primary type="submit">Login</button>
        </p>
    </form>

<?php include_once('lib/footer.php'); ?>