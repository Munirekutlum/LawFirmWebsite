<?php if (isset($_SESSION["role"]) && $_SESSION["role"] != "member") : ?>
    <div class="bg-[#F3F4F6] flex items-center justify-center p-3">
        <form enctype="multipart/form-data" class="w-1/2 border p-5 px-16 bg-gray-50 shadow-md rounded-lg" action="api/createService.php" method="POST">
            <h1 class="font-display font-bold text-4xl mb-6 text-center">Hizmet Ekle</h1>
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col space-y-2">
                    <label for="title">Hizmet Adı</label>
                    <input type="text" name="title" id="title" required class="border border-gray-400 rounded-md p-2">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="description">Hizmet Açıklama</label>
                    <!-- CKEditor'ü içeren textarea -->
                    <textarea required name="description" id="description" cols="30" rows="10" class="ckeditor border border-gray-400 rounded-md p-2"></textarea>
                </div>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="">Upload a file</span>
                                <input id="file-upload" name="file" type="file" required class="sr-only">
                            </label>
                            <p class="pl-1 text-black">or drag and drop</p>
                        </div>
                        <p class="text-xs text-black">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                </div>
                <div class="flex flex-col space-y-2">
                    <button type="submit" class="bg-green-300 hover:bg-green-500 text-white px-4 py-2 rounded">Gönder</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
<?php else : ?>
    <div class="container flex justify-center items-center h-[80vh]">
        <div class="text-center p-32 border rounded-md shadow-lg">
            <h1 class="text-3xl lg:text-4xl mb-6 font-display text-black leading-tight">BU SAYFAYA GİRİŞ YETKİNİZ YOKTUR</h1>
            <p class="text-lg max-w-lg mx-auto">Girebilmek için lütfen yetkili hesapla giriş yapınız.</p>
        </div>
    </div>
<?php endif; ?>