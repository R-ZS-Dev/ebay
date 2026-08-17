<template>
    <AppLayout>
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>

        <!-- Top Cards -->
        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Total Stores</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">8</p>
                <p class="mt-2 text-sm text-green-600">Connected (5)</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Total Orders</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">1,200</p>
                <p class="mt-2 text-sm text-green-600">18% this month</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">$24,500</p>
                <p class="mt-2 text-sm text-green-600">+15% this month</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Total Users</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">1,250</p>
                <p class="mt-2 text-sm text-green-600">+12% this month</p>
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

<script setup>
    import AppLayout from "../components/AppLayout.vue";
    import RevenueChart from "../components/RevenueChart.vue";
</script>
