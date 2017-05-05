<?php include_once("inc/config.php")?>
<?php
  header('Content-Type: text/csv; charset=utf-8');  
  header('Content-Disposition: attachment; filename=data.csv');  
  $output = fopen("php://output", "w");
  fputcsv($output, array('ID', 'Full Name', 'Email', 'Address', 'Mobile',  'Country Code',  'Joining Date'));  
  $query = "SELECT * from users ORDER BY id DESC";  
  $result = $con->query($query);  
  while($row = $result->fetch_assoc())  
  {  
		$row['created_at'] = date("m-d-Y h:iA",$row['created_at']);
		fputcsv($output, $row);  
  }
  fclose($output);  
?>