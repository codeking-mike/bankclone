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
                    
                    <h4 class="font-bold text-2xl">My Profile</h4>
                        
                    
                    
                    
                    
                        
                    
                </div>
            </div>
        </section>
    
        <section class="bg-gray-100 pb-32">
            
                <!--accounts-->
                <div class="px-2 py-4 w-full md:py-4 md:w-2/3">
                        
                    <div class="md:px-6 w-full">


                    <form>
  <div class="py-6 px-6">
    

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

      <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3 py-3">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
          <div class="mt-2">
            <input type="text" name="first-name" id="first-name" readonly class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 py-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
          <div class="mt-2">
            <input type="text" name="last-name" id="last-name" readonly class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-4 py-3">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Primary Email</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 py-3">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Primary Phone Number</label>
          <div class="mt-2">
            <input name="email" type="tel" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 py-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
          <div class="mt-2 border">
            <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option selected>United States</option>
              <option>Canada</option>
              <option>Mexico</option>
            </select>
          </div>
        </div>

        <div class="col-span-full py-3">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
          <div class="mt-2">
            <input type="text" name="street-address" id="street-address" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1 py-3">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
          <div class="mt-2">
            <input type="text" name="city" id="city" autocomplete="address-level2" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2 py-3">
          <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
          <div class="mt-2">
            <input type="text" name="region" id="region" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2 py-3">
          <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
          <div class="mt-2">
            <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    </div>
    
  

  
  </div>
</form>    
                                               
                </div>
            </div>
        
            <div class="px-2 py-4 w-full md:py-4 md:w-2/3">
                        
                        <div class="md:px-6 w-full">
    
    
                        <form>
      <div class="py-6 px-6">
        
    
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Security Information</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Change password and security questions</p>
    
          <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3 py-3">
              <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
              <div class="mt-2">
                <input type="password" name="oldpass" id="oldpass" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
    
            <div class="sm:col-span-3 py-3">
              <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
              <div class="mt-2">
                <input type="password" name="newpass" id="newpass" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
    
            <div class="sm:col-span-4 py-3">
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
              <div class="mt-2">
                <input id="confirmpass" name="confirmpass" type="password" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
    
            
          </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
        
      
    
      
      </div>
    </form>    
                                                   
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>