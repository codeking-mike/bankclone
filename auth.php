<?php
session_start();
include("db_connect.php");


if(isset($_SESSION['user'])){
$userid = $_SESSION['user']; 
$var1 = 'savings';
$var2 = 'checking';
$currentDate = date('Y-m-d H:i:s');
 
 $sql = "SELECT * FROM bank_users WHERE user_id='$userid'";
 $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
 while($row = mysqli_fetch_assoc($result)){
	 extract($row);
 }	

 $prep_savings = "SELECT available_balance, account_number FROM user_account WHERE user_id = ? AND account_type = ? LIMIT 1";
 $stmt = $cxn->prepare($prep_savings);
 if ($stmt) {
	  $stmt->bind_param('ss', $user_id, $var1);
	  $stmt->execute();
	  $stmt->store_result();

		 if ($stmt->num_rows == 1) {
		 // A user with this details exists
			 $stmt ->bind_result($savings, $savings_no);
			 $stmt->fetch();
		 }else{
			$savings = '0.00';
			$savings_no = '00000000000';
		 }
	}
	$stmt->close();
 

	//get checking details

$prep_checking = "SELECT available_balance, account_number FROM user_account WHERE user_id = ? AND account_type = ? LIMIT 1";
$stmt2 = $cxn->prepare($prep_checking);
if ($stmt2) {
    // Assuming $user_id and $var2 are defined somewhere above
    $stmt2->bind_param('ss', $user_id, $var2); // 'ss' indicates two string parameters
    $stmt2->execute();
    $stmt2->store_result();

    if ($stmt2->num_rows == 1) {
        // A user with this details exists
        $stmt2->bind_result($checking, $checking_no);
        $stmt2->fetch();
    } else {
        $checking = '0.00';
        $checking_no = '00000000000';
    }
}
$stmt2->close(); // Close the statement, not the connection


 
                    
/*
 
 $sql2 = "SELECT SUM(profits) AS total_profit FROM client_investment WHERE payer='$userid' AND expected_date > '$currentDate' AND completed='no'";
 $res=mysqli_query($cxn, $sql2) or die("Couldnt Fetch Data 3");
 $row2 = mysqli_fetch_assoc($res);
 $total_profit = $row2["total_profit"];
 
 */
 
}else{
	$_SESSION['error'] = "Kindly Login to continue";
	header("location:./login.php");
	exit(0);
} 
//function to determine if a user has been merged to PH




?>