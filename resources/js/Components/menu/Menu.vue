<script setup>
    import NavLink from '../../Components/NavLink.vue';
</script>
<template>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <NavLink :href="route('dashboard')" 
                 :active="route().current('dashboard')">
            Dashboard
        </NavLink>
        <NavLink :href="route('books')" 
                 :active="route().current('books')">
            Books
        </NavLink>
        <NavLink :href="route('user.index')" 
                 :active="route().current('user.index')">
            Users
        </NavLink>

        <NavLink :href="route('permission.index')" 
                 :active="route().current('permission.index')">
            Permission
        </NavLink>

        <NavLink :href="route('role.index')" 
                 :active="route().current('role.index')">
            Role
        </NavLink>

        <NavLink :href="route('post.index')" 
                 :active="route().current('post.index')">
            Post
        </NavLink>
    </div>
</template>