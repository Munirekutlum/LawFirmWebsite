<?php
$id = $_GET['id'];
$lawyer = getLawyer($conn, $id);
?>

<div class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover" style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">
    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">
        <div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">
            <div class="p-4 md:p-12 text-center lg:text-left">
                <div class="block lg:hidden rounded-full shadow-xl mx-auto h-48 w-48 bg-cover bg-center" style="background-image: url('<?php echo $lawyer["image"] ?>')"></div>

                <h1 class="text-3xl font-bold pt-8 lg:pt-0">AVUKAT <?php echo $lawyer["fullname"] ?></h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                    Uzmanlık Alan : <?php echo $lawyer["profession"] ?></p>
                <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                    İletişim : <?php echo $lawyer["mail"] ?></p>
                <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                    Üniversite : <?php echo $lawyer["graduation_school"] ?>
                </p>
                <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                    Deneyim: <?php echo $lawyer["experience"] ?>
                </p>

                <p class="pt-8 text-sm"><?php echo $lawyer["resume"] ?></p>

                <form action="avukatlar" class="pt-12 pb-8">
                    <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                        Avukatlara Dön
                    </button>
                </form>
            </div>

        </div>

        <div class="w-full lg:w-2/5">
            <img src="<?php echo $lawyer["image"] ?>" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">
        </div>
    </div>

</div>