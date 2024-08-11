<?php

if (isset($_SESSION['username'])) :
?>
    <script>
        window.location.href = "anasayfa";
    </script>
<?php
endif;
?>

<div class="bg-white h-[86vh]">
    <div class="w-full flex flex-wrap">
        <div class="w-full md:w-1/2 flex flex-col">
            <div class="p-10">
                <h1 class="text-3xl font-bold mb-5 text-center mt-10">Üye Ol</h1>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-14" name="register" method="POST" action="api/register.php">
                    <div>
                        <label for="fullName" class="block mb-2">Full Name:</label>
                        <input type="text" name="fullName" id="fullName" class="w-full border border-gray-300 rounded py-2 px-3 mb-3" placeholder="Enter your full name">

                        <label for="email" class="block mb-2">Email:</label>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded py-2 px-3 mb-3" placeholder="Enter your email">

                        <label for="password" class="block mb-2">Password:</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded py-2 px-3 mb-3" placeholder="Enter your password">
                            <span onclick="togglePasswordVisibility('password', 'togglePassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <i id="togglePassword" class="far fa-eye-slash mb-2"></i>
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="username" class="block mb-2">Username:</label>
                        <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded py-2 px-3 mb-3" placeholder="Enter your username">
                        <label for="phoneNumber" class="block mb-2">Phone Number:</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="w-full border border-gray-300 rounded py-2 px-3 mb-3" placeholder="Enter your phone number">

                        <label for="confirmPassword" class="block mb-2">Confirm Password:</label>
                        <div class="relative">
                            <input type="password" id="confirmPassword" name="confirmPassword" class="w-full border border-gray-300 rounded py-2 px-3 mb-3" placeholder="Confirm your password">
                            <span onclick="togglePasswordVisibility('confirmPassword', 'toggleConfirmPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <i id="toggleConfirmPassword" class="far fa-eye-slash mb-2"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-5 w-full">Submit</button>
                </form>
            </div>
        </div>

        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-[86vh] hidden md:block" src="./img/terazi.jpg">
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, toggleIconId) {
        var passwordInput = document.getElementById(inputId);
        var toggleIcon = document.getElementById(toggleIconId);

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
</script>