<?php
if (isset($_POST['signup-submit']))
{
    require 'databaseHandler.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat))
    {
        header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=invalidEmailanduid");
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=invalidMail");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=invalidUsername");
        exit();
    }
    else if ($pwd !== $pwdRepeat)
    {
        header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=passwordcheck");
        exit();       
    }
    else 
    {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=sqlError");
            exit(); 
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                header("location: signup.php?error=userTaken&mail=".$email);
                exit();           
            }
            else
            {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: https://vacation-planner-website.000webhostapp.com/signup.php?error=sqlError");
                    exit(); 
                }
                else
                {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd );
                    mysqli_stmt_execute($stmt);
                    header("Location: https://vacation-planner-website.000webhostapp.com/signup.php?success=signup");
                    exit();
                }

            }


        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("https://vacation-planner-website.000webhostapp.com/signup.php");
    exit(); 
}

?>