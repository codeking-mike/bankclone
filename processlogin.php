<?php

session_start();
include("db_connect.php");

if(isset($_POST['login'])){
            $log_id = stripcslashes(strip_tags($_POST['logid']));
	        $pass = stripcslashes(strip_tags($_POST['password']));
          $user_type = $_POST['type'];
            $sidi = session_id();
            
            $prep_stmt = "SELECT user_id, user_password, is_admin, user_type FROM bank_users WHERE login_id = ? LIMIT 1";
            $stmt = $cxn->prepare($prep_stmt);
            if ($stmt) {
                 $stmt->bind_param('s', $log_id);
                 $stmt->execute();
                 $stmt->store_result();
 
                    if ($stmt->num_rows == 1) {
                    // A user with this details exists
                        $stmt ->bind_result($id, $password, $admin, $type);
                        $stmt->fetch();
                    if($pass == $password){
									 
									 if($user_type != $type){
									  $_SESSION['error'] = "You have selected an Invalid account type"; 
							            header("location:login.php");
                                        $stmt->close(); 
										exit(0);
									 }else{
										if($admin=='yes'){
											$_SESSION['admin'] = $id;
											header("location:./management/");
											$stmt->close();   
										}else{
											$_SESSION['user'] = $id;
                          header("location:dashboard.php");
											    $stmt->close();   
                      
										}

									 }
                                       
		                 
										   
								    }else{
										$message .= 'Incorrect Password. Enter your correct password';
                                        $_SESSION['error'] = $message;                 
                                        header("location:login.php");
									}  
              }else{
                                   $message .= 'User ID incorrect! Please enter your correct login details';
                                    $_SESSION['error'] = $message;                 
                                    header("location:login.php");
                                    $stmt->close();
                                    exit(0);
                    }
          } 
}

if(isset($_POST['reset'])){
     
     $email = stripcslashes(strip_tags($_POST['email'])); 
     $sess = session_id();
     
     $prep_stmt = "SELECT user_id  FROM argent_client_db WHERE user_email = ? LIMIT 1";
            $stmt = $cxn->prepare($prep_stmt);
            if ($stmt) {
                 $stmt->bind_param('s', $email);
                 $stmt->execute();
                 $stmt->store_result();
 
                    if ($stmt->num_rows == 1) {
                        $stmt ->bind_result($id);
                        $stmt->fetch();
                      //send password reset link  
                      
                    $sql_ship = "INSERT INTO password_reset(pemail, psession) VALUES('$email','$sess')";
                    $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));

                        // Subject of the email
                        $subject = "Password Reset";
                        
                        // Message body
                        $message = "Hello,\r\n\r\nYou requested a password reset, if this was you kindly click on the following link to reset your password:\r\n\r\n";
                        $message .= "<a href='https://www.dynamicassets.site/account/reset.php?id=$id&sess=$sess'>Reset Password</a>";
                        
                        // Additional headers
                        $headers = "From: noreply@dynamicassets.site\r\n";
                        $headers .= "Content-type: text/html\r\n"; // Set the content type to HTML
                        
                        // Check if the mail is sent successfully
                        mail($email, $subject, $message, $headers);
                        $msg .= 'A password reset link has been sent to your email. Kindly check your INBOX or SPAM folder';
                                    $_SESSION['error'] = $msg;                 
                                    header("location:forgot.php");
                                    $stmt->close();
                                    exit(0);   
                        
                    }else{
                        
                         $message .= 'Email not found! Kindly check and try again';
                                    $_SESSION['error'] = $message;                 
                                    header("location:forgot.php");
                                    
                                    exit(0);   
                        
                    }
                    
            }
     
     
    
}

if(isset($_POST['change'])){
     
     $email = $_POST['email']; 
     $pass = stripcslashes(strip_tags($_POST['pass'])); 
     $sess = session_id();
     
     mysqli_query($cxn,"UPDATE argent_client_db SET user_password='$pass' WHERE user_email = '$email'");

                        // Subject of the email
                        $subject = "Password Reset Successful";
                        
                        // Message body
                        $message = "Your password has been changed successfully!";
                        
                        // Additional headers
                        $headers = "From: noreply@dynamicassets.site\r\n";
                        $headers .= "Content-type: text/html\r\n"; // Set the content type to HTML
                        
                        // Check if the mail is sent successfully
                        mail($email, $subject, $message, $headers);
                        $msg .= 'Password has been changed. Kindly login to proceed';
                                    $_SESSION['error'] = $msg;                 
                                    header("location:login.php");
                                    exit(0);   
                        
                   
                    
            
     
     
    
}


    
mysqli_close($cxn);        
        
       

?>