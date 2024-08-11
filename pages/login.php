<?php

if (isset($_SESSION['username'])) :
?>
    <script>
        window.location.href = "anasayfa";
    </script>
<?php
endif;
?>

<div class="bg-white">
    <div class="w-full flex flex-wrap">
        <div class="w-full md:w-1/2 flex flex-col">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Giriş Yap</p>
                <form class="flex flex-col pt-3 md:pt-8" name="login" method="POST" action="api/login.php" onsubmit="return validateForm()">
                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" oninput="clearError('username')">
                        <div id="username-error" class="text-red-500"></div>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" oninput="clearError('password')">
                            <span onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <i id="togglePassword" class="far fa-eye-slash"></i>
                            </span>
                        </div>
                        <div id="password-error" class="text-red-500"></div>
                    </div>

                    <input type="submit" value="Log In" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Don't have an account? <a href="kayit" class="underline font-semibold">Register here.</a></p>
                </div>
            </div>
        </div>

        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-[89vh] hidden md:block" src="./img/terazi.jpg">
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var toggleIcon = document.getElementById('togglePassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        }
    }

    function displayError(inputField, errorMessage) {
        var errorElement = document.getElementById(inputField + '-error');
        errorElement.innerHTML = errorMessage;
    }

    function clearError(inputField) {
        var errorElement = document.getElementById(inputField + '-error');
        errorElement.innerHTML = '';
    }

    function validateForm() {
        var username = document.forms["login"]["username"].value;
        var password = document.forms["login"]["password"].value;

        var isValid = true;

        if (username === "") {
            displayError('username', 'Please enter your username.');
            isValid = false;
        } else {
            clearError('username');
        }

        if (password === "") {
            displayError('password', 'Please enter your password.');
            isValid = false;
        } else if (password.length < 5) {
            displayError('password', 'Password must be at least 5 characters long.');
            isValid = false;
        } else {
            clearError('password');
        }

        return isValid;
    }
</script>