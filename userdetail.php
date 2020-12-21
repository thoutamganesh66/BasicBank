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

	if(isset($_POST['submit']))
	{
		$from=$_GET['id'];
		$to=$_POST['to'];
		$amount=$_POST['amount'];

		$sql="SELECT * from members where id=$from";
		$query=$conn->query($sql);
		$sql1=$query->fetch_assoc(); // returns array or output of user from which the amount is to be transferred.

	    $sql = "SELECT * from members where id=$to";
    	$query = $conn->query($sql);
    	$sql2 = $query->fetch_assoc();

    	// constraint to check input of negative value by user
	    if (($amount)<0)
	   {
	        echo '<script type="text/javascript">';
	        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
	        echo '</script>';
	    }

	    // constraint to check insufficient balance.
	    else if($amount > $sql1['amount']) 
	    {
	        
	        echo '<script type="text/javascript">';
	        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
	        echo '</script>';
	    }

	    // constraint to check zero values
	    else if($amount == 0){

	         echo "<script type='text/javascript'>";
	         echo "alert('Oops! Zero value cannot be transferred')";
	         echo "</script>";
	     }

	    else {
        
            // deducting amount from sender's account
            $newbalance = $sql1['amount'] - $amount;
            $sql = "UPDATE members set amount=$newbalance where id=$from";
            $conn->query($sql);

            // adding amount to reciever's account
            $newbalance = $sql2['amount'] + $amount;
            $sql = "UPDATE members set amount=$newbalance where id=$to";
            $conn->query($sql);

            $sender = $sql1['name'];
            $receiver = $sql2['name'];
            $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
            $query=$conn->query($sql);

            if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
                    
                }

            $newbalance= 0;
            $amount =0;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transaction</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="image">
		<img src="bg2.jpg">
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
	<h2 align="center" class="heading">Transaction</h2>
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
		$sid=$_GET['id'];
		$sql="SELECT * FROM members where id=$sid";
		$result=$conn->query($sql);
		if(!$result){
			echo "Error : ".$sql."<br>".$conn->error();
		}
		$rows=$result->fetch_assoc();
	?>
		<form method="post" name="tcredit" class="transfer"><br>
    <div> 
		<table align="center" class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['amount'] ?></td>
                </tr>
        </table>
    </div>
    <br><br><br>
    <div align="center">
    <label class="head">Transfer To:</label>
    <select name="to" required>
    	<option value="" disabled selected>Choose</option>
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
                $sid=$_GET['id'];
                $sql = "SELECT * FROM members where id!=$sid";
                $result=$conn->query($sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".$conn->error();
                }
                while($rows = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?>
               
                </option>
            <?php 
                } 
            ?>
            <div>
            </select>
            <br><br>
            <label>Amount:</label>
            <input type="number" name="amount" required>   
            <br><br>
                <div>
            <button name="submit" type="submit">Transfer</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>