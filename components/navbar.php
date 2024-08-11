<?php session_start();
$current_page = basename($_SERVER['REQUEST_URI']);
?>


<nav class="sticky py-3 z-50 top-0 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="anasayfa" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="./img/logo.png" class="h-8 text-green-500" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Yeşildere Hukuk</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="anasayfa" class="block py-2 px-3  <?php echo ($current_page === 'anasayfa' ? 'text-green-700' : 'text-gray-900'); ?> rounded md:bg-transparent md:p-0 " aria-current="page">Anasayfa</a>
                </li>


                <!-- HİZMETLER-->
                <li>
                    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] != "member") : ?>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent <?php echo ($current_page === 'hizmetler' ? 'text-green-700' : 'text-gray-900'); ?>">Hizmetler <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="hizmetler" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hizmet Görüntüle</a>
                                </li>
                                <li>
                                    <a href="hizmetekle" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hizmet Ekle</a>
                                </li>
                            </ul>

                        </div>
                    <?php else : ?>
                        <a href="hizmetler" class="block py-2 px-3 <?php echo ($current_page === 'hizmetler' ? 'text-green-700' : 'text-gray-900'); ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent">Hizmetler</a>
                    <?php endif; ?>
                </li>


                <!-- AVUKATLAR-->
                <li>
                    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] != "member") : ?>
                        <button id="dropdownNavbar" data-dropdown-toggle="dropdownNavbarAvukat" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent <?php echo ($current_page === 'avukatlar' ? 'text-green-700' : 'text-gray-900'); ?>">Avukatlar <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarAvukat" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="avukatlar" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Avukat Görüntüle</a>
                                </li>
                                <li>
                                    <a href="avukatekle" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Avukat Ekle</a>
                                </li>
                            </ul>

                        </div>
                    <?php else : ?>
                        <a href="avukatlar" class="block py-2 px-3 <?php echo ($current_page === 'avukatlar' ? 'text-green-700' : 'text-gray-900'); ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent">Avukatlar</a>
                    <?php endif; ?>
                </li>


                <!-- İLETİŞİM -->
                <li>
                    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] != "member") : ?>
                        <button id="dropdownNavbar" data-dropdown-toggle="dropdownNavbarIletisim" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent <?php echo ($current_page === 'iletisim' ? 'text-green-700' : 'text-gray-900'); ?>">İletişim <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarIletisim" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="iletisim" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">İletişim Formu</a>
                                </li>
                                <li>
                                    <a href="mesajlar" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yazılan Mesajlar </a>
                                </li>
                            </ul>

                        </div>
                    <?php else : ?>
                        <a href="iletisim" class="block py-2 px-3 <?php echo ($current_page === 'iletisim' ? 'text-green-700' : 'text-gray-900'); ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent">İletişim</a>
                    <?php endif; ?>
                </li>

                <!-- Users -->
                <?php if (isset($_SESSION["role"]) && ($_SESSION["role"] == "admin")) : ?>
                    <li>
                        <a href="kullanicilar" class="block py-2 px-3 <?php echo ($current_page === 'kullanicilar' ? 'text-green-700' : 'text-gray-900'); ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 md:w-auto md:dark:hover:bg-transparent">Kullanıcılar</a>
                    </li>
                <?php endif; ?>
                <!-- Giriş Çıkış -->
                <?php if (isset($_SESSION["username"])) : ?>
                    <li>
                        <form method="POST" action="api/logout.php">
                            <button type="submit" href="cikis" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Çıkış</button>
                        </form>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="giris" class="block py-2 px-3 <?php echo ($current_page === 'giris' ? 'text-green-700' : 'text-gray-900'); ?> text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0  md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Giriş</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>