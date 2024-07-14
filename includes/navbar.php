<nav class="z-[999] w-full border-b-2 bg-[#060614]">
    <div class="mx-auto max-w-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-[70px] items-center justify-between">
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
            <div class="flex flex-1 items-center justify-start">
                <div class="flex items-center">
                    <!-- Logo -->
                    <img class="h-[140px] w-[140px]"
                        src="assets/images/logo.png">
                </div>
                <div class="flex-1 hidden sm:block">
                    <div class="flex justify-center space-x-4 gap-20 p-20 font-poppins">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="index.php" class="menu-link">Now Playing</a>
                        <a href="upcoming.php" class="menu-link">Upcoming</a>
                        <a href="theater.php" class="menu-link">Theaters</a>
                    </div>
                </div>
            </div>
            <!-- Search -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-10">
                <div class="relative flex pr-20">
                    <input type="search"
                        class="relative m-0 block flex-auto rounded border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary"
                        placeholder="Search" aria-label="Search" id="exampleFormControlInput2"
                        aria-describedby="button-addon2" style="width: 250px;" />
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
                        <button type="button" @click="open = !open" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-10 w-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq8u6nSF69d3VK-WZIifqYETMPZs5sJI6JomWnQUZSzw&s" alt="" />
                        </button>
                    </div>

                    <!-- Dropdown menu -->

                    <div x-show="open" @click.away="open = false" class="z-50 absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-pink-200 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-10" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="100">
                        <form action="auth/login.php" method="post">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <p class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100" role="menuitem" tabindex="-1">Halo <?php echo $_SESSION['username']?></p>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100" role="menuitem" tabindex="-1" id="profile">Your Profile</a>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <a href="admin.php" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100" role="menuitem" tabindex="-1" >Admin Panel</a>
                                <?php endif; ?>
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 w-full text-left" role="menuitem" tabindex="-1" id="logout" name="logout">Logout</button>
                            <?php else: ?>
                                <a href="auth/login.php" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100" role="menuitem" tabindex="-1" id="login">Login</a>
                            <?php endif; ?>
                        </form>
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

    const menuLinks = document.querySelectorAll('.menu-link');
    menuLinks.forEach((link) => {
        const path = link.getAttribute('href');
        link.className = setActive(path);
    });

</script>