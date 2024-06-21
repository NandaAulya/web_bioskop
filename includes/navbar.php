<nav class="z-[999] w-full border-b-2 bg-[#060614]">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-10 w-10 rounded-full"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2o1bk_gkv4AThueOSDDfXY5hkFQNh7vxTvqS_LJvYhTWVA26yhorL5mWb9KfZKe5Eo3g&usqp=CAU"
                        alt="" />
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4 gap-6 p-8">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="index.php" class="menu-link">Now Playing</a>
                        <a href="upcoming.php" class="menu-link">Upcoming</a>
                        <a href="theater.php" class="menu-link">Theaters</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative flex">
                    <input type="search"
                        class="relative m-0 block flex-auto rounded border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary"
                        placeholder="Search" aria-label="Search" id="exampleFormControlInput2"
                        aria-describedby="button-addon2" />
                    <span
                        class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-surface dark:border-neutral-400 dark:text-white [&>svg]:h-5 [&>svg]:w-5"
                        id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>
                </div>

                <!-- Profile dropdown -->
                <div class="relative ml-3" x-data="{ open: false }">
                    <div>
                        <button type="button" @click="open = !open"
                            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-10 w-10 rounded-full"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq8u6nSF69d3VK-WZIifqYETMPZs5sJI6JomWnQUZSzw&s"
                                alt="" />
                        </button>
                    </div>

                    <!-- Dropdown menu -->
                    <div x-show="open" @click.away="open = false"
                        class="z-50 absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-pink-200 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="100">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href= "#" class="block px-4 py-2 text-sm text-white-200 hover:bg-gray-100" role="menuitem"
                            tabindex="-1" id="profile">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-200 hover:bg-gray-100" role="menuitem"
                            tabindex="-1" id="setting">Settings</a>
                        <p href="#" class="block px-4 py-2 text-sm text-white-200 hover:bg-gray-100" role="menuitem"
                            tabindex="-1" id="auth"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function setActive(path) {
        const isActive = window.location.pathname.includes(path);
        return isActive ? 'bg-gray-700 text-[#ebebf8] hover:bg-[#c65482] hover:text-white rounded-md px-3 py-2 text-sm font-medium sm:text-base' : 'text-gray-100 hover:text-white rounded-md px-3 py-2 text-sm font-medium sm:text-base';
    }

    // Set active class pada link berdasarkan path
    const menuLinks = document.querySelectorAll('.menu-link');
    menuLinks.forEach((link) => {
        const path = link.getAttribute('href');
        link.className = setActive(path);
    });

    // aut
    function isLoggedIn() {
        return localStorage.getItem('loggedIn') === 'true';
    }

    var authElement = document.getElementById("auth");
    var profil = document.getElementById("profile");

    authElement.addEventListener('click', function () {
        if (isLoggedIn()) { // kalau login
            localStorage.setItem("loggedIn", 'false')
            this.innerHTML = "Login"
            profil.href = '#'
        }else{ // kalau tidk login
            window.location.href = 'auth/login.php'; // Redirect ke halaman dashboard setelah login sukses
        }
    })

    document.addEventListener("DOMContentLoaded", function () {
        // Ambil elemen dengan id "auth"
        
        // Cek apakah pengguna sudah login atau belum
        if (isLoggedIn()) { //kalo login
            authElement.innerHTML = "Logout";
            profil.href = 'profile.php'
        } else {
            authElement.innerHTML = "Login";
        }
    });



</script>