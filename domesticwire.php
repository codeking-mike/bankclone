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
                    
                    <h4 class="font-bold text-2xl">Wire Transfer</h4>
                          
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            
                <!--accounts-->
                <div class="flex flex-col gap-4 px-2 w-full md:py-4 ">
                    <div class="px-4">
                    <h4 class="font-bold text-blue-700 text-left p-2 text-xl"><i class="ri-id-card-fill"></i>&nbsp;&nbsp;Domestic Wire Transfer</h4>
                    <p>Create a domestic wire transfer to recipients within the United States</p>
                    </div>
                       
                    <div class="md:px-6 w-full">


                    <form>
  <div class="w-full px-6">
    

    <div class="border-b border-gray-900/10 pb-12">
      
      <div class="mt-5 gap-x-6 gap-y-8">
        <h4 class="text-gray-700 text-left py-2">Originator Information <span class="text-red-400">*</span></h4>

        <div class="flex flex-col md:flex-row md:space-x-8 md:space-y-0 space-y-4 gap-4 md:w-2/3">
            <div class="mt-2 md:w-auto w-full">
                <label for="fromSelect" class="block text-sm font-medium leading-6 w-full p-2">From</label>
                <select id="fromSelect" name="from" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>Savings</option>
                    <option>Checking</option>
                </select>
            </div>
            <div class="mt-2 md:w-auto w-full">
                <label for="referenceTextarea" class="block text-sm font-medium leading-6 w-full p-2">Customer Reference (Optional)</label>
                <textarea name="reference" id="referenceTextarea" cols="10" rows="3" class="border block w-full rounded-md "></textarea>
            </div>
        </div>

        <h4 class="text-gray-700 text-left py-3 mt-5">Beneficiary Information <span class="text-red-400">*</span></h4>
        <div class="flex flex-col md:flex-row gap-4 md:w-3/4">
            <div class="mt-3 md:w-auto w-full">
            <label for="accountname" class="block text-sm font-medium leading-6 w-full">Name *</label>
            <input name="accountname" placeholder="ABC Company" type="text" class="border block w-full py-2 px-2 rounded-md text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="address1" class="block text-sm font-medium leading-6 text-gray-900">Address Line 1 *</label>
            <input name="address1" type="text" placeholder="address 1" class="border block w-full py-2 px-2 rounded-md text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="address2" class="block text-sm font-medium leading-6 text-gray-900">Address Line 2</label>
            <input name="address2" type="text" class="border block w-full rounded-md py-2 px-2 text-gray-900 shadow-sm">
          
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 md:w-3/4 mt-5">
            <div class="mt-2 md:w-auto w-full">
            <label for="country" class="block text-sm font-medium leading-6 w-full">Country *</label>
            <select id="country" name="country" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>UNITED STATES</option>
                </select>
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City *</label>
            <input name="city" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
            <input name="state" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="postal" class="block text-sm font-medium leading-6 text-gray-900">Postal Code</label>
            <input name="postal" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 md:w-2/3 mt-5">
            <div class="mt-2 md:w-auto w-full">
            <label for="accno" class="block text-sm font-medium leading-6 w-full">Account Number *</label>
            <input name="accno" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="codetype" class="block text-sm font-medium leading-6 text-gray-900">Bank Code Type *</label>
            <select id="codetype" name="codetype" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>ABA</option>
                </select>
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="bankcode" class="block text-sm font-medium leading-6 text-gray-900">Bank Code</label>
            <input name="bankcode" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
           
        </div>

        <h4 class="text-left py-3 mt-5 font-bold text-blue-600">Date and Amount <span class="text-red-400">*</span></h4>
        <div class="flex flex-col md:flex-row gap-4 md:w-2/3 mt-5">
        <div class="sm:col-span-4 py-3">
          <label for="senddate" class="block text-sm font-medium leading-6 text-gray-900">Sent on Date *</label>
          <div class="mt-2">
            <input name="senddate" type="date" class="border block w-full rounded-md py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="mt-2 md:w-auto w-full py-3">
            <label for="amount" class="block text-sm font-medium leading-6 w-full">Credit Amount *</label>
            <input name="amount" type="text" class="border block w-full rounded-md py-2 px-2 text-gray-900 shadow-sm">
            </div>
            
           
        </div>
        

        
      </div>
    </div>
    <div class="flex flex-row mt-3 gap-4">
    
    <button type="submit" name="save" class="rounded-md w-full bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save of later</button>
    <button type="submit" name="submit" class="rounded-md w-full bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    
     </div>
    
  

  
  </div>
                                                   
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>