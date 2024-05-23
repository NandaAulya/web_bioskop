<?php
$theaters = array(
    array(
        'title' => 'grand city surabaya',
        'poster' => 'https://lh3.googleusercontent.com/p/AF1QipMp0tJkXdycG0a4Rx-exEbyLY0AlxxLFaOUKX_h=s1360-w1360-h1020',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'jl.walikota mustajab no.1 ketapang kec.genteng,surabaya',
        'endpoint' => ''
    ),
    array(
        'title' => 'tunjungan plaza surabaya',
        'poster' => 'https://lapispahlawan.co.id/uploads/2/2021-08/tunjungan-plaza-surabaya.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl.Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Surabaya',
        'endpoint' => ''
    ),
    array(
        'title' => 'delta mall surabaya',
        'poster' => 'https://lh3.googleusercontent.com/-zdWN0qfim8Y/Xkbj-ZU_iaI/AAAAAAAAUUw/wSzOTX5vAI4pK4Tc8faW2UAzeT5lrb4xgCNcBGAsYHQ/s1600/1581704178592811-0.png',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Pemuda No.30-37, Embong Kaliasin, Kec. Genteng, Kota Surabaya',
        'endpoint' => ''
    ),
    array(
        'title' => 'galaxy mall surabaya',
        'poster' => 'https://dbijapkm3o6fj.cloudfront.net/resources/36670,1004,1,6,4,0,600,450/-4601-/20231229151024/galaxy-mall-surabaya.jpeg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'jl.walikota mustajab no.1 ketapang kec.genteng,surabaya',
        'endpoint' => ''
    ),
);
?>

<div class="flex flex-row gap-6 ml-10 mt-10 mx-auto drop-shadow-auto">
    <?php foreach ($theaters as $theater): ?>
        <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg" style="width: 300px;">
            <img src="<?php echo $theater['poster']; ?>" class="h-[150px] w-[300px] object-cover">
            <div class="bg-white-200 p-2 sm:p-4">
                <h3 class="capitalize text-gray-800 text-xl font-bold hover:text-gray-700 transition"><?php echo $theater['title']; ?></h3>
                <div class="flex items-center">
                <i class="fa-solid fa-location-dot"></i>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>