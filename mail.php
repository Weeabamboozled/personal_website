<?php

if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salutation = $_POST['salutation'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    date_default_timezone_set('America/Chicago');
    $dateAndTime = date("Y/m/d h:ia");

    $errorEmpty = false;
    $errorEmail = false;
    $errorPhone = false;

    
    $businessEmail = 'ocallaghanj1998@gmail.com';
    $messageToBusiness = "Name: ".$salutation." ".$name."\n".
        "Phone: ".$phone."\n".
        "Email: ".$businessEmail.
        "Wrote the following and awaits a response: "."\n\n".$message.
        "\n\n"."This was sent at: ".$dateAndTime."\n\n";
   

    $messageFromBusiness ="Hello ".$salutation." ".$name."\n".
        "Thank you for contacting us, we will be in touch soon!"."\n\n".
        "Message you have sent to us:"."\n".$message.
        "\n\n"."Todays Date and Time is: ".$dateAndTime."\n\n";
    
    $from='From: '.$email;
    $confirmation='From: '.$businessEmail;
    $bSubject='Form Submission: '.$subject;

    if(empty($name) || empty($email) || empty($message) || empty($phone) || empty($subject))
    {
        echo "<span>Fill in all the fields</span>";
        $errorEmpty = true;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<span>Write a valid e-mail address!</span>";
        $errorEmail = true;
    }
    elseif(strlen($phone) < 10 || strlen($phone) > 10)
    {
        echo "<span>Write a valid phone number!</span>";
        $errorPhone = true;
    }
    else
    {
        mail($businessEmail, $bSubject, $messageToBusiness, $from);
        mail($email, $subject, $messageFromBusiness, $confirmation);

        header("Location: https://vacation-planner-website.000webhostapp.com/index.php");
        $txt = $messageToBusiness;
        
    }

}
else
{
    echo "There was an error";
}

?>

<script>
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorPhone = "<?php echo $errorPhone; ?>";

    if(errorEmpty == true)
    {
        $("#validate-name, #validate-email, #validate-message");
    }
    if(errorMail == true)
    {
        $("#validate-email");
    }
    if (errorPhone == true)
    {
        $("validate-phone");
    }

</script>