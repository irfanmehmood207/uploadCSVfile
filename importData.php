<?php 
include 'dataBaseConnectivity.php';
if(!empty($_POST['importSubmit']))
{
	error_reporting(0);
	$csvFile = fopen($_FILES['file']['tmp_name'],'r');
	$fileType = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
	if($fileType != "csv"  )
	{
		?>
		<script> 
			alert("Please Select CSV Extension File");
			window.location = "http://localhost/task12/index.php";
	    </script>
		<?php 
	}
	else 
	{
		//parse data from csv file line by line
		while(($line = fgetcsv($csvFile)) !== FALSE)
		{
			//insert member data into database
			$query = $dataBaseConnection->query("INSERT INTO members (first_name, second_name, email)
		VALUES ('".$line[1]."','".$line[2]."','".$line[3]."')");
		}
		//close opened csv file
		fclose($csvFile);
		?>
		<script> 
			alert("File Uploaded Successfully") ;
			window.location = "http://localhost/task12/index.php";
	    </script>
		<?php 
	}
}
else 
{
	echo "Something Went Wrong";	
}
?>
