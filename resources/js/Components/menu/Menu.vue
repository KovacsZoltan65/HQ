<script setup>
    import NavLink from '../../Components/NavLink.vue';
</script>
<template>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

        <!-- dashboard menu -->
        <NavLink :href="route('dashboard')" 
                 :active="route().current('dashboard')">
            {{ $t('dashboard') }}
        </NavLink>

        <!-- books menu -->
        <NavLink :href="route('books')" 
                 :active="route().current('books')">
            {{ $t('books') }}
        </NavLink>

        <!-- users menu -->
        <NavLink :href="route('user.index')" 
                 :active="route().current('user.index')">
            {{ $t('users') }}
        </NavLink>

        <!-- subdomains menu -->
        <NavLink :href="route('subdomains')" 
                 :active="route().current('subdomains')">
            {{ $t('subdomains') }}
        </NavLink>

        <!-- permissions menu -->
        <NavLink :href="route('permission.index')" 
                 :active="route().current('permission.index')">
            {{ $t('permissions') }}
        </NavLink>

        <!-- roles menu -->
        <NavLink :href="route('role.index')" 
                 :active="route().current('role.index')">
            {{ $t('roles') }}
        </NavLink>

        <!-- posts menu -->
        <NavLink :href="route('post.index')" 
                 :active="route().current('post.index')">
            {{ $t('posts') }}
        </NavLink>
    </div>
</template>