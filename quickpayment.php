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
                    
                    <h4 class="font-bold text-2xl">Quick Payment</h4>
                        
                    
                    
                    
                    
                        
                    
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            
                <!--accounts-->
                <div class="px-2 py-4 w-full md:py-4 md:w-2/3">
                    <h4 class="font-bold text-blue-700 text-left p-2 text-xl"><i class="ri-arrow-left-right-fill h-12 w-12"></i>&nbsp;&nbsp;Make a Quick Payment</h4>
                        
                    <div class="md:px-6 w-full">


                    <form>
  <div class="py-6 px-6">
    

    <div class="border-b border-gray-900/10 pb-12">
      
      <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
      <div class="sm:col-span-3 py-3">
        <label for="to" class="block text-sm font-medium leading-6 text-white bg-blue-800 w-full max-w-24 p-2">To</label>
        <div class="mt-2 border">
            <select id="to" name="to" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option selected>Select Recipient</option>
              
              
            </select>
          </div>
        </div>
        <div class="sm:col-span-3 py-3">
          <label for="from" class="block text-sm font-medium leading-6 text-white bg-blue-800 w-full max-w-24 p-2">From</label>
          <div class="mt-2 border">
            <select id="from" name="from" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option selected>Savings</option>
              <option>Checking</option>
              
            </select>
          </div>
        </div>

        

        <div class="sm:col-span-4 py-3">
          <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount *</label>
          <div class="mt-2">
            <input id="amount" name="amount" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 py-3">
          <label for="senddate" class="block text-sm font-medium leading-6 text-gray-900">Sent on Date *</label>
          <div class="mt-2">
            <input name="senddate" type="date" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        
      </div>
    </div>
    <div class="mt-6">
    
    <button type="submit" class="rounded-md w-full bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
    
  

  
  </div>
                                                   
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>