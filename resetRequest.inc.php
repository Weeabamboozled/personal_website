<?php
    if(isset($_POST["reset-request-submit"]))
    {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "https://vacation-planner-website.000webhostapp.com/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
        $expires = date("U")+1800; //Creating the date of experation + 2 hours

        require 'databaseHandler.inc.php';
        $userEmail = $_POST['email'];
        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo"There was an error";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }
        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo"There was an error";
            exit();
        }
        else
        {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }    
        mysqli_stmt_close($stmt);

        $to = $userEmail;
        $subject = "Password Reset for Vacation Planner Website";

        $message = 
        "Someone is requesting a password reset from this email address. If for any reason this was not you,
        then please ignore this email. The linkc to reset the email will be below.\n".
        "Here is the link to reset your password:\r\n\r\n".
        $url." ".
        
        "\n-----------------------\r\n".
        "Thank you for the feedback and your patronage.\r\n".
        "Vacation Planner Website's Team\r\n".
        "-----------------------\r\n";

        $headers = "From: The Vacation Planner Website <ocallaghanj1998@gmail.com>\r\n".
                    "Reply-To: ocallaghanj1998@gmail.com\r\n".
                    "Content-type: text/plain; charset=\"iso-8859-1\"";

        mail($to, $subject, $message, $headers);

        header("Location: https://vacation-planner-website.000webhostapp.com/index.php?reset=success");

    }
    else
    (
        header("Location: https://vacation-planner-website.000webhostapp.com/index.php")
    )

?>