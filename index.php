<?php 
// including database file which will connect to database
include 'dataBaseConnectivity.php';
?>
<html>
	<head>
		<title>Import CSV</title>
		 <meta charset="utf-8">
 		 <meta name="viewport" content="width=device-width, initial-scale=1">
 		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body  style = "background-color: #f2f2f2;">
		<div class="container">
			<div align="center" style="margin-top: 30px;">
				<form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                	<input type="file" name="file" style="margin-left:150px;" />
                	<br><br>
                	<input type="submit" class="btn btn-info btn-lg" name="importSubmit" value="Upload The File" class="">
        		</form>
        	</div>
											<br><br><br><br><br><br>
        	<div align="center">
         		<table class="table table-striped">
                	<thead>
                    	<tr>
                      		<th>First Name&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      		<th>Last Name&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      		<th>Email&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    	</tr>
                	</thead>
                <?php
                    //get records from database
                $query = $dataBaseConnection->query("SELECT * FROM members");
                    if($query->num_rows > 0)
                    { 
                        while($row = $query->fetch_assoc())
                        { ?>
                    	<tr>
                      		<td><?php echo $row['first_name']; ?></td>
                      		<td><?php echo $row['second_name']; ?></td>
                      		<td><?php echo $row['email']; ?></td>
                      	</tr>
                   <?php } 
                    }
                    else
                    { ?>
                    	<tr>
                    		<td colspan="5">No member(s) found....</td>
                    	</tr>
              <?php } ?>
        		</table>   
			</div>
		</div>	
	</body>
</html>
