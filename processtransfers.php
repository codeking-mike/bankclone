<?php

include("auth.php");

//confirm transfers

if(isset($_GET['confirm'])){
	$trans = $_GET['confirm'];
	$amount = $_GET['amt'];
	$from = $_GET['from'];
	
	mysqli_query($cxn, "UPDATE external_transfers SET status='completed' WHERE fund_id ='$trans'");

	$res = mysqli_query($cxn, "UPDATE user_account SET current_balance=current_balance - '$amount' WHERE user_id='$user_id' AND account_type='$from'");
   
	$_SESSION['success'] = "Transfer Completed Successfully!"; 
							            header("location:externaltransfers.php");
										exit(0);
	
	
}


//external transfers

if(isset($_POST['sendmoney'])){
	
	$from = $_POST['from'];
    $accname = $_POST['accountname'];
	$nickname = $_POST['nickname'];
	$amount = $_POST['amount'];
	 $routingno = $_POST['routingno'];
	$bank = $_POST['bank'];
	$acctype= $_POST['accounttype'];
	$accno= $_POST['accountno'];
	 $senddate = $_POST['senddate'];
	$beneficiary = $_POST['beneficiary'];
	$tdate= date("Y-m-d h:i:s");
	
    
    $sql_ship = "INSERT INTO external_transfers(from_account, recipient, recipient_nickname, amount, routing_no, bank_name, account_type, account_no, sent_date, status)
	VALUES('$from', '$accname', '$nickname', '$amount', '$routingno', '$bank', '$acctype', '$accno', '$senddate','pending')";
	$result = mysqli_query($cxn,$sql_ship) or die("$sql_ship" . mysqli_error($cxn));

	$transid = mysqli_insert_id($cxn);

	//insert into transactions table
	$sql_trans = "INSERT INTO transactions(transid, user_id, transaction_type, description, amount, from_account, to_account)
	VALUES('$transid','$user_id', 'Transfer', 'Transfered money to $accname', '$amount', '$from', '$accname')";
	$result = mysqli_query($cxn, $sql_trans) or die("$sql_trans" . mysqli_error($cxn));

    if($beneficiary == 'Yes'){
   //insert into beneficiary table
   $sql_ben = "INSERT INTO beneficiaries(account_name, bank_name, account_number, bank_code, account_type)
   VALUES('$accname', '$bank', '$accno', '$routingno', '$acctype')";
   $result = mysqli_query($cxn, $sql_ben) or die("$sql_ben" . mysqli_error($cxn));

	}
	//update account table with less amount sent
	$res = mysqli_query($cxn, "UPDATE user_account SET available_balance=available_balance - '$amount' WHERE user_id='$user_id' AND account_type='$from'");
  
	header("location:confirmtransfer.php?trans=$transid");
    
  
	
   
}

//quick transfers


if(isset($_POST['quicktransfer'])){
	
	$from = strtolower($_POST['from']);
	$amount = $_POST['amount'];
	 $senddate = $_POST['senddate'];
	$beneficiary = $_POST['to'];
	$tdate= date("Y-m-d h:i:s");

	$sql = "SELECT * FROM beneficiaries WHERE ben_id='$beneficiary'";
    $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
	extract($row);
	}
	
    
    $sql_ship = "INSERT INTO external_transfers(from_account, recipient, amount, routing_no, bank_name, account_type, account_no, sent_date, status)
	VALUES('$from', '$account_name', '$amount', '$bank_code', '$bank_name', '$account_type', '$account_number', '$senddate','pending')";
	$result = mysqli_query($cxn,$sql_ship) or die("$sql_ship" . mysqli_error($cxn));

	$transid = mysqli_insert_id($cxn);

	//insert into transactions table
	$sql_trans = "INSERT INTO transactions(transid, user_id, transaction_type, description, amount, from_account, to_account)
	VALUES('$transid','$user_id', 'Transfer', 'Transfered money to $account_name', '$amount', '$from', '$account_name')";
	$result = mysqli_query($cxn, $sql_trans) or die("$sql_trans" . mysqli_error($cxn));
	
	//update account table with less amount sent
	$res = mysqli_query($cxn, "UPDATE user_account SET available_balance=available_balance - '$amount' WHERE user_id='$user_id' AND account_type='$from'");
  
	header("location:confirmtransfer.php?trans=$transid");
    
  
	
   
}

