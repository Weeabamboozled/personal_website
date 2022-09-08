<?php
        require "header.php";
?>
<style>
	table,
	td {
		border: 1px solid #333;
	}

	thead,
	tfoot {
		background-color: #333;
		color: #fff;
		
	}	
</style>
	 		<div id="poll">
			<h1>Which do you think we should go for vacation this year?</h1>
			<form action="votingVacation.ini.php" method="post">
				<h3>Your First and Last name Please</h3>
				<input type="text" name="name">
				<br><h3>Email</h3>
				<input type="text" name="email">
				<br><h3>Where would you like to go?</h3>
				<input type="text" name="place">
                <button type="submit" name="submit">Submit</button>
			</form>
		</div>
        <h1>Results</h1>
	<table>
	<thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>            
        </tr>
	</thead>
	<tbody>
	
    	<?php
		require_once "databaseHandler.inc.php";

		$sql = "SELECT name, email, place FROM poll";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["name"] ."</td><td>". $row["email"] ."</td><td>"
			. $row["place"]. "</td></tr>";
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();
    	?>
	</tbody>
	</table>
  	</body>
</html>