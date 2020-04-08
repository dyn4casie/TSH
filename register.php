<?php include_once('lib/header.php'); ?>
    <p><strong>Welcome, Please Register Here</strong></p>
    <p>All Fields are required</p>


    <form method="POST" action="processregister.php">

        <p>
            <label for="">First Name</label><br />
            <input type="text" name="first_name" placeholder="First Name" value="" required/>
        </p>

        <p>
            <label for="">Last Name</label><br />
            <input type="text" name="last_name" placeholder="Last Name" value="" required/>
        </p>

        <p>
            <label for="">Email</label><br />
            <input type="email" name="email" placeholder="Email" value="" required />
        </p>

        <p>
            <label for="">Password</label><br />
            <input type="password" name="password" placeholder="Password" value="" required/>
        </p>

        <p>
        <label for="gender">Gender</label><br />
         	<select name="gender" required>
                <option value="">Select one</option>
                <option>Male</option>
                <option>Female</option>
             </select>
         </p>
    
        <p>
        <label for="designation">Designation</label><br />
            <select name="designation" required>
                <option value="">Select One</option>
                <option>Medical Team (MT)</option>
                <option>Patients</option>
            </select>
        </p>

        <p>
        <label for="">Department</label><br />
        <input type="password" name="department" placeholder="Department" value="" required>
        </p>

        <p>
            <button type="submit">Register</button>
        </p>
    </form>


<?php include_once('lib/footer.php'); ?>