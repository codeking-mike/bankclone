<?php
  //date_default_timezone_set('Your/Timezone');
  include_once('auth.php');
  include_once('functions.php');
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
                
                <div class="flex flex-col md:flex-col justify-between items-center py-12">
                    
                    <h4 class="font-bold text-2xl">Transaction History</h4>
                    
                           
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32 px-10">
            
                <!--accounts-->
            <div class="px-2 py-4 w-full md:py-4 md:w-2/3">
                <div class="mb-4">
                <form action="processtransfers.php" method="post">
                    <input type="text" id="searchInput" placeholder="Search..." class="border border-gray-300 rounded-md px-3 py-2 mr-2">
                    <input type="date" id="dateFilter" class="border border-gray-300 rounded-md px-3 py-2">
                </form>
                </div>    
                    
                <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-gray-600 md:text-2xl md:max-w-xl md:text-left">
                            Recent Transactions
                        </h2>
                        
                    </div>
                    <!--recent transactions -->
                    <div class="px-6 bg-white py-3">
                        
                    
                            <?php
                                 $sql = "SELECT * FROM transactions WHERE user_id='$user_id' LIMIT 20";
                                 $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
                                 if(mysqli_num_rows($result) > 0){
                                 while($row = mysqli_fetch_assoc($result)){
                                    extract($row);
                            ?>
                            <div class="flex flex-row gap-3 bg-white p-2 md:p-8 my-1">
                            <h3 class="text-xl text-center">
                            <i class="ri-arrow-left-right-line"></i>
                            
                            </h3>
                            <div class="text-left ">
                                <p class="font-bold text-left"><?php echo $to_account ?></p>
                                <p class="text-left text-gray-500 my-4 -mt-1 text-sm">
                                   <?php
                                        
                                        echo $transaction_type;
                                   
                                   ?>
                                
                                </p>
                            </div>
                            <div class="text-left ml-auto ">
                                <p class="font-bold text-left"><?php
                                if($transaction_type == 'Transfer'){
                                        $che = formatCurrency($amount, 'USD');
                                        echo '-'. $che;
                                }else{
                                    $che = formatCurrency($amount, 'USD');
                                        echo $che; 
                                }
                                    ?></p>
                                <p class="text-left text-gray-500 my-4 -mt-1 text-sm"> 
                                    From <?php
                                        
                                        echo $from_account;
                                   
                                   ?></p>
                            </div>
                                            
                        
                    
                        
                            
                            </div>
                            <?php
                                 }
                                }

                            ?>
                           
                        
                                                
                     
                  
                    </div>
                  
            </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>