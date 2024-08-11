<?php
$id = $_GET['id'];
$service = getService($conn, $id);
?>

<link rel="stylesheet" href="./css/services.css">


<div class="container services flex flex-col mt-4 space-y-4 justify-center items-center">
    <img class="object-contain w-5/6 sm:h-64 mx-auto" src="<?php echo $service["image"] ?>" alt="">
    <div class="text-5xl items-center"><?php echo $service["title"] ?></div>
    <div class="items-center px-8 py-2 border rounded-md shadow-md "><?php echo htmlspecialchars_decode($service["description"]) ?></div>
    <?php require_once "./components/createComment.php" ?>
    <?php require_once "./components/getComment.php" ?>
</div>