<?php
  //date_default_timezone_set('Your/Timezone');
  include_once('auth.php');
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
                    
                    <h4 class="font-bold text-2xl">Add Local Beneficiary</h4>
                    <p>Add beneficiaries within the US</P>
                        
                    
                    
                    
                    
                        
                    
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            
                <!--accounts-->
                <div class="px-2 py-4 w-full md:py-4">

                                          
                    <div class="md:px-6 md:w-3/4">


        <form action="processtransfers.php" method="post">
                    <h4 class="text-gray-700 text-left py-4 mt-5 text-lg">Beneficiary Information <span class="text-red-400">*</span></h4>
        <?php
        if(isset($_SESSION['success'])){
          $msg1 = $_SESSION['success'];
        
    ?>
    <p class="py-2 px-2 max-w-64 text-white bg-blue-700"><?php echo $msg1 ?></p>
    <?php
    unset($_SESSION['success']);
        }
    ?>
        <div class="flex flex-col md:flex-row gap-4 w-full">
            <div class="mt-3 flex-grow">
                <label for="accountname" class="block text-sm font-medium leading-6 w-full">Name *</label>
                <input name="accountname" placeholder="Account Name" type="text" class="border block w-full py-2 px-2 rounded-md text-gray-900 shadow-sm">
            </div>
            <div class="mt-2 flex-grow">
            <label for="accno" class="block text-sm font-medium leading-6 w-full">Account Number *</label>
            <input name="accno" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
            </div>
            <div class="mt-3 flex-grow">
                <label for="bank" class="block text-sm font-medium leading-6 text-gray-900">Financial Institution</label>
                <input name="bank" type="text" placeholder="Bank Name" class="border block w-full py-2 px-2 rounded-md text-gray-900 shadow-sm">
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            
            <div class="mt-3 flex-grow">
            <label for="address1" class="block text-sm font-medium leading-6 text-gray-900">Address Line 1 *</label>
            <input name="address1" type="text" placeholder="address 1" class="border block w-full py-2 px-2 rounded-md text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 flex-grow">
            <label for="address2" class="block text-sm font-medium leading-6 text-gray-900">Address Line 2</label>
            <input name="address2" type="text" class="border block w-full rounded-md py-2 px-2 text-gray-900 shadow-sm">
          
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 mt-5">
            <div class="mt-2 flex-grow">
            <label for="country" class="block text-sm font-medium leading-6 w-full">Country *</label>
            <select id="country" name="country" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>UNITED STATES</option>
                </select>
            </div>
            <div class="mt-3 flex-grow">
            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City *</label>
            <input name="city" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 flex-grow">
            <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
            <input name="state" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
            <div class="mt-3 flex-grow">
            <label for="postal" class="block text-sm font-medium leading-6 text-gray-900">Postal Code</label>
            <input name="postal" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 mt-5">
        <div class="mt-3 flex-grow">
            <label for="codetype" class="block text-sm font-medium leading-6 text-gray-900">Beneficiary Type</label>
            <select id="bentype" name="bentype" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option>Local</option>
                    <option>International</option>
                    
                </select>
                
            </div>
            
            <div class="mt-3 flex-grow">
            <label for="codetype" class="block text-sm font-medium leading-6 text-gray-900">Bank Code Type *</label>
            <select id="codetype" name="codetype" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>ABA</option>
                    <option>IBAN</option>
                    <option>SWIFT</option>
                    <option>AU</option>
                    <option>CA</option>
                    <option>IN</option>
                    <option>UK</option>
                </select>
                <span class="text-gray-400 text-sm">Select ABA for local beneficiaries and IBAN for international</span>
            </div>
            <div class="mt-3 flex-grow">
            <label for="bankcode" class="block text-sm font-medium leading-6 text-gray-900">Bank Code</label>
            <input name="bankcode" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
           
        </div>
        <div class="mt-6 max-w-64">
            
            <button type="submit" name="beneficiary" class="rounded-md w-full bg-blue-800 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
        </div>
    
  

  

        </form>                                 
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>