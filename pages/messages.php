<?php
$messages = getAllMessages($conn);
?>

<div class="container mt-12 mb-6 relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="text-center font-bold text-3xl mb-6">KULLANICI MESAJLARI</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Message
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message) : ?>
                <tr class="border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                        <?php echo $message['name'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $message['email'] ?>
                    </td>
                    <td class="px-6 py-4 bg-gray-50">
                        <?php echo $message['message'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo date('Y-m-d H:i:s', strtotime($message['created_at'])) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>