//add beneficiary

if(isset($_POST['beneficiary'])){
	
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
    $accname = $_POST['accountname'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	 $state = $_POST['state'];
	$bank = $_POST['bank'];
	$codetype= $_POST['codetype'];
	$bentype= $_POST['bentype'];
	$accno= $_POST['accno'];
	 $postal = $_POST['postal'];
	$bankcode = $_POST['bankcode'];
	$acctype = "";
	
	
    $sql_ship = "INSERT INTO beneficiaries(ben_type, account_name, bank_name, account_number, bank_code_type, bank_code, account_type, address1, address2, city, state, country, postal_code)
	VALUES('$bentype', '$accname', '$bank', '$accno', '$codetype', '$bankcode', '$acctype', '$address1', '$address2','$city', '$state', '$country', '$postal')";
	$result = mysqli_query($cxn,$sql_ship) or die("$sql_ship" . mysqli_error($cxn));

	$_SESSION['success'] = 'Beneficiary Saved Successfully!';
	header("location:addbeneficiary.php");
    
  
	
   
}



//process bonus withdrawal

if(isset($_GET['bn'])){
	$user = $_GET['bn'];
	//check if there is  a pending request
	
	                  $check_inv = "SELECT * FROM bonus_withdrawals WHERE receiver='$user' AND completed='no'";
						$res_inv =mysqli_query($cxn, $check_inv);
						if(mysqli_num_rows($res_inv) > 0 ){
                                     $_SESSION['error'] = "You have a pending withdrawal request. Kindly hold one while your request is processed!"; 
							            header("location:getbonus.php");
                                        $stmt->close(); 
										exit(0);
							
						}else{
							
							   $select_bonus = "SELECT * FROM ref_bonus WHERE receiver='$username'";
								$res = mysqli_query($cxn, $select_bonus);
								$row = mysqli_fetch_assoc($res);
								extract($row);
								if($amount > 29999){
								    $sql_ship = "INSERT INTO bonus_withdrawals(receiver, with_amount, completed) VALUES('$user','$amount','no')";
											$result = mysqli_query($cxn,$sql_ship) or die("$sql_ship" . mysqli_error($cxn));
		
									 $_SESSION['error'] = "Withdrawal Request has been received. You will receive payment to your account shortly!"; 
							            header("location:getbonus.php");
                                        $stmt->close(); 
										exit(0);	
									
									
									
								}else{
									
									 $_SESSION['error'] = "Bonus amount is too small to withdraw. Kindly refer more people to earn more!"; 
							            header("location:getbonus.php");
                                        $stmt->close(); 
										exit(0);
									
								}
						}
	
	
		
		
	
	
	
}


//CHANGE PASSWORD
if(isset($_POST['update_password'])){

	
          foreach($_POST as $field => $value) {
             if($field != "change_password"){
		
		
		if(preg_match("/password/i",$field)){
		if(!preg_match("/^[A-Za-z0-9#@' -]{6,50}$/",$value)){
			$errors[] = "{$value} is not a valid password or password too short. Minimum of 6 xters allowed";
		}
		}
		
		
                 
                 }
            }
           if(@is_array($errors)){
		$message = "";
		foreach($errors as $value){
		$message .= $value." Please try again<br />";
		$_SESSION['error']= $message;
		}
		header("location:changepassword.php");
		exit();
             } 
	$newpass = $_POST['password'];

    $result = mysqli_query($cxn, "UPDATE argent_client_db SET user_password='$newpass'  WHERE user_id='$user_id'");
    
    if($result){
        $_SESSION['error'] = "Password changed succesfully!Login to continue"; 
							            header("location:login.php");
                                        $stmt->close(); 
										exit(0);
    }
    
}

//CHANGE MOBILE WALLET

//PROCESS INVESTMENT
if(isset($_POST['deposit'])){ 
	$amount = strip_tags($_POST['amount']);
	$method = strip_tags($_POST['method']);
	
	$dt = date("Y-m-d H:i:s");
	
	 if(!is_numeric($amount)){
			  $message = "Incorrect Amount";
				  $_SESSION['error']= $message;
				 header("location:fundaccount.php");
				 exit(0);
		  
		  }

		$sql_ship = "INSERT INTO client_investment2(depositor, fund_date, deposit_amount, method, payment_confirmed, completed)
		VALUES('$user_id','$dt', '$amount','$method', 'no','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        $id = mysqli_insert_id($cxn);
        
        //send mail to user
        // Subject of the email
                        $subject = "Deposit Notification";
                        
                        // Message body
                        $message = "Hello,\r\n\r\nYou placed a deposit request of $amount $currency, kindly proceed to make payment and upload a proof of payment for confirmation:\r\n\r\n";
                        
                        
                        // Additional headers
                        $headers = "From: noreply@dynamicassets.site\r\n";
                        $headers .= "Content-type: text/html\r\n"; // Set the content type to HTML
                        
                        // Check if the mail is sent successfully
                        mail($user_email, $subject, $message, $headers);
                        
        if($method == 'momo' ){
            
			header("location:momo.php?trans=$id&amt=$amount&method=$method");
			
        }else{
            	header("location:bank.php?trans=$id&amt=$amount&method=$method");
        }
		
		   
        
		
		 
}

if(isset($_GET['re'])){ 
	$amount = $_GET['amt'];
	$fid = $_GET['re'];
	$plan = $_GET['plan'];
	$dt = date("Y-m-d H:i:s");
	
   
    
	  if($plan == 'basic'){
		
		$profits = (0.5 * $amount);
		$daily_profits = $profits/(10*24*60);
		$returns = $amount + $profits;
			$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+10 days'));
    

		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, daily_profits, expected_returns, expected_date, plan, completed)
		VALUES('$username','$dt', '$amount','$profits', '$daily_profits','$returns','$exp_date1', '$plan','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
		
		 mysqli_query($cxn, "UPDATE client_investment SET completed='yes' WHERE fund_id='$fid'");
	   
				$_SESSION['error'] = "Congratulations! Your Re-Investment was successful";
				header("location:invest.php");
				$stmt->close(); 

	  }else{
        $profits = $amount;
		$daily_profits = $profits/(20*24*60);
		$returns = $amount + $profits;
		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+20 days'));

		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, daily_profits, expected_returns, expected_date, plan, completed)
		VALUES('$username','$dt', '$amount','$profits', '$daily_profits','$returns', '$exp_date2', '$plan','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
		
	 mysqli_query($cxn, "UPDATE client_investment SET completed='yes' WHERE fund_id='$fid'");
		
				$_SESSION['error'] = "Congratulations! Your Re-Investment was successful";
				header("location:invest.php");
				$stmt->close(); 


	  }
		
	   
				  
				 
						
				  
							  
			
		   
				  
		  
		   
          
		
		 
}

if(isset($_POST['invest'])){ 
	$amount = strip_tags($_POST['amount']);
	$plan = strip_tags($_POST['plan']);
	$dt = date("Y-m-d H:i:s");
	$ref_bonus = (0.1 * $amount);
	
	 if(!is_numeric($amount)){
			  $message = "Incorrect Value.";
				  $_SESSION['error']= $message;
				 header("location:tradingzone.php");
				 exit(0);
		  
		  }
		  
	 if($amount > $account_balance){
			  $message = "Your wallet balance is too low to make an investment. Kindly deposit more funds in your wallet";
				  $_SESSION['error']= $message;
				 header("location:tradingzone.php");
				 exit(0);
		  
		  }
  
      
       //check if user has Investment before
		    $check_query = "SELECT * FROM client_investment WHERE payer='$username'";
            $check_result = mysqli_query($cxn, $check_query);
            if(mysqli_num_rows($check_result) > 0) {
                
                
        	  if($plan == 'ruby'){
        		
        		$profits = (0.3 * $amount);
        		$returns = $amount + $profits;
        		$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+7 days'));
            
        
        		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits', '$returns','$exp_date1', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        	   
        				$_SESSION['error'] = "You have subscribed to the ruby investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        	  }else if($plan == 'gold'){
                $profits = (0.5 * $amount);
        		$returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+11 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the gold investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        
        	  }else{
        	      
        	      $profits = $amount;
        		  $returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+22 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the platinum investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        	      
        	  }
		
	   
				  
            }else{
                
                        $sql = "SELECT sponsor FROM argent_client_db WHERE username = '$username'";
            		    $result2 = mysqli_query($cxn, $sql) or die("mysql_error()");
            			$row2 = mysqli_fetch_assoc($result2);
            					extract($row2);
            			
                            mysqli_query($cxn, "UPDATE ref_bonus SET amount=amount + '$ref_bonus' WHERE receiver='$sponsor'");
                            
                        	  if($plan == 'ruby'){
        		
        		$profits = (0.3 * $amount);
        		$returns = $amount + $profits;
        		$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+7 days'));
            
        
        		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits', '$returns','$exp_date1', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        	   
        				$_SESSION['error'] = "You have subscribed to the ruby investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        	  }else if($plan == 'gold'){
                $profits = (0.5 * $amount);
        		$returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+11 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the gold investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        
        	  }else{
        	      
        	      $profits = $amount;
        		  $returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+22 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the platinum investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        	      
        	  }
		
            }
						
				  
							  
			
		   
				  
		  
		   
          
		
		 
}



//UPDATE USER DETAILS
if(isset($_POST['update'])){
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET phone_no='$phone', firstname='$fname', lastname='$lname', country='$country' WHERE user_id='$user_id'");
	
    if($result){
        $_SESSION['error'] = "Profile Updated succesfully!"; 
							            header("location:profile.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}


//change currency and country

if(isset($_POST['update_currency'])){
	
	
	$currency = $_POST['currency'];
	$country = $_POST['country'];
	    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET currency='$currency', country='$country' WHERE user_id='$user_id'");
	
    if($result){
        $_SESSION['error'] = "Data saved succesfully!"; 
							            header("location:settings.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}




//UPDATE USER DETAILS
if(isset($_GET['close'])){
	$trans = $_GET['close'];
	
	$check_inv = "SELECT * FROM trade_zone WHERE transid='$trans'";
                                 $r = mysqli_query($cxn, $check_inv);
                                 
                                   $row=mysqli_fetch_assoc($r);
                                   extract($row);
                                   
    $balance = $trade_amount + $profit;

	mysqli_query($cxn, "UPDATE user_wallet SET account_balance=account_balance + '$balance' WHERE username='$username'");
    mysqli_query($cxn, "UPDATE trade_zone SET completed='yes' WHERE transid='$trans'");
        $_SESSION['error'] = "Congratulations! You have successfully closed the trade"; 
							            header("location:activetrades.php");
                                        $stmt->close(); 
										exit(0);
    
	
    
}

//message support

//UPDATE USER DETAILS
if(isset($_POST['support'])){
	
	
    $title = $_POST['subject'];
	$message = $_POST['msg'];
	$dt = date("Y-m-d H:i:s");
	
	
	
    $result = mysqli_query($cxn, "INSERT INTO notifications(sender, title, receiver, message, message_time, status) 
	VALUES('$user_id', '$title','Admin', '$message','$dt', '0')");
    
    if($result){
        $_SESSION['error'] = "Your message has been sent succesfully!"; 
							            header("location:support.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}
//SEND REPLY TO USER

if(isset($_POST['send_reply'])){
	$title = $_POST['title'];
	$msg = $_POST['reply'];
	$dt = date("Y-m-d H:i:s");

	$query = "INSERT INTO support(sender, receiver, title, message, status) VALUES('$username', 'Admin','$title', '$msg', '0')";
	$result = mysqli_query($cxn, $query);
	if($result){
	 $message .= "Reply Sent Successfully";
									$_SESSION['error']= $message;
								   header("location:viewmessages.php");
								  exit(0); 
	}else{
	    echo "Error! Data failed to submit to database";
	}
	
	
	
	
}

//UPDATE USER DETAILS
if(isset($_POST['withdraw'])){
	
	
    $amount = $_POST['amount'];
	$method = $_POST['method'];

	if($amount > $account_balance){
		$_SESSION['error'] = "Your withdrawal amount cannot be greater than your account balance!"; 
		header("location:viewwithdrawal.php");
		$stmt->close(); 
		exit(0);

	}else{

		$result = mysqli_query($cxn, "INSERT INTO client_withdrawals(receiver, with_amount, withdrawal_method, completed) 
		VALUES('$username', '$amount', '$method', 'no')");
    
		if($result){
			$_SESSION['error'] = "No withdrawals approved yet! But request is submitted"; 
											header("location:viewwithdrawal.php");
											$stmt->close(); 
											exit(0);
		}
	}
	
	
	
   
	
    
}


//UPDATE USER DETAILS
if(isset($_POST['testify'])){
	
	$testimony = $_POST['testimony'];
	$dt = date("Y-m-d H:i:s");
	
	
	
	
    $result = mysqli_query($cxn, "INSERT INTO testimonials(sender, message, message_time, status) VALUES('$username', '$testimony', '$dt', '0')");
    
    if($result){
        $_SESSION['error'] = "Your testimony has been sent succesfully!"; 
							            header("location:testimony.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}

//BTC PROOF
if(isset($_POST['btc_proof'])){
	
$target = "act_pop/";
$target = $target . basename( $_FILES['pop']['name']); 
$transid=$_POST['trans'];
$amount=$_POST['amt'];
$pic=($_FILES['pop']['name']);

if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:wallet.php?trans=$transid&amt=$amount");
            		      exit(0); 
}						  

$query = "UPDATE client_investment2 SET pop='$pic' WHERE transid='$transid'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
    
                         $message .= "Your Proof of payment has been uploaded successfully. Kindly hold on while we verify and confirm your payment. Thank you.";
            				$_SESSION['error']= $message;
            		       header("location:fundaccount.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:wallet.php?trans=$transid&amt=$amount");
            		      exit(0); ; 
}	
	
}

if(isset($_POST['bank_proof'])){
	
	$target = "act_pop/";
	$target = $target . basename( $_FILES['pop']['name']); 
	$transid=$_POST['trans'];
	$amount=$_POST['amt'];
	$method=$_POST['method'];
	$pic=($_FILES['pop']['name']);
	
	if($pic==''){
	$message .= "You didnt select any file for upload";
								$_SESSION['error']= $message;
							   header("location:bank.php?trans=$transid&amt=$amount&method=$method");
							  exit(0); 
	}						  
	
	$query = "UPDATE client_investment2 SET pop='$pic' WHERE transid='$transid'";
	mysqli_query($cxn, $query);
	if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
	{ 
		
							 $message .= "Your upload was successful! Awaiting confirmation.";
								$_SESSION['error']= $message;
							   header("location:bank.php?trans=$transid&amt=$amount&method=$method");
							  exit(0);
	}
	else {
	
	$message .= "There was an error uploading your POP";
								$_SESSION['error']= $message;
							   header("location:bank.php?trans=$transid&amt=$amount&method=$method");
							  exit(0); 
	}	
		
	}

if(isset($_POST['momo_proof'])){
	
$target = "act_pop/";
$target = $target . basename( $_FILES['pop']['name']); 
$transid=$_POST['trans'];
$amount=$_POST['amt'];
$method=$_POST['method'];
$pic=($_FILES['pop']['name']);

if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:momo.php?trans=$transid&amt=$amount&method=$method");
            		      exit(0); 
}						  

$query = "UPDATE client_investment2 SET pop='$pic' WHERE transid='$transid'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
    
                         $message .= "Your Proof of payment has been uploaded successfully. Awaiting confirmation...";
            				$_SESSION['error']= $message;
            		       header("location:momo.php?trans=$transid&amt=$amount&method=$method");
							  exit(0);;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:momo.php?trans=$transid&amt=$amount&method=$method");
							  exit(0);
}	
	
}










?>