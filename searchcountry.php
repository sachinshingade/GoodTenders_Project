<?php
	
	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");
	if (isset($_GET["name"]) && strlen($_GET["name"]) > 0) 
		{ 
			$country  = $_GET["name"]; 
		
	
		$sql = "SELECT * FROM tbl_country WHERE Country LIKE '%$country%' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($result);
		$value = $row["Country"];

		echo "<table id='resultTable' class='table table-striped'>";
		while($row = mysqli_fetch_assoc($result))
		{
			echo 
					"<tr><td>
					<a href='showtenders.php?country=".$row['Country']."' target='_blank'>".$row['Country']."</td></tr>";

		}

			echo "</table>";
		}

		else 
		echo ""; // no records to be shown			
?>