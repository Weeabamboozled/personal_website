<?php
    require "header.php";
?>

<main>
    <div class="wrapper-main"> <!--I will eventually do this for customization-->
        <section class="section-default">
            <h1>Signup</h1>
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == "emptyfields")
                    {
                        echo '<p>Fill in all Fields!</p>';
                    }
                    else if ($_GET['error'] == "invalidEmailanduid")
                    {
                        echo '<p>Error: Invalid Username and Email!</p>';
                    }
                    else if ($_GET['error'] == "invalidUsername")
                    {
                        echo '<p>Error: Invalid Username!</p>';
                    }
                    else if ($_GET['error'] == "invalidMail")
                    {
                        echo '<p>Error: Invalid Email!</p>';
                    }
                    else if ($_GET['error'] == "passwordcheck")
                    {
                        echo '<p>Error: Passwords do not match!</p>';
                    }
                    else if ($_GET['error'] == "userTaken")
                    {
                        echo '<p>Error: Username already taken!</p>';
                    }
                }
            ?>
            <form action="signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username...">
                <input type="text" name="mail" placeholder="E-mail...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwd-repeat" placeholder="Retype Password...">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>
</main>