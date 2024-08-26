<?php
include("auth.php");

if(isset($_POST['update'])){

   
	$mname = $_POST['momo_name'];
	$mno = $_POST['momo_no'];
	$ntwk = $_POST['network'];
		$btc = $_POST['btc'];
	$eth = $_POST['eth'];
	$bnb = $_POST['bnb'];
	$usdt = $_POST['usdt'];
	
	    
    $result = mysqli_query($cxn, "UPDATE user_wallets SET momo_name='$mname', momo_no='$mno', network='$ntwk', btc_wallet='$btc', eth_wallet='$eth',
    bnb_wallet='$bnb', usdt_wallet='$usdt' WHERE userid='$user_id'");
	
    if($result){
        $_SESSION['error'] = "Data saved successfully!"; 
							            header("location:settings.php");
                                        $stmt->close(); 
										exit(0);
    }
	
  

} 

?>