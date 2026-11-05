<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import { ref } from 'vue';
import MappedIcon from '../../components/icons/MappedIcon.vue';
import FailedIcon from '../../components/icons/FailedIcon.vue';
    const orderDispatchModal = ref(false);

    const OrderDispatchs = [
        {
            id: 1,
            dispatch: "ABC-001",
            warehouse: "Product 1",
            items: "single",
            qty: 55,
            courier: "XYZ-0009",
            status: "Active",
            dispatchat: "28-8-2026",
            action: "Active",
        }
    ];
</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Order Dispatch </h2>            

            <div class="flex gap-2">
                <button class="common-button" @click="orderDispatchModal = true;"> + Order Dispatch </button>
            </div>
        </div>

        <!-- Modal -->
        <div v-if="orderDispatchModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="orderDispatchModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Order Dispatch</h3>
                <p>Search and select one or more orders</p>
                <div class="flex items-center justify-between mt-2 mb-2 rounded-lg bg-gray-100 p-4">
                    <!-- Step 1 -->
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-semibold">
                            1
                        </span>
                        <div>
                            <strong class="block text-sm text-gray-800"> Select orders </strong>
                            <p class="text-xs text-gray-500 mt-1">Choose items to dispatch</p>
                        </div>
                    </div>
                    <!-- Connecting Line -->
                    <div class="mx-4 h-0.5 flex-1 bg-gray-300"></div>
                    <!-- Step 2 -->
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-600 font-semibold">
                            2
                        </span>
                        <div>
                            <strong class="block text-sm text-gray-800"> Dispatch details </strong>
                            <p class="text-xs text-gray-500 mt-1">Review details and save</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-2 rounded-lg bg-gray-100 p-2">
                    <strong>Search Orders</strong>
                    <p>Enter multiple order numbers comma separated.</p>
                    <div class="mt-2 flex gap-2">
                        <input class="input-style min-w-0 flex-1" type="text" placeholder="Search dispatch, order or tracking..." />
                        <button class="common-button h-11"> Search </button>
                    </div>
                </div>
                <div class="mt-2 rounded-lg border border-gray-200 p-2">
                    <div class="flex gap-2"><span>0</span><span>orders found</span><span>1</span><span>not found</span></div>
                    <hr>
                    <div class="flex items-center justify-center gap-2 p-2 text-gray-500">
                        <MappedIcon /> No orders found
                    </div>
                </div>

                <div class="mt-2 rounded-lg bg-yellow-200 border border-gray-200 p-2">
                    <div class="flex gap-2 mb-2"><FailedIcon /><span>0</span><span>order not found</span></div>
                    <hr>
                    <div class="flex flex-wrap gap-2 text-gray-500 mt-2">
                        <span class="p-2 rounded-lg bg-yellow-600 text-white">Order number 123</span>
                        <span class="p-2 rounded-lg bg-yellow-600 text-white">Order number 456</span>
                    </div>
                </div>

                <div class="flex gap-2 mt-2 justify-end">
                    <button class="common-button"> Confirm </button>
                    <button class="common-button"> Continue-> </button>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card-main-div">
            <div class="grid grid-cols-1"> <input class="input-style" type="text" name="" placeholder="Search dispatch, order or tracking..."> </div>
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
                    <option value="" disabled>Select Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Ready">Ready</option>
                    <option value="Dispatched">Dispatched</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
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
                            <th class="table-th">Dispatch</th>
                            <th class="table-th">Warehouse</th>
                            <th class="table-th">Items</th>
                            <th class="table-th">Quantity</th>
                            <th class="table-th">Courier</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Dispatched By</th>
                            <th class="table-th">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="OrderDispatch in OrderDispatchs" :key="OrderDispatch.id" class="hover:bg-gray-50">
                            <td class="table-td"> {{ OrderDispatch.dispatch }} </td>
                            <td class="table-td"> {{ OrderDispatch.warehouse }} </td>
                            <td class="table-td"> {{ OrderDispatch.items }} </td>
                            <td class="table-td"> {{ OrderDispatch.qty }} </td>
                            <td class="table-td"> {{ OrderDispatch.courier }} </td>
                            <td class="table-td"> {{ OrderDispatch.status }} </td>
                            <td class="table-td"> {{ OrderDispatch.dispatchat }} </td>
                            <td class="table-td"> <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">{{ OrderDispatch.action }}</span> </td>
                            <td class="table-td">
                                <button> <EditIcon /> </button>
                                <button> <DeleteIcon /> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>