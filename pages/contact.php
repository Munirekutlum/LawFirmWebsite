<div class="text-center py-12 px-6">
    <h1 class="font-display font-bold text-5xl mb-6">Bizimle İletişime Geçin</h1>
</div>

<div class="container px-6 mb-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-4xl mx-auto">
        <div class="flex flex-col mt-10 items-center text-xl">
            <div class="flex space-x-4 items-center my-2">
                <i class="fa-solid fa-phone"></i>
                <span>+90543 123 45 67</span>
            </div>
            <div class="flex space-x-4 items-center my-2">
                <i class="fa-regular fa-envelope"></i>
                <span>munirekutlum@gmail.com</span>
            </div>
            <div class="flex space-x-4 items-center my-2">
                <i class="fa-solid fa-globe"></i>
                <span>Türkiye</span>
            </div>
            <div class="flex space-x-4 items-center my-2">
                <i class="fa-solid fa-road"></i>
                <span>Selçuklu, Konya</span>
            </div>
        </div>

        <div>
            <form method="POST" action="api/createContact.php">
                <div>
                    <label class="block text-base text-gray-600">Name</label>
                    <input name="name" type="text" placeholder="Name" required class="mt-2 w-full border-none text-sm p-4 bg-gray-100 text-gray-700" />
                </div>
                <div class="mt-6">
                    <label class="block text-base text-gray-600">Email address</label>
                    <input name="email" type="email" placeholder="your@email.com" required class="mt-2 w-full border-none text-sm p-4 bg-gray-100 text-gray-700" />
                </div>
                <div class="mt-6">
                    <label class="block text-base text-gray-600">Message</label>
                    <textarea name="message" placeholder="Your message" required class="mt-2 w-full border-none text-sm p-4 bg-gray-100 text-gray-700"></textarea>
                </div>
                <button class="inline-block bg-yellow-800 text-white uppercase text-sm tracking-widest font-heading px-8 py-4 mt-6">
                    Send message
                </button>
            </form>
        </div>
    </div>
</div>