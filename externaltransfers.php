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
                
                <div class="flex flex-col md:flex-col justify-between items-center py-12">
                    
                    <h4 class="font-bold text-2xl">Transfers</h4>
                          
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            
                <!--accounts-->
                <div class="flex flex-col gap-4 px-2 w-full md:py-4 md:w-2/3">
                    <div class="px-4">
                    <h4 class="font-bold text-blue-700 text-left p-2 text-xl"><i class="ri-id-card-fill"></i>&nbsp;&nbsp;Add Recipient Account</h4>
                    <p>Add a recipient account if you need to send money to a person at another institution. 
                        Save recipient as a beneficiary you need to send money multiple times to the user</p>
                    </div>
                       
                    <div class="md:px-6 w-full">


                    <form action="processtransfers.php" method="post">
  <div class="py-6 px-6">
    

    <div class="border-b border-gray-900/10 pb-12">

    <?php
        if(isset($_SESSION['error'])){
          $msg = $_SESSION['error'];
        
    ?>
    <p class="py-2 px-2 max-w-64 text-white bg-red-700"><?php echo $msg ?></p>
    <?php
     unset($_SESSION['error']);
        }
    ?>

<?php
        if(isset($_SESSION['success'])){
          $msg1 = $_SESSION['success'];
        
    ?>
    <p class="py-2 px-2 max-w-64 text-white bg-blue-700"><?php echo $msg1 ?></p>
    <?php
    unset($_SESSION['success']);
        }
    ?>
      <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3 py-3">
          <label for="from" class="block text-sm font-medium leading-6 text-white bg-blue-800 w-full max-w-24 p-2">From</label>
          <div class="mt-2 border">
            <select id="from" name="from" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option value="savings" selected>Savings</option>
              <option value="checking">Checking</option>
              
            </select>
          </div>
        </div>
        <div class="flex flex-col md:flex-row sm:col-span-4 py-3">
          
          <div class="mt-2">
          <label for="accountname" class="block text-sm font-medium leading-6 text-white bg-blue-800 w-full max-w-48 p-2">Account Name *</label>
            <input name="accountname" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="nickname" class="block text-sm font-medium leading-6 text-gray-900">Nick Name</label>
            <input name="nickname" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 py-3">
          <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount *</label>
          <div class="mt-2">
            <input id="amount" name="amount" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 py-3">
          <div class="mt-2">
          <label for="nickname" class="block text-sm font-medium leading-6 text-gray-900">Routing Number *</label>
            <input name="routingno" type="text" placeholder="Routing number" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 py-3">
          <div class="mt-2">
          <label for="bank" class="block text-sm font-medium leading-6 text-gray-900">Financial Institution *</label>
            <input name="bank" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="flex flex-col md:flex-row sm:col-span-4 py-3">
          
          <div class="mt-2">
          <label for="accounttype" class="block text-sm font-medium leading-6 w-full max-w-48 p-2">Account Type</label>
          <select id="accounttype" name="accounttype" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option selected>Savings</option>
              <option>Checking</option>
              
            </select>
          
        </div>
          <div class="mt-2">
          <label for="accountno" class="block text-sm font-medium leading-6 text-gray-900">Account No</label>
            <input name="accountno" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 py-3">
          <label for="senddate" class="block text-sm font-medium leading-6 text-gray-900">Sent on Date *</label>
          <div class="mt-2">
            <input name="senddate" type="date" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="flex flex-col md:flex-row sm:col-span-4 py-3">
          
          <div class="mt-2">
          <label for="beneficiary" class="block text-sm font-medium leading-6 w-full max-w-48 p-2">Save as Beneficiary</label>
          <select id="beneficiary" name="beneficiary" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option selected>Yes</option>
              <option>No</option>
              
            </select>
          
        </div>
        </div>

        
      </div>
    </div>
    <div class="mt-6">
    
    <button type="submit" name="sendmoney" class="rounded-md w-full bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
    
  

  
  </div>
</form>                                 
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>