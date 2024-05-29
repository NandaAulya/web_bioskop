<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'Arthur The king' ?>
    <?php include 'src/component/utils/meta.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-300">

    <header>
        <?php include 'src/component/utils/nav.php' ?>
    </header>
    <div class="flex flex-col items-center pt-10 px-20 ">
        <img class="w-full max-w-screen-lg h-[380px] mb-8 object-cover rounded-md"
            src="https://ntvb.tmsimg.com/assets/p26294774_v_h8_ab.jpg?w=960&h=540">
        <div class="w-full max-w-screen-lg">
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 capitalize text-gray-800">Arthur the King</h1>
            <p class="text-2xl tracking-widest text-gray-800 mb-4">Adventure</p>
            <p class="text-lg sm:text-xl leading-relaxed mb-8 text-black">
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
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-xl font-semibold capitalize">grand city mall</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">21:20</a>
                    </div>
                </li>

                <!-- Cinema 2 -->
                <li class="py-4">
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-xl font-semibold capitalize">marvel city mall</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">21:20</a>
                    </div>
                </li>

                <!-- Cinema 3 -->
                <li class="py-4">
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-xl font-semibold capitalize">tunjungan plaza</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">21:20</a>
                    </div>
                </li>

                <!-- Cinema 4 -->
                <li class="py-4">
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-xl font-semibold capitalize">ciputra world</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">21:20</a>
                    </div>
                </li>

                <!-- Cinema 5 -->
                <li class="py-4">
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-xl font-semibold capitalize">delta</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <p class="mt-2 text-sm">01-05-2024</p>
                    <div class="flex py-2 space-x-4">
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">12:40</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">14:50</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">17:00</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">19:10</a>
                        <a href="#" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-gray-200">21:20</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</body>

</html>
