<?php
$lawyers = getAllLawyers($conn);
$imgUrl = "./img/no-image.webp";

?>

<div class="container mt-4 py-6">
    <div class="text-center font-bold text-3xl mb-6">AVUKATLARIMIZ</div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <?php foreach ($lawyers as $lawyer) : ?>
            <div class="relative">
                <a href="avukatlar?id=<?php echo $lawyer["id"] ?>" class="flex flex-col justify-around items-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover rounded-t-lg h-60 md:w-60" src="<?php echo $lawyer["image"] ?>" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal text-center">
                        <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Avukat <?php echo $lawyer["fullname"] ?> </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Uzmanlık Alanı : <?php echo $lawyer["profession"] ?></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Deneyimi : <?php echo $lawyer["experience"] ?> </p>
                    </div>
                </a>
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] != "member") : ?>
                    <button class="absolute top-0 right-0 p-2 cursor-pointer" onclick="confirmDelete(<?php echo $lawyer['id']; ?>)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function confirmDelete(lawyerId) {
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Avukatı silmek istediğinize emin misiniz?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'api/deleteLawyer.php?id=' + lawyerId;
            }
        });
    }
</script>