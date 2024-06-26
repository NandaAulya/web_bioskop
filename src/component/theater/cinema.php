<?php
$theaters = array(
    array(
        'title' => 'grand city surabaya',
        'poster' => 'https://lh3.googleusercontent.com/p/AF1QipMp0tJkXdycG0a4Rx-exEbyLY0AlxxLFaOUKX_h=s1360-w1360-h1020',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'jl.walikota mustajab no.1 ketapang kec.genteng,surabaya',
        'endpoint' => 'tdetail.php'
    ),
    array(  
        'title' => 'tunjungan plaza ',
        'poster' => 'https://lapispahlawan.co.id/uploads/2/2021-08/tunjungan-plaza-surabaya.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl.Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Surabaya',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'delta mall surabaya',
        'poster' => 'https://lh3.googleusercontent.com/-zdWN0qfim8Y/Xkbj-ZU_iaI/AAAAAAAAUUw/wSzOTX5vAI4pK4Tc8faW2UAzeT5lrb4xgCNcBGAsYHQ/s1600/1581704178592811-0.png',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Pemuda No.30-37, Embong Kaliasin, Kec. Genteng, Kota Surabaya',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'galaxy mall surabaya',
        'poster' => 'https://dbijapkm3o6fj.cloudfront.net/resources/36670,1004,1,6,4,0,600,450/-4601-/20231229151024/galaxy-mall-surabaya.jpeg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'jl.walikota mustajab no.1 ketapang kec.genteng,surabaya',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'ciputra world',
        'poster' => 'https://ciputraworldsurabaya.com/mall/wp-content/uploads/2021/11/CWS-1.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Gn. Sari, Kec. Dukuhpakis, Surabaya, Jawa Timur',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'pakuwon city mall',
        'poster' => 'https://www.pakuwoncity.com/wp-content/uploads/2020/11/Pakuwon-City-Mall-e1604998922874.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Raya Laguna KJW Putih Tambak No.2, Kejawaan Putih Tamba, Kec.Mulyorejo',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'pakuwon mall ',
        'poster' => 'https://transfashionindonesia.com/wp-content/uploads/2023/11/Pakuwon-Mall-Surabaya_02.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Mayjend. Jonosewojo No.2, Babatan, Kec.Wiyung',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'marvel city mall',
        'poster' => 'https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-banner-pic/16d94acf990a5c3283373038616f9098.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Ngagel No.123, Ngagel, Kec. Wonokromo, Surabaya',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'bg junction mall',
        'poster' => 'https://r1.community.samsung.com/t5/image/serverpage/image-id/7692900iFB7C812E20681E52?v=v2',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Bubutan No.1-7, Bubutan, Kec. Bubutan',
        'endpoint' => 'tfilm.php'
    ),
    array(
        'title' => 'lenmarc mall',
        'poster' => 'https://image.jpnn.com/resize/570x380-80/arsip/normal/2017/02/13/ee92f70da7642465396efd89f219b919.jpg',
        'icon' => 'http://www.w3.org/2000/svg',
        'location' => 'Jl. Mayjend. Jonosewojo No.9, Pradahkalikendal, Kec. Dukuhpakis',
        'endpoint' => 'tfilm.php'
    ),
);
?>

<div class="flex flex-row flex-wrap gap-6 ml-10 mt-10 mx-auto drop-shadow-auto">
    <?php foreach ($theaters as $theater): ?>
        <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg mb-4" style="width: 300px;">
            <div class="bg-white rounded-md">
                <a href="<?php echo $theater['endpoint']; ?>">
                    <img src="<?php echo $theater['poster']; ?>" class="h-[150px] w-[300px] object-cover">
                    <h3 class="mt-4 ml-4 capitalize text-2xl font-bold font-poppins transition-colors duration-300 text-[#9398e0] hover:text-[#1d1d3f]">
                        <?php echo $theater['title']; ?>
                    </h3>
                </a>
                <div class="ml-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-location-dot mb-8"></i>
                    <div class="ml-4 mt-3">
                        <p class="capitalize text-sm mb-8"><?php echo $theater['location']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
