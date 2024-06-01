<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'Arthur The King' ?>
    <?php include 'src/component/utils/meta.php' ?>
</head>

<body style="background-color: #060614">

    <header>
        <?php include 'src/component/utils/nav.php' ?>
    </header>
    <div class="flex flex-col items-center pt-10 px-20">
        <div class="flex w-full max-w-screen-lg">
            <img class="w-1/2 h-[300px] mb-8 object-cover rounded-md"
                src="https://dbijapkm3o6fj.cloudfront.net/resources/4759,1004,1,6,4,0,600,450/-4601-/20151230011419/grand-city-mall.jpeg">
            <div class="w-1/2 pl-8">
                <h1 class="text-3xl sm:text-4xl font-bold mb-4 capitalize text-[#9398e0]">grang city mall surabaya</h1>
                <div class="ml-10 mr-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-clock mb-8 mr-4" style="color :#ffff;"></i>
                    <p class="capitalize text-lg sm:text-xl leading-relaxed mb-8 text-[#e4e5f7]">
                        10.00 - 22.00
                    </p>
                </div>
                <div class="ml-10 mr-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-location-dot mb-14 mr-4" style="color :#ffff;"></i>
                    <p class="capitalize text-lg sm:text-xl leading-relaxed mb-8 text-[#e4e5f7]">
                        jl.walikota mustajab no.1 ketapang kec.genteng,surabaya,jawa timur 60272.
                    </p>
                </div>
                <div class="ml-10 mr-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-clock mb-8 mr-4" style="color :#ffff;"></i>
                    <p class="capitalize text-lg sm:text-xl leading-relaxed mb-8 text-[#e4e5f7]">
                        (031) 5459000
                    </p>
                </div>
            </div>
        </div>
        <hr class="border-gray-800 mb-8 w-full max-w-screen-lg">

        <div class="w-full max-w-screen-lg">
            <ul class="divide-y divide-gray-800">

                <!-- movie 1 -->
                <li class="py-4">
                    <img class="h-[300px] object-cover overflow-hidden rounded-md mb-4"
                        src="public/assets/img/m1.jpg">
                    <div class="flex justify-between items-center text-[#e4e5f7]">
                        <a href="#" class="text-2xl font-bold capitalize text-[#c63a8d]">arthur the king</a>
                        <span class="text-lg font-semibold">Rp.40,000</span>
                    </div>
                    <div class="flex py-2 space-x-4 capitalize">
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 1</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 2</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 3</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 4</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 5</a>
                    </div>
                    <div class="flex py-2 space-x-2">
                        <a href="movie.php" class="mt-2 text-sm text-[#e4e5f7] px-2 border ">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                    </div>
                    <div class="flex py-2 space-x-4">
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

                <!-- movie 2 -->
                <li class="py-4">
                    <img class="h-[300px] object-cover overflow-hidden rounded-md mb-4"
                        src="public/assets/img/the first omen poster.jpg">
                    <div class="flex justify-between items-center text-[#e4e5f7]">
                        <a href="#" class="text-2xl font-bold capitalize text-[#c63a8d]">the first omen</a>
                        <span class="text-lg font-semibold">Rp.45,000</span>
                    </div>
                    <div class="flex py-2 space-x-4 capitalize">
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 1</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 2</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 3</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 4</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 5</a>
                    </div>
                    <div class="flex py-2 space-x-2">
                        <a href="movie.php" class="mt-2 text-sm text-[#e4e5f7] px-2 border ">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                    </div>
                    <div class="flex py-2 space-x-4">
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

                <!-- movie 3 -->
                <li class="py-4">
                    <img class="h-[300px] object-cover overflow-hidden rounded-md mb-4"
                        src="public/assets/img/kingdom of the planet of the apes.jpg">
                    <div class="flex justify-between items-center text-[#e4e5f7]">
                        <a href="#" class="text-2xl font-bold capitalize text-[#c63a8d]">kingdom of the planet of the apes</a>
                        <span class="text-lg font-semibold">Rp.35,000</span>
                    </div>
                    <div class="flex py-2 space-x-4 capitalize">
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 1</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 2</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 3</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 4</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : 5</a>
                    </div>
                    <div class="flex py-2 space-x-2">
                        <a href="movie.php" class="mt-2 text-sm text-[#e4e5f7] px-2 border ">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">01-05-2024</a>
                    </div>
                    <div class="flex py-2 space-x-4">
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">12:40</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">14:50</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">17:00</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">19:10</a>
                        <a href="#"
                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]">21:20</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</body>

</html>