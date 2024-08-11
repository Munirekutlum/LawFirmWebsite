<?php

$url = $_SERVER['REQUEST_URI'];
$urlParts = parse_url($url);

if (isset($urlParts["query"])) {
    $query = $urlParts["query"];
    $queryParts = explode("=", $query);
    $service_id = $queryParts[1];
}

$comments = getAllComments($conn, $service_id);

?>

<div class="container w-full lg:w-2/3">
    <p class="text-3xl font-semibold mb-4 mt-10">Yorumlar</p>
    <?php foreach ($comments as $comment) : ?>
        <div class="bg-gray-100 rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4 mb-4">
                <img src="./img/no-image.webp" class="h-10 w-10 rounded-full overflow-hidden" />
                <div>
                    <?php
                    $userId = $comment["user_id"];
                    $userQuery = "SELECT fullname FROM user WHERE id = :userId";
                    $userStatement = $conn->prepare($userQuery);
                    $userStatement->bindParam(':userId', $userId, PDO::PARAM_INT);

                    if ($userStatement->execute()) {
                        $user = $userStatement->fetch(PDO::FETCH_ASSOC);
                        if ($user) {
                            echo '<div class="font-semibold">' . $user["fullname"] . '</div>';
                        } else {
                            echo '<div class="font-semibold">Kullanıcı Bulunamadı</div>';
                        }
                    } else {
                        echo '<div class="font-semibold">Sorgu Hatası: ' . $userStatement->errorInfo()[2] . '</div>';
                    }
                    ?>
                    <div class="text-gray-500 text-sm"><?php echo $comment["created_at"] ?></div>
                </div>
            </div>
            <div class="text-gray-700"><?php echo $comment["content"] ?> </div>
        </div>
    <?php endforeach; ?>
</div>