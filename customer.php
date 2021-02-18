<?php

include('db_conn.php');

$sql = "SELECT * FROM Customer ORDER BY Name"; 
$result = $conn->query($sql); 
$conn->close();  

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer's Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background: url('images/ppl.jpg');" style="background-repeat:no-repeat;background-size: 100% 100%;">

  <h3><center>Customer's Information</center></h3>
  <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>
  	<!-- PHP CODE TO FETCH DATA FROM ROWS--> 
    <?php   // LOOP TILL END OF DATA  
       while($rows=$result->fetch_assoc()) 
                { 
    ?>
    <tr>
      <td><b><?php echo $rows['Name'];?></b></td>
      <td><b><?php echo $rows['Email'];?></b></td>
      <td><b><?php echo $rows['Balance'];?></b></td>
    </tr>
    
     <?php 
          } 
     ?> 
  
  </tbody>
</table>

</body>
</html>