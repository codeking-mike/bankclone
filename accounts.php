<?php
  //date_default_timezone_set('Your/Timezone');
  include_once('auth.php');
  include_once('functions.php');

  if(isset($_GET['id'])){
    $userid = $_GET['id'];
  

  $sql = "SELECT * FROM user_account WHERE user_id='$userid' AND account_type='checking' LIMIT 1";
 $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
 while($row = mysqli_fetch_assoc($result)){
	 extract($row);

    }
 }	

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
    <script>
        function showMessage(){
            alert("You don't have any active Debit OR Credit cards!");
        }
    </script>
   
</head>
<body>
    <div> 
        
    <!--header-->
    <?php include_once('header.php'); ?>
      
        
        <!--hero section-->
        <section class="bg-blue-800 border-b-2 border-white">
            <!--f;ex container-->
            <div class="px-6 space-y-0 md:space-y-0 bg-blue-800 text-white">
                <div class="px-2 py-2">
                    <h5 class="text-center"><span class="font-bold">Overview</span>

                </div>
                <div class="flex flex-col md:flex-col justify-between items-center py-6">
                    
                    <h4 class="font-bold text-2xl">
                        <?php
                                        $che = formatCurrency($available_balance, 'USD');
                                        echo $che;
                                    ?></h4>
                         <p>Checking</p>
                         <p><?php echo $account_number ?> <span ><i class="ri-file-copy-line"></i></span></p>
                    <div class="flex flex-row gap-3 justify-between items-center">
                    <a href="#" id="showAlertBtn" onClick="showMessage()" class="md:px-8 px-5 py-1 md:max-w-sm hover:text-white text-blue-800 text-center bg-white baseline hover:bg-blue-600 "><i class="ri-arrow-left-right-fill h-12 w-12"></i>&nbsp;&nbsp;Card Controls</a>
                    <a href="statement.php" class="md:px-8 px-5 py-1 md:max-w-sm text-white border border-gray-100 text-center"><i class="ri-arrow-left-right-fill h-12 w-12"></i>&nbsp;&nbsp;View E-statements</a>
                    
                </div> 
                    
                    
                    
                        
                    
                </div>
            </div>
        </section>
    
        <section class="bg-blue-800 text-white pb-32 border-b-2 border-white">
            <!--container-->
            <div class="py-4 px-4">
                <!--accounts-->
                <div class="flex flex-col gap-1 px-2 py-4 w-full md:py-4 md:w-2/3">
                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-white md:text-2xl md:max-w-xl md:text-left">
                            Account Information
                        </h2>
                    </div>
                    <div class="md:px-6 w-full">


                    <table class="table-auto w-full">
                
                <tbody>
                    <tr class="border-b-2 border-white">
                    <td>Product</td>
                    <td>Checking</td>
                    
                    </tr>
                    <tr class="border-b-2 border-white">
                    <td>Routing No</td>
                    <td><?php echo $routing_no ?></td>
                   
                    </tr>
                    <tr class="border-b-2 border-white">
                    <td>Date Opened</td>
                    <td><?php echo $date_opened ?></td>
                    
                    </tr>
                    <tr class="border-b-2 border-white">
                    <td>Last Statement Date</td>
                    <td><?php echo $last_statement_date ?></td>
                    
                    </tr>
                </tbody>
                </table>
                        
                               
                    </div>

                   
                    


                </div>

                 <!--payandtools-->
                <div class="flex flex-col gap-1 px-2 py-4 w-full md:py-4">

                    <div class="flex flex-row md:px-20 py-3">
                        <h2 class="text-xl leading-tight text-left text-white md:text-2xl md:max-w-xl md:text-left">
                            Balance Information
                        </h2>
                    </div>
                    <div class="w-full">

                    <table class="table-auto w-full">
                
                <tbody>
                    <tr class="border-b-2 border-white">
                    <td>Current Balance</td>
                    <td>
                    <?php
                                        $che = formatCurrency($available_balance, 'USD');
                                        echo $che;
                                    ?>
                    </td>
                    
                    </tr>
                    <tr class="border-b-2 border-white">
                    <td>Total Available</td>
                    <td><?php
                                        $che = formatCurrency($total_available, 'USD');
                                        echo $che;
                                    ?></td>
                   
                    </tr>
                    
                    
                    
                </tbody>
                </table>
                    
                     
                    </div>
                   
                    
                </div>
            </div>

           
        </section>
       
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>