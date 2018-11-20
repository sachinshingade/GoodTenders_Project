<!-- Tenders By Country Page -->
			
<?php
	session_start();
	include('header.php');
	require 'dbconnect.php';
?>
<title>Tenders by Country | GoodTenders | Best Tenders Portal</title>
<style type="text/css">
	a{
		font-weight: bold;
	}
	td{
		font-weight: bold;
	}
	table{
		width: 100vh;
	}
	.space_tbl{
		border: 2px solid #07b107;
	}
	.countrydata{
		margin-top: 5%;
	}
	    #search_country {
    	width: 130px;
    	box-sizing: border-box;
    	border: 2px solid #ccc;
   		border-radius: 4px;
    	font-size: 16px;
    	background-color: white;
    	background-image: url('searchicon.png');
    	background-position: 10px 10px; 
    	background-repeat: no-repeat;
    	padding: 12px 20px 12px 40px;
    	-webkit-transition: width 0.4s ease-in-out;
    	transition: width 0.4s ease-in-out;
	}
	#search_country {
    	width: 100%;
	}	 
</style>


<body>
<!--
<section class="inner-header-title" style="color:#000;background-image:url(http://via.placeholder.com/1920x850);">
		<div class="container">
			<h1><strong>Tenders by Country</strong></h1>
		</div>
	</section>
-->

	<div class="clearfix"></div>
	<!-- Title Header End -->

		<section class="country">
			<div class="container">
				<div class="main-heading">
					<p>categorized Tenders</p>
					<h2>Tenders By <span>Country</span></h2>
			</div>

			<!-- Search Section -->
			<div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" id="search" name="search" placeholder="Enter Country Name" onkeyup="loadCountry()" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
			<!-- End Search Section-->

			<!-- Tabs of Alphabetical Section -->
				
			<div class="container countrydata">
			<ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#menuAll">All</a></li>
  			<li><a data-toggle="pill" href="#menuA">A</a></li>
  			<li><a data-toggle="pill" href="#menuB">B</a></li>
  			<li><a data-toggle="pill" href="#menuC">C</a></li>
  			<li><a data-toggle="pill" href="#menuD">D</a></li>	
  			<li><a data-toggle="pill" href="#menuE">E</a></li>
  			<li><a data-toggle="pill" href="#menuF">F</a></li>
  			<li><a data-toggle="pill" href="#menuG">G</a></li>
  			<li><a data-toggle="pill" href="#menuH">H</a></li>
  			<li><a data-toggle="pill" href="#menuI">I</a></li>
  			<li><a data-toggle="pill" href="#menuJ">J</a></li>
  			<li><a data-toggle="pill" href="#menuK">K</a></li>
  			<li><a data-toggle="pill" href="#menuL">L</a></li>
  			<li><a data-toggle="pill" href="#menuM">M</a></li>
  			<li><a data-toggle="pill" href="#menuN">N</a></li>
  			<li><a data-toggle="pill" href="#menuO">O</a></li>
  			<li><a data-toggle="pill" href="#menuP">P</a></li>
  			<li><a data-toggle="pill" href="#menuQ">Q</a></li>
  			<li><a data-toggle="pill" href="#menuR">R</a></li>
  			<li><a data-toggle="pill" href="#menuS">S</a></li>
  			<li><a data-toggle="pill" href="#menuT">T</a></li>
  			<li><a data-toggle="pill" href="#menuU">U</a></li>
  			<li><a data-toggle="pill" href="#menuV">V</a></li>
  			<li><a data-toggle="pill" href="#menuW">W</a></li>
  			<li><a data-toggle="pill" href="#menuX">X</a></li>
  			<li><a data-toggle="pill" href="#menuY">Y</a></li>
  			<li><a data-toggle="pill" href="#menuZ">Z</a></li>
			</ul>
			<!-- Tabs Heading ended -->
			
			<div class="tab-content">
  			<div id="menuAll" class="tab-pane fade in active">
  			
  				<!-- Hidden Div to Show Search Country From Database -->
				<div id="result" style="display: none;">
  					
  				</div>

  				<!-- Tables to show all country data section wise -->
				<div class="table-responsive" id="tabdata">
  			   	<table id="table" class="table table-striped table-hover">
    			<?php
    				mysqli_query ($conn,"set character_set_results='utf8'");
  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'A%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
				</div>
				<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'B%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'C%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'D%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'E%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'F%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'G%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'H%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'I%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'J%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'K%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'L%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'M%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'N%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'O%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'P%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'Q%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'R%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'S%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'T%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'U%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'V%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'W%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'X%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'Y%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>
				<hr class="space_tbl">
			</div>
			<div class="table-responsive" id="tabdata">
				<table id="table" class="table table-striped table-hover">
    			<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'Z%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>

				</table>

    			</div>
    		</div>
  			<div id="menuA" class="tab-pane fade">
    			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'A%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
				</table>
    			</div>
  			</div>
  			<div id="menuB" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'B%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuC" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'C%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuD" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'D%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuE" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'E%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>
			
			<div id="menuF" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'F%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>
			
			<div id="menuG" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'G%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>
			
			<div id="menuH" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'H%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

			<div id="menuI" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'I%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuJ" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'J%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuK" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'K%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuL" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'L%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuM" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'M%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuN" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'N%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuO" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'O%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuP" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'P%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuQ" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'Q%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuR" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'R%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuS" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'S%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuT" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'T%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuU" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'U%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuV" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'V%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuW" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'W%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuX" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'X%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank">No Country Available</a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
  				<p>No Country Available
    			</div>
  			</div>

  			<div id="menuY" class="tab-pane fade">
			<div  class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'Y%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>

  			<div id="menuZ" class="tab-pane fade">
			<div class="table-responsive">
  			   	<table id="table" class="table table-striped table-hover">
    			
  				<?php

  					$rec_row = 4;
  					$sql = "Select * From tbl_country Where Country like 'Z%'";
  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{
						$rec_row = ($rec_row == 4) ? 1 : $rec_row+1; 
						if($rec_row == 1) echo "<tr>"; 
						?>
						<td class="col-md-3"><a href="showtenders.php?country=<?php echo $row["Country"];?>" target="_blank"><?php echo $row["Country"];?></a></td>
					<?php
						if($rec_row == 4) echo "</tr>";
					}

					if($rec_row == 1) echo "<td></td><td></td><td></td></tr>"; 
					if($rec_row == 2) echo "<td></td><td></td></tr>"; 
					if($rec_row == 3) echo "<td></td></tr>"; 
				?>
  				</table>
    			</div>
  			</div>
			




		
		</div>
		</div>
	</section>
<?php 
	include('footer.php');
?>		

	<script>

		// Function to load country and hide and show respective section
			
		function loadCountry(){

			var srData = document.getElementById("search").value;
			if(srData == "")
			{
				$(".table-responsive").show();
				document.getElementById('result').style.visibility="none";
				document.getElementById('result').style.display="none";
				}
			else{
				$(".table-responsive").hide();
				document.getElementById('result').style.visibility="block";
				document.getElementById('result').style.display="block";
				}	

			$.ajax({
    			type: "GET",
    			url: 'searchcountry.php',
    			data: {name: srData},
   	 			success: function(data){
   	 				if(data)
   	 				{	
   	 					//document.getElementById('result').style.display="block";
        				document.getElementById('result').innerHTML=data;
        				
        			}else{
        				document.getElementById('result').style.display="none";
        				}
    				}
				});
			}
</script>
		