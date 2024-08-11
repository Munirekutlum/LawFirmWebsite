<?php

$url = $_SERVER['REQUEST_URI'];
$urlParts = parse_url($url);
if (isset($urlParts["query"])) {
  $query = $urlParts["query"];
  $queryParts = explode("=", $query);
  $service_id = $queryParts[1];
}
?>

<?php if (isset($_SESSION["username"])) : ?>
  <div class="mt-10 w-full lg:w-2/3">
    <p class="text-3xl text-center font-semibold mb-4">Hizmet Memnuniyeti Hakkında Yorumlarınız Buraya Yazabilirsiniz</p>
    <form action="api/createComment.php" method="POST" class="bg-gray-100 rounded-lg p-4 mb-4">
      <h3 class="text-lg font-semibold mb-4">Yorum Yaz</h3>
      <div class="mb-4">
        <textarea name="content" id="content" class="block w-full border-gray-300 rounded-md shadow-sm p-2" rows="4" placeholder="Yorumunuzu buraya yazın" required></textarea>
      </div>
      <div class="text-right">
        <input type="submit" value="Gönder" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:bg-red-800 focus:outline-none" />
      </div>
      <input type="number" name="service_id" value="<?php echo $service_id ?>" class="hidden">
    </form>
  </div>
<?php endif; ?>