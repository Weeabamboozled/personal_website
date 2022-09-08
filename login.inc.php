<?php

if (isset($_POST['login-submit']))
{
    require 'databaseHandler.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password))
    {
        header("location: https://vacation-planner-website.000webhostapp.com/index.php?error=emptyfields");
        exit();    
    }
    else
    {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: https://vacation-planner-website.000webhostapp.com/index.php?error=sqlError");
            exit();  
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if($pwdCheck = false)
                {
                    header("location: https://vacation-planner-website.000webhostapp.com/index.php?error=WrongPassword");
                    exit(); 
                }
                else if ($pwdCheck = true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidusers'];

                    header("location: https://vacation-planner-website.000webhostapp.com/index.php?login=Success");
                    exit(); 

                }
            }
            else
            {
                header("location: https://vacation-planner-website.000webhostapp.com/index.php?error=noUser");
                exit();     
            }

        }
    }

}
else
{
    header("location: https://vacation-planner-website.000webhostapp.com/index.php");
    exit(); 
}