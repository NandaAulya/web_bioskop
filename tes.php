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
  <!-- <div class="flex justify-end p-10 poppins">
    <label class="relative block">
      <span class="sr-only">Search</span>
      <span class="absolute inset-y-0 left-0 flex items-center pl-2">
        <svg class="h-10 w-full fill-slate-300" viewBox="0 0 20 20"></svg>
      </span>
      <input
        class="placeholder:italic placeholder:text-slate-400 block bg-gray-100 w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
        placeholder="Search for anything..." type="text" name="search" />
    </label>
    <select class="select select-secondary w-full h-10 max-w-xs capitalize bg-gray-100 text-gray-500 border rounded">
      <option disabled selected>enter city</option>
      <option>surabaya</option>
      <option>jakarta</option>
      <option>solo</option>
      <option>lamongan</option>
      <option>malang</option>
      <option>bandung</option>
      <option>sidoarjo</option>
      <option>ponorogo</option>
    </select>
  </div>  -->
  <div class="flex flex-row gap-6 ml-10 mt-10 mx-auto drop-shadow-auto">
    <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg" style="width: 300px;">
      <img alt=""
        src="https://lh3.googleusercontent.com/p/AF1QipMp0tJkXdycG0a4Rx-exEbyLY0AlxxLFaOUKX_h=s1360-w1360-h1020"
        class="h-[150px] w-[300px] object-cover">
      <div class="bg-white-200 p-2 sm:p-4">
        <a href="#">
          <h3 class="capitalize text-gray-800 text-xl font-bold hover:text-gray-700 transition">grand city mall surabaya
          </h3>
        </a>  
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4 mb-2">
            <path
              d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
          </svg>
          <div class="ml-4 mt-3">
            <p class="capitalize text-sm">jl.walikota mustajab no.1 ketapang kec.genteng,surabaya</p>
          </div>
        </div>
      </div>
    </div>
    <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg" style="width: 300px;">
      <img alt="" src="https://lapispahlawan.co.id/uploads/2/2021-08/tunjungan-plaza-surabaya.jpg"
        class="h-[150px] w-[300px] object-cover">
      <div class="bg-white-200 p-2 sm:p-4">
        <a href="#">
          <h3 class="capitalize text-gray-800 text-xl font-bold hover:text-gray-700 transition">tunjungan plaza surabaya
          </h3>
        </a>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4 mb-2">
            <path
              d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
          </svg>
          <div class="ml-4 mt-3">
            <p class="capitalize text-sm">Jl.Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Surabaya</p>
          </div>
        </div>
      </div>
    </div>
    <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg" style="width: 300px;">
      <img alt=""
        src="https://lh3.googleusercontent.com/-zdWN0qfim8Y/Xkbj-ZU_iaI/AAAAAAAAUUw/wSzOTX5vAI4pK4Tc8faW2UAzeT5lrb4xgCNcBGAsYHQ/s1600/1581704178592811-0.png"
        class="h-[150px] w-[300px] object-cover">
      <div class="bg-white-200 p-2 sm:p-4">
        <a href="#">
          <h3 class="capitalize text-gray-800 text-xl font-bold hover:text-gray-700 transition">delta mall surabaya</h3>
        </a>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4 mb-2">
            <path
              d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
          </svg>
          <div class="ml-4 mt-3">
            <p class="capitalize text-sm">Jl. Pemuda No.30-37, Embong Kaliasin, Kec. Genteng, Kota Surabaya</p>
          </div>
        </div>
      </div>
    </div>
    <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg" style="width: 300px;">
      <img alt=""
        src=" "
        class="h-[150px] w-[300px] object-cover">
      <div class="bg-white-200 p-2 sm:p-4">
        <a href="#">
          <h3 class="capitalize text-gray-800 text-xl font-bold hover:text-gray-700 transition">galaxy mall surabaya
          </h3>
        </a>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4 mb-2">
            <path
              d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
          </svg>
          <div class="ml-4 mt-3">
            <p class="capitalize text-sm">jl.walikota mustajab no.1 ketapang kec.genteng,surabaya</p>
          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>