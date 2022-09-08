<?php
    require "header.php";
?>
    <h1>Password Reset</h1>
    <p>An email will be sent to you with instructions for reseting your password.</p>
    <form action="resetRequest.inc.php" method="post">
        <input type="text" name="email" placeholder="Enter your email address..">
        <button type="submit" name="reset-request-submit">Submit Password Change Request</button>
    </form>
    <?php
        if(isset($_GET["reset"]))
        {
            if($_GET["reset"] == "success")
            {
                echo '<p>Check Your Email for the Reset Link!</p>';
            }
        }
    ?>

  </body>