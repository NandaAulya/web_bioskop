<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'Arthur The king' ?>
    <?php include 'src/component/utils/meta.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="background-color: #060614">

    <header>
        <?php include 'src/component/utils/nav.php' ?>
    </header>
    <div class="flex flex-col items-center pt-10 px-20 ">
        <img class="w-full max-w-screen-lg h-[380px] mb-8 object-cover rounded-md"
            src="https://cdn0-production-images-kly.akamaized.net/uREWQuiEHX7_jutjSM5Z4oFJJUs=/0x1466:1661x2402/1200x675/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4779503/original/046313600_1710993036-Arthur_the_King_0.jpg">
        <div class="w-full max-w-screen-lg">
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 capitalize" style="color: #9398e0;">Arthur the King</h1>
            <p class="text-2xl tracking-widest mb-4" style="color: #c63a8d;">Adventure</p>
            <p class="text-lg sm:text-xl leading-relaxed mb-8" style="color: #e4e5f7;">
            Kisah dimulai dengan Michael Light (diperankan oleh Mark Wahlberg), seorang
            pembalap petualangan paruh baya yang sedang mencari kesempatan terakhir untuk
            membuktikan dirinya. Light lalu membentuk tim balapan yang terdiri dari empat
            orang, yang masing-masing memiliki motivasinya sendiri untuk balapan.
            </p>
            <hr class="border-gray-800 mb-8">
        </div>

        <div class="w-full max-w-screen-lg">
            <ul class="divide-y divide-gray-800">

                <!-- Cinema 1 -->
                <li class="py-4">
                    <div class="flex justify-between items-center text-[#e4e5f7]">
                        <a href="#" class="text-xl font-semibold capitalize">grand city mall</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <div class="flex py-2 space-x-2">
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border ">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                    </div>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

                <!-- Cinema 2 -->
                <li class="py-4">
                    <div class="flex justify-between items-center text-[#e4e5f7]">
                        <a href="#" class="text-xl font-semibold capitalize">marvel city mall</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm text-[#e4e5f7]">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

                <!-- Cinema 3 -->
                <li class="py-4">
                    <div class="flex justify-between items-center text-[#e4e5f7]">
                        <a href="#" class="text-xl font-semibold capitalize">tunjungan plaza</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm" style="color: #e4e5f7;">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

                <!-- Cinema 4 -->
                <li class="py-4">
                    <div class="flex justify-between items-center" style="color: #e4e5f7;">
                        <a href="#" class="text-xl font-semibold capitalize">ciputra world</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm" style="color: #e4e5f7;">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

                <!-- Cinema 5 -->
                <li class="py-4">
                    <div class="flex justify-between items-center" style="color: #e4e5f7;">
                        <a href="#" class="text-xl font-semibold capitalize">delta</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm" style="color: #e4e5f7;">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</body>

</html>
