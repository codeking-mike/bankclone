<?php
include_once('auth.php');
include_once('functions.php');

  if(isset($_GET['trans'])){
    $transid = $_GET['trans'];
    $sql = "SELECT * FROM external_transfers WHERE fund_id='$transid'";
    $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }	
  }

?>

<?php
  //date_default_timezone_set('Your/Timezone');
  include_once("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Accounts</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
   crossorigin="anonymous"
   referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css">
   
</head>
<body>
    <div> 
        
    <!--header-->
    <?php include_once('header.php'); ?>
      
        
        <!--hero section-->
        <section class="bg-blue-800 border-b-2 border-white">
            <!--f;ex container-->
            <div class="px-6 space-y-0 md:space-y-0 bg-blue-800 text-white">
                
                <div class="flex flex-col md:flex-col justify-between items-center  px-5 py-12 md:px-10 mx-auto">
                    <p>Confirm transfer of <b><?php
                                        $che = formatCurrency($amount, 'USD');
                                        echo $che;
                                    ?></b> to 1 Beneficiary 
                    </p>
                    <div class="flex flex-row gap-2">
                            <p>From:</p>
                            <p><?php echo $from_account ?></p>

                    </div>
                    <div class="flex flex-row gap-2">
                            <p class="text-left">Recipient:</p>
                            <p class="text-right ml-auto"><b><?php echo $recipient. '('. $account_no. ')'; ?></b></p>

                    </div>
                    <div class="flex flex-row gap-2">
                            <p class="text-left">Transaction Date:</p>
                            <p class="text-right"><b><?php echo $sent_date; ?></b></p>

                    </div>
                    <div class="flex flex-col md:flex-row gap-3 px-2 py-2 justify-between items-center">
                    <a href="processtransfers.php?confirm=<?php echo $transid ?>&amt=<?php echo $amount ?>&from=<?php echo $from_account ?>" class="md:px-8 px-5 py-1 md:max-w-sm hover:text-white text-blue-800 text-center bg-white baseline hover:bg-blue-600 "><i class="ri-arrow-left-right-fill h-12 w-12"></i>&nbsp;&nbsp;Confirm Transfer</a>
                    <a href="canceltransfer.php?cancel=<?php echo $transid ?>&amt=<?php echo $amount ?>&from=<?php echo $from_account ?>" class="md:px-8 px-5 py-1 md:max-w-sm text-white border border-gray-100 text-center"><i class="ri-arrow-left-right-fill h-12 w-12"></i>&nbsp;&nbsp;Cancel Transfer</a>
                    
                    
                    
                          
                </div>
            </div>
        </section>
    
        
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>