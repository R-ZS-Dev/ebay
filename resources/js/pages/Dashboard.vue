<script setup>
    import AppLayout from "../components/AppLayout.vue";
    import IntegrationIcon from "../components/icons/IntegrationIcon.vue";
    import ShopIcon from "../components/icons/ShopIcon.vue";
    import RevenueIcon from "../components/icons/RevenueIcon.vue";
    import UsersIcon from "../components/icons/UsersIcon.vue";
    import RevenueChart from "../components/RevenueChart.vue";
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> Dashboard </h2>

        <!-- Top Cards -->
        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex gap-2"> <ShopIcon/> <span class="text-xl">Total Stores</span></p>
                <p class="mt-2 text-3xl font-bold text-green-800">8</p>
                <p class="mt-2 text-sm">Connected (5)</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Total Orders</span></p>
                <p class="mt-2 text-3xl font-bold text-blue-800">1,200</p>
                <p class="mt-2 text-sm">18 this month</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <RevenueIcon/> <span class="text-xl">Total Revenue</span></p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">$24,500</p>
                <p class="mt-2 text-sm">15 this month</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <UsersIcon/> <span class="text-xl">Total Users</span></p>
                <p class="mt-2 text-3xl font-bold text-blue-800">1,250</p>
                <p class="mt-2 text-sm">12 this month</p>
            </div>
            
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Today Orders</span></p>
                <p class="mt-2 text-3xl font-bold text-blue-800">200</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <RevenueIcon/> <span class="text-xl">Today Revenue</span></p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">$2,500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Today Sale Products</span></p>
                <p class="mt-2 text-3xl font-bold text-blue-800">250</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Pending Stock</span></p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Awaiting Shipping Orders</span></p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Total Shipped Orders</span></p>
                <p class="mt-2 text-3xl font-bold text-green-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-red-500 flex gap-2"> <IntegrationIcon/> <span class="text-xl">Canceled Orders</span></p>
                <p class="mt-2 text-3xl font-bold text-red-800">500</p>
            </div>
        </div>

        <!-- Graph -->
        <div class="grid grid-cols-1 mt-2">
            <div class="card-inner-div">
                <RevenueChart />
            </div>
        </div>
    </AppLayout>
</template>
