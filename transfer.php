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
	<title>Transfer Money</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background: url('images/blurry.jpg');" style="background-repeat:no-repeat;background-size: 100% 100%;">
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Send Money</button>
	<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Send Money</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 16px;">
        <form method="POST" id="myForm">
  			<div class="form-group">
    		<label for="examplecust">Customer Name: </label>
    		<input type="text" class="form-control" id="custname" placeholder="Enter Customer Name" style="font-size: 15px;">
  			</div>
  			<div class="form-group">
    			<label for="exampleamt">Amount: </label>
    			<input type="number" class="form-control" id="amt" placeholder="Enter Amount" style="font-size: 15px;">
  			</div>
		</form>
		<span id="popup-div" style="font-size: 16px;"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 15px;margin-top: 5.5%;" onclick="close_all()">Close</button>
        <button type="button" class="btn btn-primary" onclick="transfer()">Transfer</button>
      </div>
    </div>
  </div>
</div>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Check Balance</button>

	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Hey Maria!</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 16px;">
      	<img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/female-avatar-12-774634.png" style="height: 80px;width: 80px;margin: 2% 40%;"><br>
      	<div style="margin-top: 13%;">
      		<p><center>Your current account balance is: <b><span>&#8377;</span><span id="amt_cash">3500</span></b></center></p>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 15px;">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
	
    <!-- <button type="button" class="btn btn-light">or</button> -->

  <table class="table table-hover" style="margin-top: -2%;">
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


<script>
	var balance=3500;
	function transfer()
	{
			var x = document.getElementById("popup-div");
  			var res = parseInt(document.getElementById("amt").value);
  			if(balance>res)
  			{
    			x.style.color = "green";
    			x.innerHTML = "Your amount has been transferred successfully!";
    			balance-=res;
    			document.getElementById("amt_cash").innerText=balance;
    			document.getElementById("myForm").reset();			
  			}
  			else
  			{
  				x.style.color = "red";
    			x.innerHTML = "Sorry! Low account balance";
    			document.getElementById("amt_cash").innerText=balance;
    			document.getElementById("myForm").reset();
  			}
	}

	function close_all()
	{
		var x = document.getElementById("popup-div");
		x.innerHTML = "";
	}

</script>