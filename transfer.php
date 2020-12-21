<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$servername="localhost";
		$username="root";
		$password="banking";
		$dbname="bank";

		//create connection
		$conn= new mysqli($servername,$username,$password,$dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}
    $sql = "SELECT * FROM members";
    $result = $conn->query($sql);
?>

	<div class="image">
		<img src="https://images.unsplash.com/photo-1509470578905-4a29e9a1a4d9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjF8fGJhbmtpbmd8ZW58MHwwfDJ8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">

		<header>
			<h1 class="bank">ABC Bank</h1>
			<h2 class="tag">The No.1 Bank</h2>
		</header>
		
		<nav>
			<ul>
				<li><h1><a href="index.php">Home</a></h1></li>
				<li><h1><a href="#">Transfer</a></h1></li>
				<li><h1><a href="history.php">Transaction History</a></h1></li>
			</ul>
		</nav>
		<form class="transfer">
			<table align="center" border="2px;">
				
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>email</th>
						<th>Amount</th>
						<th>Operation</th>
					</tr>
				</thead>

				<tbody>
				
				<?php
					while($rows=$result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $rows['id'] ?></td>
						<td><?php echo $rows['name'] ?></td>
						<td><?php echo $rows['email'] ?></td>
						<td><?php echo $rows['amount'] ?></td>
						<td><a href="userdetail.php?id= <?php echo $rows['id'] ;?>"><button type="button">Transact</button></a></td>
					</tr>
				<?php
					}
				?>

				</tbody>
			</table>	
		</form>
	</div>
</body>
</html>