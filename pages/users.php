<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = getAllUsers($conn);
    foreach ($users as $user) {
        $userId = $user['id'];
        $newRole = $_POST["role"][$userId];
        updateUserRole($conn, $userId, $newRole);
    }
    echo '<script>
    Swal.fire({
        title: "Başarılı!",
        text: "Kullanıcı rolleri başarıyla güncellendi.",
        icon: "success",
        confirmButtonText: "Tamam"
    });
    </script>';
}
?>

<?php

$users = getAllUsers($conn);
?>

<?php if ($_SESSION['role'] == 'admin') : ?>
    <form method="POST" action="kullanicilar" class="container mt-4 py-6 mb-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center font-bold text-3xl mb-6">KULLANICILAR</div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fullname
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50">
                        Role
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr class="border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            <?php echo $user['username'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $user['fullname'] ?>
                        </td>
                        <td class="px-6 py-4 bg-gray-50">
                            <?php echo $user['email'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $user['phone_number'] ?>
                        </td>
                        <td class="px-6 py-4 bg-gray-50">
                            <!-- Role Select Box for each user -->
                            <select name="role[<?php echo $user['id']; ?>]" class="block w-full mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                                <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="member" <?php echo ($user['role'] === 'member') ? 'selected' : ''; ?>>Member</option>
                                <option value="lawyer" <?php echo ($user['role'] === 'lawyer') ? 'selected' : ''; ?>>Lawyer</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input value="Kaydet" type="submit" class="w-full bg-black text-white p-1 text-xl" />
    </form>
<?php else : ?>
    <div class="container flex justify-center items-center h-[80vh]">
        <div class=" text-center p-32 border rounded-md shadow-lg">
            <h1 class="text-3xl lg:text-5xl mb-6 font-display text-black leading-tight">BU SAYFAYA GİRİŞ YETKİNİZ YOKTUR</h1>
            <p class="text-lg max-w-lg mx-auto">Girebilmek için lütfen yetkili hesapla giriş yapınız.</p>
        </div>
    </div>
<?php endif; ?>