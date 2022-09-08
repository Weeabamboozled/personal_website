<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
    

        <title>Vacation Planner Website</title>
		<script>
			function getVote(int)
			{
    			if (window.XMLHttpRequest)
    		{
    		    xmlhttp=new XMLHttpRequest();
		    }

    		else
   		 	{
      			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    		}

    		xmlhttp.onreadystatechange=function()
    		{
        		if(this.readyState==4 && this.status==200)
        		{
            		document.getElementById("poll").innerHTML=this.responseText;
        		}
    		}
    		xmlhttp.open("GET", "votingVacation.ini.php?vote="+int, true);
    		xmlhttp.send();
			}
			$(document).ready(function()
            {
                $("form").submit(function(event)
                {
                    event.preventDefault();
                    var name = $("#validate-name").val();
                    var email = $("#validate-email").val();
                    var salutation = $("#validate-salutation").val();
                    var message = $("#validate-message").val();
                    var submit = $("#mail-submit").val();
                    $(".form-message").load("mail.php", {
                        name: name,
                        email: email,
                        salutation: salutation,
                        message: message,
                        submit: submit
                    });
                });
            });

		</script>
		<style>
		    
.headercontainer {
    display: flex;
    flex-direction: row;
    text-align: center;
    background-color: #333;
}
.headercontainer a {
    padding: 8px 8px;
    font-size: 20px;
    color: white;
    text-decoration: none;
}
.login {
        display: flex;
    flex-direction: row;
    text-align: center;
    background-color: #333;
}
.login a{
    padding: 8px 8px;
    font-size: 20px;
    color: white;
    text-decoration: none;    
}
		</style>

	</head>
    <header>


			
			<div>

                            <div class="headercontainer">
            <a href="https://wildweebwest.com/index.php">Home</a>
            <a href="https://wildweebwest.com/plannedVacation.php">Planned Vacation</a>
            <a href="https://wildweebwest.com/votingVacation.php">Vacation Voting</a>
            <a href="https://wildweebwest.com/pastVacations.php">Past Vacations</a>
            <a href="https://wildweebwest.com/contactus.php">Support</a>
            </div>
                        
            </div>
		</div>
	</header>
	<body>
