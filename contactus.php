<?php
        require "header.php";
?>
		<div class="info">
				<p>
					Will Be Updated in the Future
				</p>
			</div>
			<h2>Contact Jack OCallaghan for further Information</h2>
			</div>

		<main class="containerForm">
			<form action="mail.php" method="POST">
			<table>
				<!--Salutation Entry-->
				<tr>
					<td>Salutation:</td>
					<td><select id="validate-salutation" class="salutation" name="salutation">
						<option>&nbsp;</option>
						<option value="dr">Dr.</option>
						<option value="mr">Mr.</option>
						<option value="ms">Ms.</option>
						<option value="mrs">Mrs.</option>
					</select></td>
				</tr>
				<!--Name Entry-->
		    	<tr>
					<td>Name:</td>
					<td><input id="validate-name" type="text" name="name" class="name" size="40" placeholder="Your First Fame..."></td>
				</tr>
				<!--Email Entry-->
				<tr>
					<td>Email:</td>
					<td><input id="validate-email" type="text" name="email" class="email" size="40" placeholder="Your Email..."></td>
				</tr>
				<!--Phone Entry-->
				<tr>
					<td>Phone:</td>
					<td><input id="validate-phone" type="int" name="phone" class="phone" placeholder="Phone Number..."></td>
				</tr>
                <!--Subject Entry-->
				<tr>
					<td>Subject:</td>
					<td><input id="validate-subject" name="subject" type="text" class="subject" placeholder="Subject..."></td>
				</tr>
                <!--Message Entry-->
				<tr>
					<td>Message:</td>
					<td><textarea id="validate-message" name="message" class="message" rows="6" cols="30"></textarea></td>
				</tr>
				<!--Buttons at bottom-->
				<tr>
					<td><input class="submit" type="submit" id="mail-submit" name="submit"></td>
					<td><input class="reset" type="reset" value="Reset"></td>
				</tr>
			</table>
			<p class="form-message"></p>

			</form>
		</main>

		<div class = datetime>
				<p id="demo"></p>
		</div>
	</body>
	
	<script>
		var d = new Date();
		document.getElementById("demo").innerHTML = d.toDateString();
	</script>
</html>