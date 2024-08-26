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
                    <h4 class="font-bold text-blue-700 text-left p-2 text-xl"><i class="ri-id-card-fill"></i>&nbsp;&nbsp;International Wire Transfer</h4>
                    <p>Create an International wire transfer to recipients outside the United States</p>
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
    <option>select country</option>
    
    
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AO">Angola</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    
    <option value="BS">Bahamas</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    
    <option value="BA">Bosnia and Herzegovina</option>
    <option value="BW">Botswana</option>
    
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
   
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="CV">Cape Verde</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CN">China</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, Democratic Republic of the Congo</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="CI">Cote D'Ivoire</option>
    <option value="HR">Croatia</option>
    <option value="CU">Cuba</option>
    <option value="CW">Curacao</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Ethiopia</option>
    <option value="FK">Falkland Islands (Malvinas)</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Georgia</option>
    <option value="DE">Germany</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard Island and Mcdonald Islands</option>
    <option value="VA">Holy See (Vatican City State)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
   
    <option value="IE">Ireland</option>
   
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JM">Jamaica</option>
    <option value="JP">Japan</option>
    
    <option value="JO">Jordan</option>
   
    <option value="KE">Kenya</option>
   
    <option value="KP">Korea, Democratic People's Republic of</option>
    <option value="KR">Korea, Republic of</option>
    <option value="XK">Kosovo</option>
    <option value="KW">Kuwait</option>
    
    
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
   
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    
    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    
    <option value="MX">Mexico</option>
   
    <option value="MD">Moldova, Republic of</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Montenegro</option>
   
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Netherlands</option>
    <option value="AN">Netherlands Antilles</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    
    <option value="NO">Norway</option>
    
    <option value="PA">Panama</option>
    <option value="PG">Papua New Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
   
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
   
    <option value="RO">Romania</option>
    
    <option value="RW">Rwanda</option>
    
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="CS">Serbia and Montenegro</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    
    <option value="SK">Slovakia</option>
    <option value="SI">Slovenia</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    
    <option value="ES">Spain</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    
    <option value="SZ">Swaziland</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
   
    <option value="TW">Taiwan, Province of China</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania, United Republic of</option>
    <option value="TH">Thailand</option>
    
    <option value="TG">Togo</option>
   
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad and Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey</option>
    <option value="TM">Turkmenistan</option>
    
    
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="GB">United Kingdom</option>
    <option value="US">United States</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
   
    <option value="VE">Venezuela</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Virgin Islands, British</option>
    <option value="VI">Virgin Islands, U.s.</option>
    
    
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>

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
            <label for="accounttype" class="block text-sm font-medium leading-6 w-full">Account Type *</label>
            <select id="country" name="accounttype" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>IBAN</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="mt-2 md:w-auto w-full">
            <label for="accno" class="block text-sm font-medium leading-6 w-full">Account Number *</label>
            <input name="accno" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="codetype" class="block text-sm font-medium leading-6 text-gray-900">Bank Code Type *</label>
            <select id="codetype" name="codetype" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>SWIFT</option>
                    <option>AU</option>
                    <option>CA</option>
                    <option>IN</option>
                    <option>UK</option>
                </select>
            </div>
            <div class="mt-3 md:w-auto w-full">
            <label for="bankcode" class="block text-sm font-medium leading-6 text-gray-900">Bank Code</label>
            <input name="bankcode" type="text" class="border block w-full rounded-md py-1.5 text-gray-900 shadow-sm">
          
            </div>
           
        </div>

        <h4 class="text-left py-3 mt-5 font-bold text-blue-600">Date and Amount <span class="text-red-400">*</span></h4>
        <div class="flex flex-col md:flex-row gap-4 md:w-2/3 mt-5">
        <div class="py-3">
          <label for="senddate" class="block text-sm font-medium leading-6 text-gray-900">Value Date *</label>
          <div class="mt-2">
            <input name="senddate" type="date" class="border block w-full rounded-md py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="py-3">
          <label for="senddate" class="block text-sm font-medium leading-6 text-gray-900">Enter Amount In</label>
          <div class="mt-2">
          <select id="currency" name="currency" class="block w-full rounded-md border-0 py-2 P2-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>USD</option>
                    <option>GBP</option>
                    <option>CAD</option>
                    <option>INR</option>
                    <option>AUD</option>
                    <option>EUR</option>
                </select>
        </div>
        </div>
        <div class="mt-2 md:w-auto w-full py-3">
            <label for="amount" class="block text-sm font-medium leading-6 w-full">Credit Amount *</label>
            <input name="amount" type="text" class="border block w-full rounded-md py-2 px-2 text-gray-900 shadow-sm">
            </div>
            
           
        </div>
        

        
      </div>
    </div>
    <div class="flex flex-row mt-3 gap-4 w-1/3">
    
    <button type="submit" name="save" class="rounded-md w-full bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save of later</button>
    <button type="submit" name="submit" class="rounded-md w-full bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    
     </div>
    
  

  
  </div>
                                                   
                    </div>
                </div>
    

           
        </section>
        
        <!--Footer-->

        <?php include_once('footer.php'); ?>