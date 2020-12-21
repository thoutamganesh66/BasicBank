<!DOCTYPE html>
<html>
<head>
	<title>History</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="image">
		<img src="https://images.unsplash.com/photo-1509470578905-4a29e9a1a4d9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjF8fGJhbmtpbmd8ZW58MHwwfDJ8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">

		<header>
			<h1 class="bank">ABC Bank</h1>
			<h2 class="tag">The No.1 Bank</h2>
		</header>
		
		<nav>
			<ul>
				<li><h1><a href="index.html">Home</a></h1></li>
				<li><h1><a href="transfer.php">Transfer</a></h1></li>
				<li><h1><a href="history.php">Transaction History</a></h1></li>
			</ul>
		</nav>
	</div>
<?php

$servername="localhost";
$username="root";
$password="banking";
$dbname="bank";

//create connection
$conn= new mysqli($servername,$username,$password,$dbname);

//check connection
if($conn->connect_error){
 	die("Connection failed:  ".$conn->connect_error);
 }

 $sql="SELECT* FROM transaction";
 $result=$conn->query($sql);

 ?>

 <form class="transfer">
 	<table align="center" border="2px;">
 		<thead>
 			<tr>
	 			<th>Sno</th>
	 			<th>Sender</th>
	 			<th>Receiver</th>
	 			<th>Amount</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php

 				if ($result->num_rows>0) {
 				# Output data of each row
 					while($rows=$result->fetch_assoc()){
 			?>
 					<tr>
 						<td><?php echo $rows['sno'] ?></td>
 						<td><?php echo $rows['sender'] ?></td>
 						<td><?php echo $rows['receiver'] ?></td>
 						<td><?php echo $rows['amount'] ?></td>
 					</tr>
 			<?php
 					}
 				}
 				$conn->close();
 			?>
 </body>
</html>