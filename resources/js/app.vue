<template>
    <Login v-if="page === 'Login'" />
    <Dashboard v-else-if="page === 'Dashboard'" />
    <Users v-else-if="page === 'Users'" />
    <Products v-else-if="page === 'Products'" />
    <Categories v-else-if="page === 'Categories'" />
    <SubCategories v-else-if="page === 'SubCategories'" />
    <Size v-else-if="page === 'Size'" />
    <Color v-else-if="page === 'Color'" />
    <Orders v-else-if="page === 'Orders'" />
    <ChannelRecords v-else-if="page === 'ChannelRecords'" />
    <CreateSKU v-else-if="page === 'CreateSKU'" />
    <SkuRecords v-else-if="page === 'SkuRecords'" />
    <UnutilizedSKU v-else-if="page === 'UnutilizedSKU'" />
    <Logs v-else-if="page === 'Logs'" />
    <ChannelIntegration v-else-if="page === 'ChannelIntegration'" />
    <UserManagement v-else-if="page === 'UserManagement'" />
    <Warehouse v-else-if="page === 'Warehouse'" />
    <StockTransaction v-else-if="page === 'StockTransaction'" />
    <StockTransfer v-else-if="page === 'StockTransfer'" />
    <OrderDispatch v-else-if="page === 'OrderDispatch'" />
</template>

<script setup>
    import Login from "./pages/Login.vue";
    import Dashboard from "./pages/Dashboard.vue";
    import Users from "./pages/Users.vue";
    import Products from "./pages/Product/Products.vue";
    import Categories from "./pages/Product/Categories.vue";
    import SubCategories from "./pages/Product/SubCategories.vue";
    import Size from "./pages/Product/Size.vue";
    import Color from "./pages/Product/Color.vue";
    import Orders from "./pages/Order/Orders.vue";
    import ChannelRecords from "./pages/ChannelRecords.vue";
    import CreateSKU from "./pages/SKU/CreateSKU.vue";
    import SkuRecords from "./pages/SKU/SkuRecords.vue";
    import UnutilizedSKU from "./pages/SKU/UnutilizedSKU.vue";
    import Logs from "./pages/Setting/Logs.vue";
    import ChannelIntegration from "./pages/Setting/ChannelIntegration.vue";
    import UserManagement from "./pages/Setting/UserManagement.vue";
    import Warehouse from "./pages/Warehouse/Warehouse.vue";
    import StockTransaction from "./pages/Warehouse/StockTransaction.vue";
    import OrderDispatch from "./pages/Warehouse/OrderDispatch.vue";
    import StockTransfer from "./pages/Warehouse/StockTransfer.vue";
    
    const page = document.getElementById("app").dataset.page;
</script>
