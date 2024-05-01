<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'Theater' ?>
    <?php include 'src/component/utils/meta.php' ?>
</head>
<body>
<?php include 'src/component/utils/nav.php' ?>

      <!-- theaters -->
      <div class="flex justify-end p-10">
    <select class="select select-secondary w-full h-10 max-w-xs capitalize bg-white text-gray-700 ">
        <option disabled selected>Enter City</option>
        <option>Surabaya</option>
        <option>Jakarta</option>
        <option>Solo</option>
        <option>Lamongan</option>
        <option>Malang</option>
        <option>Bandung</option>
        <option>Sidoarjo</option>
        <option>Ponorogo</option>
    </select>
</div>
<div class="overflow-x-auto">
  <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
    <tbody class="divide-y divide-gray-200">
      <tr>
        <td class="capitalize whitespace-nowrap px-4 py-6 text-3xl text-gray-900">tunjungan plaza</td>
        <td class="capitalize whitespace-nowrap px-4 py-2 text-2xl text-gray-700">tunjungan, surabaya</td>
      </tr=>

      <tr>
        <td class="capitalize whitespace-nowrap px-4 py-6 text-3xl text-gray-900">Galaxy Mall</td>
        <td class="capitalize whitespace-nowrap px-4 py-2 text-2xl text-gray-700">asdaasd, surabaya</td>
      </tr=>

      <tr>
        <td class="capitalize whitespace-nowrap px-4 py-6 text-3xl text-gray-900">Delta</td>
        <td class="capitalize whitespace-nowrap px-4 py-2 text-2xl text-gray-700">surabaya alalalo</td>
      </tr=>
    </tbody>
  </table>
</div>
</body>
</html>