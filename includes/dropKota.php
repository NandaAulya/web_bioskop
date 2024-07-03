<?php
    $cities = getKota();
?>
<div class="flex justify-end font-bold mr-20 text-[#9398e0] mt-10 relative z-[5]">
        <div class="dropdown">
            <button id="dropdownButton" class="m-1 btn bg-[#9398e0] text-[#060614] px-4 py-2">Location</button>
            <ul id="dropdownMenu" class="hidden p-2 shadow menu dropdown-content z-[1] bg-white rounded-box w-52 absolute right-0 mt-2">
                <?php foreach ($cities as $row): ?>
                <li><a href="?kota=<?php echo $row['kota']?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><?php echo $row['kota']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <script src="assets/js/location.js"></script>