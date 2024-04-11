<script setup>
    import NavLink from '../../Components/NavLink.vue';
    import DropdownLink from '../../Components/DropdownLink.vue';
</script>
<template>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

        <!-- dashboard menu -->
        <NavLink :href="route('dashboard')" 
                 :active="route().current('dashboard')">
            {{ $t('dashboard') }}
        </NavLink>

        <!-- ADMIN DROPDOWN -->
        <button id="dropdownNavbarLinkAdmin" 
                data-dropdown-toggle="dropdownNavbar" 
                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
        >Admin 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
					
        <!-- Dropdown menu -->
        <div id="dropdownNavbar" 
             class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" 
                aria-labelledby="dropdownLargeButton">
                <li>
                    <!-- users menu -->
                    <a :href="route('user.index')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('users') }}
                    </a>    
                </li>
                <li>
                    <!-- permissions menu -->
                    <a :href="route('permission.index')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('permissions') }}
                    </a>
                </li>
                <li>
                    <!-- roles menu -->
                    <a :href="route('role.index')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('roles') }}
                    </a>
                </li>
                <!-- books menu -->
                <!--<DropdownLink :href="route('user.index')" as="a" 
                              :active="route().current('user.index')">
                    {{ $t('users') }}
                </DropdownLink>-->

                <!-- permissions menu -->
                <!--<DropdownLink :href="route('permission.index')" 
                              :active="route().current('permission.index')">
                    {{ $t('permissions') }}
                </DropdownLink>-->

                <!-- roles menu -->
                <!--<DropdownLink :href="route('role.index')" 
                        :active="route().current('role.index')">
                    {{ $t('roles') }}
                </DropdownLink>-->
            </ul>

            <div class="py-1">
                <a href="#" 
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >Sign out</a>
            </div>
        </div>

        <!-- ADMIN DROPDOWN -->
        <button id="dropdownNavbarLinkPeldanyok" 
                data-dropdown-toggle="dropdownNavbarPeldanyok" 
                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
        >Példányok 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
					
        <!-- Dropdown menu -->
        <div id="dropdownNavbarPeldanyok" 
             class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" 
                aria-labelledby="dropdownLargeButton">

                <li>
                    <!-- subdomains menu -->
                    <a :href="route('subdomains')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('subdomains') }}
                    </a>
                </li>

                <!-- users menu -->
                <!--<li>
                    <a :href="route('user.index')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('users') }}
                    </a>
                </li>-->

                <!-- permissions menu -->
                <!--<li>
                    <a :href="route('permission.index')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('permissions') }}
                    </a>
                </li>-->

                <!-- roles menu -->
                <!--<li>
                    <a :href="route('role.index')" 
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                       {{ $t('roles') }}
                    </a>
                </li>-->
                
                <!--<DropdownLink :href="route('subdomains')" 
                        :active="route().current('subdomains')">
                    {{ $t('subdomains') }}
                </DropdownLink>-->
                
                <!--<DropdownLink :href="route('user.index')" as="a" 
                              :active="route().current('user.index')">
                    {{ $t('users') }}
                </DropdownLink>-->
                
                <!--<DropdownLink :href="route('permission.index')" 
                              :active="route().current('permission.index')">
                    {{ $t('permissions') }}
                </DropdownLink>-->

                <!--<DropdownLink :href="route('role.index')" 
                        :active="route().current('role.index')">
                    {{ $t('roles') }}
                </DropdownLink>-->
            </ul>

            <!--
            <div class="py-1">
                <a href="#" 
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >Sign out</a>
            </div>
            -->
        </div>










        <!-- books menu -->
        <NavLink :href="route('books')" 
                 :active="route().current('books')">
            {{ $t('books') }}
        </NavLink>

        

        <!-- posts menu -->
        <NavLink :href="route('post.index')" 
                 :active="route().current('post.index')">
            {{ $t('posts') }}
        </NavLink>
    </div>
</template>