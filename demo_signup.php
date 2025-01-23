<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="demo_signup.css">
</head>
<body>
    <script>
        var check = function () 
        {
            if (document.getElementById('Password').value != "" && document.getElementById('Confirm_Password').value != "")
            {
                if (document.getElementById('Password').value == document.getElementById('Confirm_Password').value) 
                {
                    document.getElementById('message').style.color = '';
                    document.getElementById('message').innerHTML = '';
                    document.getElementById('Password').style.borderColor = '';    
                    document.getElementById('Confirm_Password').style.borderColor = '';
                } 
                else 
                {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'not matching';
                    document.getElementById('Password').style.borderColor = 'red';
                    document.getElementById('Confirm_Password').style.borderColor = 'red';
                }
                // alert("Passwords don't match");
            }
            else
            {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = '';
                    document.getElementById('Password').style.borderColor = '';
                    document.getElementById('Confirm_Password').style.borderColor = '';
            }
        }


        var validatePassword = function () 
            {
                var p = document.getElementById('Password').value,
                    errors = [];
                
                if (!(p.length < 8 && p.search(/[a-z]/i) < 0 && p.search(/[0-9]/) < 0))
                {
                    if (p.length < 8) 
                    {
                        document.getElementById('P_message').style.color = 'red';
                        document.getElementById('P_message').innerHTML = 'Your password must contain atleast 8 characters';
                        document.getElementById('Password').style.borderColor = 'red';
                    }
                    else if (p.search(/[a-z]/i) < 0) 
                    {
                        document.getElementById('P_message').style.color = 'red';
                        document.getElementById('P_message').innerHTML = 'Your password must contain at least one alphabetic character.';
                        document.getElementById('Password').style.borderColor = 'red';
                    }
                    else if (p.search(/[0-9]/) < 0) 
                    {
                        document.getElementById('P_message').style.color = 'red';
                        document.getElementById('P_message').innerHTML = 'Your password must contain at least one numeric character.';
                        document.getElementById('Password').style.borderColor = 'red';
                    }
                    else if (errors.length > 0)
                    {
                        alert(errors.join("\n"));
                    }
                    else    
                    {
                        document.getElementById('P_message').style.color = '';
                        document.getElementById('P_message').innerHTML = '';
                        document.getElementById('Password').style.borderColor = '';
                    }
                }
                else
                {
                    document.getElementById('P_message').style.color = '';
                    document.getElementById('P_message').innerHTML = '';
                    document.getElementById('Password').style.borderColor = '';
                }
            }

        var hide2 = function ()
            {
                document.getElementById('2').style.visibility = 'hidden';
                document.getElementById('1').style.visibility = 'visible';
            }

        var hide1 = function ()
            {
                document.getElementById('1').style.visibility = 'hidden';
                document.getElementById('2').style.visibility = 'visible';
            }
    </script>

    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="signup_image.jpg"
                        class="w-full" alt="Sample image" />
                </div>
                <div class="xl:ml-20 xl:w-4/12 lg:w-4/12 md:w-6/12 mb-12 md:mb-0 border-gray-300 border-2 rounded-lg">
                    <form action="" method="POST" class="px-16 py-6">
                        <div class="flex flex-row items-center justify-center lg:justify-start">
                            <p class="text-lg mb-0 mr-4">Sign Up with</p>
                            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block p-3 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                                <!-- Facebook -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4">
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                </svg>
                            </button>

                            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block p-3 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                                <!-- Twitter -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">

                                    <path fill="currentColor"
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                </svg>
                            </button>

                            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block p-3 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                                <!-- Linkedin -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4">
                                    <path fill="currentColor"
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                                </svg>
                            </button>
                        </div>

                        <div
                            class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                            <p class="text-center font-semibold mx-4 mb-0">Or</p>
                        </div>

                        <div class="ImageSlider">
                            <span id="slide-1"></span>
                            <span id="slide-2"></span>
                            <div class="Slider" style="width: 48rem; height:21rem;">
                                <div id="1" class="SignUp_1 slide" style="width: 24rem;">    
                                    <div class="mb-6">
                                        <input name="FName" type="text"
                                            class="form-controXl block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput2" placeholder="Full Name" required/>
                                    </div>
                                    <div class="mb-6">
                                        <input name="UName" type="text"
                                            class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput2" placeholder="Username" required/>
                                    </div>
                                    <!-- Email input -->
                                    <div class="mb-6">
                                        <input name="Email" type="email"
                                            class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput2" placeholder="Email address" required/>
                                    </div>
            
                                    <!-- Password input -->
                                    <span class="text-sm" id='P_message'></span>
                                    <div class="mb-6">
                                        <input name="Password" type="password"
                                                class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                                id="Password" placeholder="Create Password" onfocusout="check(); validatePassword()" required/>
                                    </div>  
                                        
                                    <div>
                                        <input name="Confirm_Password" type="password"
                                                class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                                id="Confirm_Password" placeholder="Confirm Password" onfocusout="check()" required>
                                    </div>
                                    <span class="text-sm" id='message'></span>
                                </div>
        
                                <div id="2" class="SignUp_2 slide" style="width: 24rem; margin-left: -1rem;">
                                    <div class="mb-6">
                                        <input type="tel"
                                            class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput4" placeholder="Mobile Number" required />
                                    </div>
            
                                    <div class="mb-6">
                                        <!-- <input type="text"
                                            class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput2" placeholder="Address(Optional)" /> -->
                                        <textarea name="Address" style="height: 7.2rem;" class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none" cols="45" rows="3" placeholder="Address"></textarea>
                                    </div>
                                    <div class="mb-6">
                                        <input type="text"
                                            class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput2" placeholder="City(optional)" />
                                    </div>
                                    <!-- Email input -->
                                    <div class="mb-6">
                                        <input type="email"
                                            class="form-control block w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                            id="exampleFormControlInput2" placeholder="State(optional)" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="#slide-1" onclick="hide2()"> </a>
                            <a href="#slide-2" onclick="hide1()"> </a>
                            <!-- <a href="#slide-1"> </a>
                            <a href="#slide-2"> </a> -->
                        </div>

                        <div class="flex justify-between items-center mb-6 mt-4" >
                            <div class="form-group form-check">
                                <input type="checkbox"
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-indigo-600 checked:border-indigo-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    id="exampleCheck2" />
                                <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember
                                    me</label>
                            </div>
                        </div>

                        <div class="text-center lg:text-left">
                            <!-- <a href="nextSign.html"> -->
                            <input type="submit"
                                class="inline-block px-7 py-3 bg-indigo-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out" value="Register" />
                                <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                    Already have an account ?
                                    <a href="login.html"
                                        class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Login</a>
                                </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body> 
</html> 