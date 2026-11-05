<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import { ref } from 'vue';
    import MappedIcon from '../../components/icons/MappedIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';
    import FailedIcon from '../../components/icons/FailedIcon.vue';
    import IntegrationIcon from '../../components/icons/IntegrationIcon.vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import SyncIcon from '../../components/icons/SyncIcon.vue';
    import EyeIcon from '../../components/icons/EyeIcon.vue';
    const showSyncModal = ref(false);
    const showOrderDetailModal  = ref(false);
    const selectedOrder = ref<any>(null);
    
    const orders = [
        {
            id: 1,
            order: "ABC-001",
            channel: "iPhone",
            shop: "Mobile",
            status: "Active",
            placed_date: "22-01-2024",
            pre_order: 'Yes',
        },
        {
            id: 2,
            order: "ABC-001",
            channel: "iPhone",
            shop: "Mobile",
            status: "Active",
            placed_date: "22-01-2024",
            pre_order: 'No',
        },
        {
            id: 3,
            order: "ABC-001",
            channel: "iPhone",
            shop: "Mobile",
            status: "Active",
            placed_date: "22-01-2024",
            pre_order: 'Yes',
        },
    ];

    const openOrderDetailModal = (order: any) =>{
        selectedOrder.value = {...order};
        showOrderDetailModal .value = true;
    };
</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between gap-2">
            <h2 class="text-3xl font-semibold text-gray-800"> Orders </h2>
            <div class="flex gap-2">
                <button class="common-button flex gap-2"> <DownloadIcon/> Export Orders </button>
                <button class="common-button flex gap-2" @click="showSyncModal = true"> <SyncIcon /> Sync Orders </button>
            </div>
        </div>

        <div
            v-if="showSyncModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
        >
            <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                <button
                    type="button"
                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-800"
                    @click="showSyncModal = false"
                >
                    ×
                </button>

                <h3 class="text-lg font-semibold text-gray-800">Sync Orders</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Are you sure you want to start order sync?
                </p>

                <div class="mt-2 flex justify-end gap-2">
                    <button
                        class="common-button bg-gray-200 text-gray-800 hover:bg-gray-300"
                        @click="showSyncModal = false"
                    >
                        Cancel
                    </button>

                    <button class="common-button" > Confirm  </button>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex justify-content-center gap-2">
                    <IntegrationIcon /> <span class="text-lg">Total Orders</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex justify-content-center gap-2">
                    <PendingIcon /> <span class="text-lg">Pending Orders</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">1,200</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-red-500 flex justify-content-center gap-2">
                    <FailedIcon /> <span class="text-lg">Failed Orders</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-red-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex justify-content-center gap-2">
                    <MappedIcon /> <span class="text-lg">Fulfilled Orders</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-green-800">1250</p>
            </div>
        </div>

        <div class="card-main-div">
            <div class="grid grid-cols-1"> <input class="input-style" type="text" name="" placeholder="Search order..."> </div>
            <!-- Status -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Select Order Status</option>
                    <option value="awaiting shipment">Awaiting Shipment</option>
                    <option value="awaiting dispatch">Awaiting Dispatch</option>
                    <option value="pending">Pending</option>
                    <option value="in progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="error">Error</option>
                    <option value="not started">Not Started</option>
                    <option value="paid">Paid</option>
                    <option value="fulfilled">Fulfilled</option>
                    <option value="partially refunded">Partially Refunded</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="unfulfilled">unfulfilled</option>
                    <option value="un shipping">Un Shipping</option>
                    <option value="canceled">Canceled</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="partially shipped">Partially Shipped</option>
                    <option value="partially delivered">Partially Delivered</option>
                    <option value="Unship">Unship</option>
                    <option value="Waiting Shipment">Waiting Shipment</option>
                </select> 
            </div>
            <!-- Channel -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Channel</option>
                    <option value="Channel 1">Channel 1</option>
                    <option value="Channel 2">Channel 2</option>
                </select> 
            </div>
            <!-- Shop -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Shop</option>
                    <option value="Shop 1">Shop 1</option>
                    <option value="Shop 2">Shop 2</option>
                </select> 
            </div>
            <div class="grid grid-cols-1"> <input class="input-style" type="date" name=""> </div>
            <div class="grid grid-cols-1"> <input class="input-style" type="date" name=""> </div>
            <div class="grid grid-cols-1"> <button class="common-button">Refresh</button> </div>
            <div class="grid grid-cols-1"> <button class="common-button">Clear Filter</button> </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th" >Order</th>
                            <th class="table-th" >Channel</th>
                            <th class="table-th">Shop</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Placed Date</th>
                            <th class="table-th">Pre Order</th>
                            <th class="table-th">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            v-for="order in orders"
                            :key="order.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="table-td" > {{ order.id }} </td>
                            <td class="table-td" > {{ order.order }} </td>
                            <td class="table-td" > {{ order.channel }} </td>
                            <td class="table-td" > {{ order.shop }} </td>
                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ order.status }}
                                </span>
                            </td>
                            <td class="table-td" > {{ order.placed_date }} </td>
                            <td class="table-td" > {{ order.pre_order }} </td>
                
                            <td class="table-td ">
                                <button @click="openOrderDetailModal(order)"
                                    class="flex items-center gap-1 text-blue-600 hover:text-blue-800"
                                > <EyeIcon/>
                                    Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Order Detail Modal -->
        <div v-if="showOrderDetailModal " class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="showOrderDetailModal = false">X</button>
                <h3 class="modal-inner-heading text-center">Order Detail</h3>
                <div v-if="selectedOrder" class="mt-4 space-y-2 text-gray-600">
                    <p> <strong>Order:</strong> {{ selectedOrder.order }} </p>
                    <p> <strong>Channel:</strong> {{ selectedOrder.channel }} </p>
                    <p> <strong>Shop:</strong> {{ selectedOrder.shop }} </p>
                    <p> <strong>Status:</strong> {{ selectedOrder.status }} </p>
                    <p> <strong>Placed Date:</strong> {{ selectedOrder.placed_date }} </p>
                    <p> <strong>Pre Order:</strong> {{ selectedOrder.pre_order }} </p>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
