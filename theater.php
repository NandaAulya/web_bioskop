<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php $title = 'Theater' ?>
  <?php include 'src/component/utils/meta.php' ?>
  <?php include 'src/component/utils/nav.php' ?>
</head>

<body style="background-color: #060614">
  <div class="flex justify-end font-bold mr-10 text-[#9398e0] mt-10 relative z-[100]">
    <div class="dropdown">
      <button id="dropdownButton" class="m-1 btn bg-[#9398e0] text-[#060614] px-4 py-2">Location</button>
      <ul id="dropdownMenu"
        class="hidden p-2 shadow menu dropdown-content z-[1] bg-white rounded-box w-52 absolute right-0 mt-2">
        <li><a href="tsby.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Surabaya</a></li>
        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Malang</a></li>
        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Jakarta</a></li>
        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Yogyakarta</a></li>
        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Solo</a></li>
        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bandung</a></li>
        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tangerang</a></li>
      </ul>
    </div>
  </div>

  <?php include 'src/component/theater/cinema.php' ?>

  <script>
    document.getElementById('dropdownButton').addEventListener('click', function () {
      var dropdownMenu = document.getElementById('dropdownMenu');
      dropdownMenu.classList.toggle('hidden');
    });

    // jika user klik diluar dropdown option e ditutup
    window.addEventListener('click', function (e) {
      var dropdownButton = document.getElementById('dropdownButton');
      var dropdownMenu = document.getElementById('dropdownMenu');
      if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>
</body>

</html>