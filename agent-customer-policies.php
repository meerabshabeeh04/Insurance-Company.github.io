<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agent</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/admin-customer.css" type="text/css">
</head>
<body>
	<header class="header">
		<nav class="side-nav">
			<div class="user">
				<img src="images/user1.png" class="user-img">
				<div>
					<h2>Name</h2>
				</div>
			</div>
			<ul>
                <li><img src="images/dashboard1.png"><p><a href="agent-login.php">Dashboard</a></p></li>
				<li><img src="images/customer1.png"><p><a href="agent-customer.php">My Customers</a></p></li>
				<li><img src="images/policy1.png"><p><a href="agent-policies.php">My Customers Policies</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
	</header>

	<div class="content">
		<h1>AGENT LOGIN</h1>
		<p>Welcome Agent</p>
		<table class="cust_table">
			<thead>
			<tr>
				<th>Policy Number</th>
				<th>Customer NIC</th>
				<th>Customer Name</th>
				<th>Duration</th>
                <th>Payment Number</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
				<th>Date of last meeting</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
                $empno = $_GET['empno'];
				$query20 = "SELECT `NIC` FROM deals WHERE `EmpNo`='$empno'";
				$result20 = mysqli_query($con,$query20);
				while($row4=mysqli_fetch_assoc($result20)){
					$nic = $row4['NIC'];
				    $query15 = "SELECT * FROM `takes` WHERE `NIC`='$nic'";
				    $result15 = mysqli_query($con,$query15);
					while($row5=mysqli_fetch_assoc($result15)){
						?>
					<tr>
                    <?php
                    $query16 = "SELECT `FirstName` FROM `customer` WHERE `NIC`='$nic'";
                    $result16=mysqli_fetch_assoc(mysqli_query($con,$query16));
                    $polno=$row5['PolicyNo'];
                    $query17 = "SELECT * FROM `payment` WHERE `PolicyNo`='$polno'";
                    $result17 = mysqli_query($con,$query17);
					$query18 = "SELECT * FROM `deals` WHERE `NIC`='$nic'" ;
					$result18 = mysqli_fetch_assoc(mysqli_query($con,$query18));
                    while($row6=mysqli_fetch_assoc($result17)){
                        ?>
					<td><?=$row5['PolicyNo']?></td>
					<td><?=$nic?></td>
					<td><?=$result16['FirstName']?></td>
					<td><?=$row5['Duration']?></td>
                    <td><?=$row6['PaymentNo']?></td>
                    <td><?=$row6['AmountPaid']?></td>
                    <td><?=$row6['payment_Date']?></td>
					<td><?=$result18['D_O_LastMeeting']?></td>
					<td>
						<form action="admin-edit-customer-policies.php" method="get">
							<input id="val" type="text" name="polno" value="<?=$row5['PolicyNo']?>">
							<input id="val" type="text" name="NIC" value="<?=$nic?>">
							<input id="val" type="text" name="paymentno" value="<?=$row6['PaymentNo']?>">
							<input id="inp" type="submit" value="Edit">
					    </form>
					</td>
				    </tr>
				<?php
					}
                    }
				}
				?>
			</tbody>
		</table>
		<br/>
		<form action="agent-add-customer-policies.php" method="get">
		    <input id="val" type="text" name="empno" value="<?=$empno?>" style="display:none;">
			<input type="submit" value="Add a New Customer Policy" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
		<br/>
		<form action="agent-add-customerpayment.php" method="get">
		    <input id="val" type="text" name="empno" value="<?=$empno?>" style="display:none;">
			<input type="submit" value="Add a New Customer Payment" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
	</div>

</body>
</html>