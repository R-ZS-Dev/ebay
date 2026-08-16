<template>
    <Login v-if="page === 'Login'" />
    <Dashboard v-else-if="page === 'Dashboard'" />
    <Users v-else-if="page === 'Users'" />
    <Products v-else-if="page === 'Products'"/>
</template>

<script setup>
    import Login from "./pages/Login.vue";
    import Dashboard from "./pages/Dashboard.vue";
    import Users from "./pages/Users.vue";
    import Products from "./pages/Products.vue";

    const page = document.getElementById("app").dataset.page;
</script>