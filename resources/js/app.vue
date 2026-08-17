<template>
    <Login v-if="page === 'Login'" />
    <Dashboard v-else-if="page === 'Dashboard'" />
    <Users v-else-if="page === 'Users'" />
    <Products v-else-if="page === 'Products'" />
    <Categories v-else-if="page === 'Categories'" />
    <SubCategories v-else-if="page === 'SubCategories'" />
    <Orders v-else-if="page === 'Orders'" />
</template>

<script setup>
    import Login from "./pages/Login.vue";
    import Dashboard from "./pages/Dashboard.vue";
    import Users from "./pages/Users.vue";
    import Products from "./pages/Product/Products.vue";
    import Categories from "./pages/Product/Categories.vue";
    import SubCategories from "./pages/Product/SubCategories.vue";
    import Orders from "./pages/Order/Orders.vue";
    
    const page = document.getElementById("app").dataset.page;
</script>