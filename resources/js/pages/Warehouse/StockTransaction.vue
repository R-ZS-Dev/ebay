<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';

    const StockTanscations = [
        {
            id: 1,
            warehouse: "ABC-001",
            product: "Product 1",
            type: "Adjustment",
            qty: 55,
            address: "XYZ-0009",
            createdby: "Member 1",
            createdat: "28-8-2026",
        }
    ];
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> Stock Transaction </h2>

        <!-- Filters -->
        <div class="card-main-div">
            <div class="grid grid-cols-1"> <input class="input-style" type="text" name="" placeholder="Search reference, product or creator..."> </div>
            <!-- All Warehouses -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Select Warehouse</option>
                    <option value="Warehouse 1">Warehouse 1</option>
                    <option value="Warehouse 2">Warehouse 2</option>
                </select> 
            </div>
            <!-- All Types -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Select Type</option>
                    <option value="IN">IN</option>
                    <option value="OUT">OUT</option>
                    <option value="TRANSFER">TRANSFER</option>
                    <option value="ADJUSTMENT">ADJUSTMENT</option>
                </select> 
            </div>
            <div class="grid grid-cols-1"> <button class="common-button">Clear Filter</button> </div>
        </div>

        <!-- Record Table -->
         <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th">Warehouse</th>
                            <th class="table-th">Product</th>
                            <th class="table-th">Type</th>
                            <th class="table-th">QTY</th>
                            <th class="table-th">Reference</th>
                            <th class="table-th">Created By</th>
                            <th class="table-th">Created At</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="StockTanscation in StockTanscations" :key="StockTanscation.id" class="hover:bg-gray-50">
                            <td class="table-td"> {{ StockTanscation.id }} </td>
                            <td class="table-td"> {{ StockTanscation.warehouse }} </td>
                            <td class="table-td"> {{ StockTanscation.product }} </td>
                            <td class="table-td"> <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-700">{{ StockTanscation.type }}</span> </td>
                            <td class="table-td"> {{ StockTanscation.qty }} </td>
                            <td class="table-td"> {{ StockTanscation.address }} </td>
                            <td class="table-td"> {{ StockTanscation.createdby }} </td>
                            <td class="table-td"> {{ StockTanscation.createdat }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>