<?php
  //date_default_timezone_set('Your/Timezone');
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
                    
                    <h4 class="font-bold text-2xl">Transfers</h4>  
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            
                <!--accounts-->
                <div class="flex flex-col px-6 py-4 w-full md:py-4 md:w-2/3 gap-6">
                    
                        
                    <div class="flex flex-col md:flex-row md:px-6 w-full gap-3">
                        <a href="transfermoney.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in">Transfer Money</a>
                        <a href="externaltransfers.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in">External Transfers</a>
                        
                        <a href="transferhistory.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in">Transfer History</a>
                        

                    
  
                    </div>
                    <h4 class="text-left">Wire Transfers</h4>
                    <div class="flex flex-col md:flex-row md:px-6 w-full gap-3">
                        
                        <a href="domesticwire.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in">Wire Transfer</a>
                        <a href="wiretransfer2.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in">International Wire</a>
                        
                        <a href="wirehistory.php" class="px-8 py-3 md:max-w-sm text-white text-center bg-blue-800 baseline hover:bg-blue-900 ease-in">Transfer History</a>
                        

                    
  
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>