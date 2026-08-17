<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';

    const subcategories = [
        {
            id: 1,
            name: "iPhone",
            subname: "ABC-001",
            status: "Active",
        },
        {
            id: 2,
            name: "MacBook",
            subname: "ABC-002",
            status: "Active",
        },
        {
            id: 3,
            name: "AirPods",
            subname: "ABC-003",
            status: "Inactive",
        },
    ];
</script>

<template>
    <AppLayout>
        <div class="flex justify-end p-2 gap-2">
            <button class="common-button"> Bulk Sub Category </button>
            <button class="common-button"> Add Sub Category </button>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Total SubCategory</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Active SubCategory</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-gray-500">Inactive SubCategory</p>
                <p class="mt-2 text-3xl font-bold text-gray-800">1250</p>
            </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th" >Category Name</th>
                            <th class="table-th" >Sub Category Name</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="subcategory in subcategories" :key="subcategory.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ subcategory.id }} </td>
                            <td class="table-td" > {{ subcategory.name }} </td>
                            <td class="table-td" > {{ subcategory.subname }} </td>
                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ subcategory.status }}
                                </span>
                            </td>
                            <td class="table-td">
                                <button class="mr-3 text-blue-600 hover:text-blue-800">
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