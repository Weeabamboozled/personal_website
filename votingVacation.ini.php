<?php
if (isset($_POST['submit']))
{
    require 'databaseHandler.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];


    if (empty($name) || empty($email) || empty($place))
    {
        header("location: https://wildweebwest.com/votingVacation.php?error=emptyfields");
        exit();
    }
    else 
    {
        $sql = "INSERT INTO poll (name, email, place) VALUES ('$name', '$email', '$place')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        header("Location: https://wildweebwest.com/votingVacation.php?success");
        exit();
    }
    $conn->close();
}
else
{
    header("https://wildweebwest.com/signup.php");
    exit(); 
}

?>