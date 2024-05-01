<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'Arthur The king' ?>
    <?php include 'src/component/utils/meta.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">

    <header>
        <?php include 'src/component/utils/nav.php' ?>
    </header>

    <!-- <section class="banner_wrap" >
    <style>
        .banner_wrap{
            background-image: url("/public/assets/img/download.jpeg");
            display: flex;
            justify-content: left;
            align-items: center;
            background-size: cover;
            background-position: center;
        }
    </style>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-white">
            <p class="text-sm font-uppercase tracking-widest text-pink-500">Adventure</p>
            <h1 class="text-3xl sm:text-4xl font-bold mb-4">Arthur The King</h1>
            <p class="text-lg sm:text-xl leading-relaxed mb-8">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis dolorum voluptatum quas! Fugit non numquam voluptates ipsa illum maiores temporibus ex eos minus ducimus officiis blanditiis, ipsum itaque repellat optio.
            </p>
        </div>
    </section> -->
    <div class="flex flex-row pl-10 pt-10 gap-5">
        <img src="/public/assets/img/arthur the king poster.jpg" class=" pl-8 w-[250px]">
        <div>
            <h1 class="text-3xl sm:text-4xl font-bold mb-4">Arthur The King</h1>
            <p class="text-2xl font-uppercase tracking-widest text-pink-500">Adventure</p>
            <p class="text-lg sm:text-xl leading-relaxed mb-8">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis dolorum voluptatum quas! Fugit non numquam voluptates ipsa illum maiores temporibus ex eos minus ducimus officiis blanditiis, ipsum itaque repellat optio.
            </p>
        </div>
    </div>

    <div class="max-w-lg pl-[50px] py-62 px-4 ">

        <ul class="divide-y divide-gray-200">

            <!-- Cinema 1 -->
            <li class="py-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="text-lg font-semibold">GANDARIA CITY</a>
                    <span class="text-lg font-semibold">Rp 90,000</span>
                </div>
                <p class="mt-2 text-sm">01-05-2024</p>
                <div class="flex mt-4 space-x-2">
                    <a href="#" class="btn btn-default btn-outline div_schedule border">12:40</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">14:50</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">17:00</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">19:10</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">21:20</a>
                </div>
            </li>

            <!-- Cinema 2 -->
            <li class="py-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="text-lg font-semibold">KELAPA GADING </a>
                    <span class="text-lg font-semibold">Rp 45,000</span>
                </div>
                <p class="mt-2 text-sm">01-05-2024</p>
                <div class="flex mt-4 space-x-2">
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">12:30</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">14:40</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">16:50</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">19:00</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">21:10</a>
                </div>
            </li>

            <li class="py-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="text-lg font-semibold">AEON </a>
                    <span class="text-lg font-semibold">Rp 50,000</span>
                </div>
                <p class="mt-2 text-sm">01-05-2024</p>
                <div class="flex mt-4 space-x-2">
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">12:30</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">14:40</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">16:50</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">19:00</a>
                    <a href="#" class="btn btn-default btn-outline disabled div_schedule">21:10</a>
                </div>
            </li>

            <!-- Additional Cinemas can be added here using the same structure -->

        </ul>

    </div>

</body>

</html>