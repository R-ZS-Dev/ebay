<script setup lang="ts">
    import AppLayout from "../../components/AppLayout.vue";
    const products = [
        {
            id: 1,
            sku: "ABC-001",
            name: "iPhone",
            category: "Mobile",
            price: "$999",
            stock: 25,
            status: "Active",
        },
        {
            id: 2,
            sku: "ABC-002",
            name: "MacBook",
            category: "Laptop",
            price: "$1299",
            stock: 10,
            status: "Active",
        },
        {
            id: 3,
            sku: "ABC-003",
            name: "AirPods",
            category: "Accessories",
            price: "$249",
            stock: 40,
            status: "Inactive",
        },
    ];
</script>

<template>
    <AppLayout>
        <div class="flex justify-end p-2 gap-2">
            <button class="common-button"> Bulk Stock Upload </button>
            <button class="common-button"> Bulk Products Upload </button>
            <button class="common-button"> Add Product </button>
        </div>

        <!-- Top Cards -->
        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Total Products</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Inactive Products</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">1,200</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Out of Stock</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Zero Stock Products</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">1250</p>
            </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th" >Product SKU</th>
                            <th class="table-th" >Product Name</th>
                            <th class="table-th">Category</th>
                            <th class="table-th">Price</th>
                            <th class="table-th">Stock</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            v-for="product in products"
                            :key="product.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="table-td" > {{ product.id }} </td>
                            <td class="table-td" > {{ product.sku }} </td>
                            <td class="table-td" > {{ product.name }} </td>
                            <td class="table-td" > {{ product.category }} </td>
                            <td class="table-td" > {{ product.price }} </td>
                            <td class="table-td" > {{ product.stock }} </td>

                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ product.status }}
                                </span>
                            </td>

                            <td class="table-td">
                                <button
                                    class="mr-3 text-blue-600 hover:text-blue-800"
                                >
                                    Edit
                                </button>

                                <button class="text-red-600 hover:text-red-800">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
