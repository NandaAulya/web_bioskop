<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'film in bioskop' ?>
    <?php include 'src/component/utils/meta.php' ?>
</head>

<body style="background-color: #060614">
    <?php include 'src/component/utils/nav.php' ?>
    <div class="text-4xl font-bold text-center text-[#9398e0] uppercase mt-10">
        <p>
            now playing
            <?php include 'src/component/movie/cards.php' ?>
        </p>
        <p>
            upcoming
            <?php include 'src/component/movie/cards.php' ?>
        </p>
    </div>
</body>

</html>