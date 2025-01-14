<?php

//include important bfiles
session_start();
include("./db_connect.php");

function clean($str){
	return strip_tags(trim($str));        
}
// check if the form was submitted
if(isset($_POST['register'])){
	
          foreach($_POST as $field => $value) {
             if($field != "register"){
		if(preg_match("/fname/i",$field)){
		if (!preg_match("/^[A-Za-z .'  -]{1,120}$/",$value)){
			$errors[] = "$value is not a valid name.";
		}
		}

        if(preg_match("/pass/i",$field)){
            if(!preg_match("/^[A-Za-z0-9#@$' -]{6,50}$/",$value)){
                $errors[] = "Invalid character in password or password too short. Minimum of 6 characters allowed";
            }
            }
            if(preg_match("/email/i",$field)){
            if(!preg_match("/^.+@.+\\..+$/",$value)){
                 $errors[]="$value is not a valid email address.";
            }
            }
		
		
	
		      $$field = clean($value);
                 }
            }
           if(@is_array($errors)){
		$message = "";
		foreach($errors as $value){
		$message .= $value." Please try again<br />";
		$_SESSION['error']= $message;
		}
		header("location:register.php");
		exit();
             } 
/* Process data when all fields are correct */

        $fname = strip_tags($_POST['fname']);
        $lname = strip_tags($_POST['lname']);
		$email = strip_tags($_POST['email']);
        $country = strip_tags($_POST['country']);
        $pass = strip_tags($_POST['pass']);
        $currency = 'USD';
		$ref = strip_tags($_POST['code']);
        $dt = date('Y-m-d');
        $status='yes';
		//use password encryption to encrypt the password
		
        
	
         // check existing user?
          // check if a user with the email address exists       
          $prep_stmt = "SELECT user_id FROM argent_client_db WHERE user_email = ? LIMIT 1";
          $stmt = $cxn->prepare($prep_stmt);
          if ($stmt) {
               $stmt->bind_param('s', $email);
              $stmt->execute();
              $stmt->store_result();
      if ($stmt->num_rows == 1) {
       // A user with this email address already exists
      $message .= 'A user with this email address already exists';
      $_SESSION['error'] = $message;
                      $stmt->close();
                  header("location:register.php");
      exit(0);
              
      }
          }
	
               
            // Insert the new user into the database
	      $sql_ship = "INSERT INTO argent_client_db(firstname, lastname, user_email, user_password, country, currency, sponsor, date_joined, is_admin, blocked)
										VALUES('$fname','$lname', '$email','$pass','$country','$currency', '$ref', '$dt','no','no')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));


	   if($result){

        $userid = mysqli_insert_id($cxn);

        $sql_s = "INSERT INTO user_wallets(userid, account_balance, bonus)
        VALUES('$userid','0.00', '0.00')";
$res = mysqli_query($cxn,$sql_s)
or die("$sql_s" . mysqli_error($cxn));

//send welcome email

// Receiver email address

// Subject of the email
$subject = "Welcome to Dynamic Assets";

// Message body
$body = "Congratulations! Your account creation was successful. Start trading and earning amazing returns.";

// Additional headers
$headers = "From: noreply@dynamicassets.site\r\n";
$headers .= "Reply-To: noreply@dynamicassets.site\r\n";

// Check if the mail is sent successfully
mail($email, $subject, $body, $headers);

$message .= "Account creation was successful. Kindly login to continue";
			$_SESSION['error'] = $message;
			
		   header("location:./login.php");
      
	
        
 } 
}


mysqli_close($cxn);
?>