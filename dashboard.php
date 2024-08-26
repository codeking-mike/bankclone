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
    <title>Account Dashboard</title>
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
        <section class="bg-blue-800">
            <!--f;ex container-->
            <div class="container flex flex-col px-6 space-y-0 md:space-y-0 bg-blue-800 text-white">
                
                <div class="md:w-1/2 text-left py-6">
                        <h4 class="text-2xl text-left md:text-center font-light">Welcome back</h4>
                        <h5 class="text-lg text-left md:text-center font-bold uppercase"><?php echo $firstname ?>!</h5>
                    
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            <!--container-->
            <div class="flex flex-col md:flex-row py-4 px-4 md:gap-16">
                <!--accounts-->
                <div class="flex flex-col gap-1 px-2 py-4 w-full md:py-4 md:w-2/3">
                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-gray-600 md:text-2xl md:max-w-xl md:text-left">
                            Deposit Accounts
                        </h2>
                    </div>
                    <div class="flex flex-col md:flex-row md:px-6 gap-1 md:gap-3">

                        <!--first div-->
                        <a href="accounts.php?id=<?php echo $user_id ?>" class="flex flex-row gap-3 bg-white p-8 my-1">
                            <h3 class="text-xl text-center">
                                <span class="p-3 bg-blue-800 text-white font-bold rounded-full">
                                Ch
                                </span>
                            
                            </h3>
                            <div class="text-left ">
                                <p class="font-bold text-left">Checking</p>
                                <p class="text-left text-gray-500 my-4 -mt-1">
                                   <?php
                                        $cno = replaceWithAsterisks($checking_no);
                                        echo $cno;
                                   
                                   ?>
                                
                                </p>
                            </div>
                            <div class="text-left ml-auto ">
                                <p class="font-bold text-left"><?php
                                        $che = formatCurrency($checking, 'USD');
                                        echo $che;
                                    ?></p>
                                <p class="text-left text-gray-500 my-4 -mt-1">Available</p>
                            </div>
                                            
                        
                    
                        </a>
                        
                        <a href="accounts2.php?id=<?php echo $user_id ?>" class="flex flex-row bg-white p-8 my-1 gap-3">
                            <h3 class="text-2xl font-semibold text-center">
                                <span class="p-3 bg-blue-800 text-white font-bold rounded-full">
                                SV
                                </span>
                            
                            </h3>
                            <div class="text-left ">
                                <p class="font-bold text-left">Savings</p>
                                <p class="text-left text-gray-500 my-4 -mt-1"><?php
                                        $sno = replaceWithAsterisks($savings_no);
                                        echo $sno;
                                   
                                   ?></p>
                            </div>
                            <div class="text-left ml-auto">
                                <p class="font-bold text-left">
                                    <?php
                                        $sav = formatCurrency($savings, 'USD');
                                        echo $sav;
                                    ?>
                                </p>
                                <p class="text-left text-gray-500 my-4 -mt-1">Available</p>
                            </div>       
                    
                        </a>        
                    </div>

                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-gray-600 md:text-2xl md:max-w-xl md:text-left">
                            Credit Cards & Loans
                        </h2>
                    </div>
                    <div class="flex flex-col md:flex-row md:px-6 gap-1">

                    <!--first div-->
                    <div class="flex flex-row gap-3 bg-white p-8 my-1">
                        <h3 class="text-xl text-center">
                            <span class="p-3 bg-blue-800 text-white font-bold rounded-full">
                            BL
                            </span>
                        
                        </h3>
                        <div class="text-left ">
                            <p class="font-bold text-left">Business Loans</p>
                            <p class="text-left text-gray-500 my-4 -mt-1">********</p>
                        </div>
                        <div class="text-left ml-auto ">
                            <p class="font-bold text-left">$0.00</p>
                            <p class="text-left text-gray-500 my-4 -mt-1">Not Available</p>
                        </div>
                                                
                       </div>
                  
                    </div>
                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-gray-600 md:text-2xl md:max-w-xl md:text-left">
                            Recent Transactions
                        </h2>
                        <a href="transactions.php" class="font-bold ml-auto text-right text-blue-700">View All</a>
                    </div>
                    <!--recent transactions -->
                    <div class="px-6 bg-white py-3">
                        
                    
                            <?php
                                 $sql = "SELECT * FROM transactions WHERE user_id='$user_id' LIMIT 3";
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

                 <!--payandtools-->
                <div class="flex flex-col gap-1 px-2 py-4 w-full md:py-4">

                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-gray-600 md:text-2xl md:max-w-xl md:text-left">
                            Pay / Transfer Tools
                        </h2>
                    </div>
                    <div class="flex flex-col gap-1">
                    <a href="quicktransfer.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in"><i class="ri-arrow-left-right-fill h-12 w-12"></i>&nbsp;&nbsp;Make a Quick Transfer</a>
                    <a href="quickpayment.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in"><i class="ri-exchange-dollar-fill"></i>&nbsp;&nbsp;Make a Quick Payment</a>
                    
                    </div>
                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-gray-600 md:text-2xl md:max-w-xl md:text-left">
                            Helpful Tools
                        </h2>
                    </div>
                    <div class="flex flex-col gap-2">
                    <a href="#" class="px-8 py-3 md:max-w-sm text-gray-500 text-center bg-white baseline "><i class="ri-mail-unread-line"></i>&nbsp;&nbsp;You have <span><b>0 unread</b></span> messages</a>
                    <a href="#" class="px-8 py-3 md:max-w-sm text-gray-500 text-center bg-white baseline "><i class="ri-bank-card-fill"></i>&nbsp;&nbsp;Manage your cards</a>
                    <a href="#" class="px-8 py-3 md:max-w-sm text-gray-500 text-center bg-white baseline "><i class="ri-bank-fill"></i>&nbsp;&nbsp;Open A New Account</a>
                    <a href="#" class="px-8 py-3 md:max-w-sm text-gray-500 text-center bg-white baseline "><i class="ri-money-dollar-circle-line"></i>&nbsp;&nbsp;Send Money with Zelle</a>
                    
                    </div>
                </div>
            </div>

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>