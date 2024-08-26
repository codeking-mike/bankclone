<?php

include_once('auth.php');

//cancel transfers

if(isset($_GET['cancel'])) {
    $trans = $_GET['cancel'];
    $amount = $_GET['amt'];
    $from_account = $_GET['from'];

    // Validate and sanitize inputs to prevent SQL injection
    $trans = mysqli_real_escape_string($cxn, $trans);
    $amount = floatval($amount);
    $from_account = mysqli_real_escape_string($cxn, $from_account);
    $user_id = mysqli_real_escape_string($cxn, $user_id); // Assuming $user_id is defined somewhere in your code

    // Update account balance
    $update_query = "UPDATE user_account SET available_balance = available_balance + $amount WHERE user_id = '$user_id' AND account_type = '$from_account'";
    $update_result = mysqli_query($cxn, $update_query);

    if(!$update_result) {
        // Handle update query error
        $_SESSION['error'] = "Error updating account balance: " . mysqli_error($cxn);
        header("location: externaltransfers.php");
        exit();
    }

    // Delete transfer record
    $delete_query = "DELETE FROM external_transfers WHERE fund_id = '$trans'";
    $delete_result = mysqli_query($cxn, $delete_query);

    if(!$delete_result) {
        // Handle delete query error
        $_SESSION['error'] = "Error canceling transfer: " . mysqli_error($cxn);
        header("location: externaltransfers.php");
        exit();
    }

    // Set success message
    $_SESSION['success'] = "Transfer Canceled!";
    header("location: externaltransfers.php");
    exit();  

    
}


?>