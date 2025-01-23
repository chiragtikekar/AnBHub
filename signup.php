<?php
    $showMessage = "";
    $showAlert = "";
    $showError = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include ('database_connect.php');

        $FirstName = $_POST["FirstName"];
        $LastName = $_POST["LastName"];
        $Username = $_POST["Username"];
        $Email = (string) $_POST["EmailAddress"];
        $Password = $_POST["Password"];
        $Confirm_Password = $_POST["Confirm_Password"];
        $Mobile = $_POST["MobileNumber"];

        $sql = "SELECT Username FROM signup_page WHERE Username = '$Username'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) != 0)
        {
            // echo "<script>alert('User Already exists')</script>";
            $showAlert = "Sign Up unsuccessful";
            $showError = "User Already exists";
            // echo "<script>location.href = 'login.php'</script>";
            $exists = true;
        }
        else
        {
            $exists = false;
        }

        if (($Password == $Confirm_Password) && ($exists == false))
        {
            $sql = "INSERT INTO `signup_page` (`First Name`, `Last Name`, `Username`, `Email Address`, `Password`, `Mobile`) VALUES ('$FirstName', '$LastName', '$Username', '$Email', '$Password', '$Mobile');";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $showAlert = "Sign Up Successful";
                $showMessage = "Thank you for signing up to our website";
                // echo "<script>alert('Sign Up Successful!')</script>";
                // echo "<script>location.href = 'login.php'</script>";
            }
            else
            {
                // echo "<script>alert('Sign Up Unsuccessful')</script>";
                $showAlert = "Sign Up unsuccessful";
                $showError = "Unknown Error";
            }
        }
        else
        {
            if ($Password != $Confirm_Password)
            {
                // echo "<script>alert('Passwords don't match')</script>";
                $showAlert = "Sign Up unsuccessful";
                $showError = "Passwords don't match";
            }
        }
        // echo $FirstName . $LastName . $Username . $Email . $Password . $Confirm_Password . $Mobile;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- <link rel="stylesheet" href="signup_demo.css"> -->
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="style_signup.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <script>
        var checkPasswords = function () 
        {
            if (document.getElementById('Password').value != "" && document.getElementById('Confirm_Password').value != "")
            {
                if (document.getElementById('Password').value == document.getElementById('Confirm_Password').value) 
                {
                    document.getElementById('message').style.color = '';
                    document.getElementById('Confirm_Password_text').style.color = '';
                    document.getElementById('Password_text').style.color = '';
                    document.getElementById('message').innerHTML = '';
                    document.getElementById('Password').style.borderColor = '';    
                    document.getElementById('Confirm_Password').style.borderColor = '';
                    document.getElementById('Password').style.color = '';
                    document.getElementById('Confirm_Password').style.color = '';
                } 
                else 
                {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('Confirm_Password_text').style.color = 'red';
                    document.getElementById('Password_text').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Passwords don\'t match';
                    document.getElementById('Password').style.borderColor = 'red';
                    document.getElementById('Confirm_Password').style.borderColor = 'red';
                    document.getElementById('Password').style.color = 'red';
                    document.getElementById('Confirm_Password').style.color = 'red';
                }
                // alert("Passwords don't match");
            }
            else
            {
                    document.getElementById('message').style.color = '';
                    document.getElementById('message').innerHTML = '';
                    document.getElementById('Confirm_Password_text').style.color = '';
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
                        document.getElementById('Password_text').style.color = 'red';
                        document.getElementById('P_message').style.color = 'red';
                        document.getElementById('P_message').innerHTML = 'Your password must contain atleast 8 characters';
                        document.getElementById('Password').style.borderColor = 'red';
                        document.getElementById('Password').style.color = 'red';
                    }
                    else if (p.search(/[a-z]/i) < 0) 
                    {
                        document.getElementById('Password_text').style.color = 'red';
                        document.getElementById('P_message').style.color = 'red';
                        document.getElementById('P_message').innerHTML = 'Your password must contain at least one alphabetic character.';
                        document.getElementById('Password').style.borderColor = 'red';
                        document.getElementById('Password').style.color = 'red';
                    }
                    else if (p.search(/[0-9]/) < 0) 
                    {
                        document.getElementById('Password_text').style.color = 'red';
                        document.getElementById('P_message').style.color = 'red';
                        document.getElementById('P_message').innerHTML = 'Your password must contain at least one numeric character.';
                        document.getElementById('Password').style.borderColor = 'red';
                        document.getElementById('Password').style.color = 'red';
                    }
                    else if (errors.length > 0)
                    {
                        alert(errors.join("\n"));
                    }
                    else    
                    {
                        document.getElementById('Password_text').style.color = '';
                        document.getElementById('P_message').style.color = '';
                        document.getElementById('P_message').innerHTML = '';
                        document.getElementById('Password').style.borderColor = '';
                        document.getElementById('Password').style.color = '';
                    }
                }
                else
                {
                    document.getElementById('Password_text').style.color = '';
                    document.getElementById('P_message').style.color = '';
                    document.getElementById('P_message').innerHTML = '';
                    document.getElementById('Password').style.borderColor = '';
                    document.getElementById('Password').style.color = '';
                }
            }
    </script>

    <?php
        if ($showAlert != "" && $showMessage != "")
        {
            echo "
                <div class='notification'>
                    <div class='content flex justify-between bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3'>
                        <div class='flex'>
                            <div class='py-1'><svg class='fill-current h-6 w-6 text-teal-500 mr-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z'/>
                                </svg>
                            </div>
                            <div>
                                <p class='font-bold'>" . $showAlert . "</p>
                                <p class='text-sm'>" . $showMessage . "</p>
                            </div>
                        </div>
                        <div class='button'>
                            <button class='button-green' role='button'><a href='login.php'>Next</a></button>
                        </div>
                </div>
            </div>";
        }
        if ($showAlert != "" && $showError != "")
        {
            echo "
            <div class='notification'>
                <div class='content flex justify-between bg-red-300 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md' role='alert'>
                    <div class='flex'>
                        <div class='py-1'><svg class='fill-current h-6 w-6 text-red-500 mr-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z'/></svg></div>
                        <div>
                        <p class='font-bold'>" . $showAlert . "</p>
                        <p class='text-sm'>" . $showError . "</p>
                        </div>
                    </div>
                    <div class='button'>
                        <button class='button-red' role='button'><a href='signup.php'>Next</a></button>
                    </div>
                </div>
            </div>";
        }
    ?>

    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="./images/signup_image.jpg"
                        class="w-full" alt="Sample image" />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12r mb-12 md:mb-0 border-gray-300 border-2 rounded-lg">
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

                        <div class="form elements">
                            <div class="mb-6 inputBox flex flex-row space-x-5">
                                <div class="inputBoxSmall">
                                    <input name="FirstName" type="text"
                                        class="form-control px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none inputSmall"
                                        id="First Name" required/>
                                    <span>First Name</span>
                                </div>
                                <div class="inputBoxSmall">
                                    <input name="LastName" type="text"
                                        class="form-control px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none inputSmall"
                                        id="Last Name" required>
                                    <span>Last Name</span>
                                </div>
                            </div>
                            <div class="mb-6 inputBox">
                                <input name="Username" type="text"
                                    class="form-control w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                    id="Username" required/>
                                <span>Username</span>
                            </div>
                            <!-- Email input -->
                            <div class="mb-6 inputBox">
                                <input name="EmailAddress" type="mail"
                                    class="form-control w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                    id="EmailAddress" required />
                                <span>Email Address</span>
                            </div>
    
                            <!-- Password input -->
                            <div class="inputBox flex flex-row space-x-5">
                                <div class="inputBoxSmall">
                                    <input name="Password" type="password"
                                    class="form-control px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none inputSmall"
                                    id="Password" onfocusout="checkPasswords(); validatePassword()" required/>
                                    <span id="Password_text">Create Password</span>
                                </div>
                                
                                <div class="inputBoxSmall">
                                    <input name="Confirm_Password" type="password"
                                    class="form-control px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none inputSmall" 
                                    id="Confirm_Password" onfocusout="checkPasswords()" required>
                                    <span id="Confirm_Password_text">Confirm Password</span>
                                </div>
                            </div>  
                            <div class="password_messages flex flex-col">
                                <span class="text-sm" id='P_message'></span>    
                                <span class="text-sm" id='message'></span>
                            </div>
                            <div class="mt-6 mb-6 inputBox">
                                <input name="MobileNumber" type="tel"
                                    class="form-control w-95per px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-600 focus:outline-none"
                                    id="MobileNumber" required />
                                <span>Mobile Number</span>
                            </div>
                        </div>

                        <div class="text-center lg:text-left">
                            <!-- <a href="nextSign.html"> -->
                            <input type="submit"
                                class="inline-block px-7 py-3 bg-indigo-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out" value="Register" />
                                <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                    Already have an account ?
                                    <a href="login.php"
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