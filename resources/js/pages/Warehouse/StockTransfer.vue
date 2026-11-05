<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import { ref } from 'vue';
    const activeTab = ref("stockTransferDemandTab")
    const editUserModal = ref(false);
    const deleteUserModal = ref(false);
    const newDemandModal = ref(false);
    const selectedSupplyingWarehouse = ref('');
    const selectedRequestingWarehouse = ref('');
    const viewStockTransfarModal = ref(false);
    const viewTransfarVoucherModal = ref(false);
    const approvedStockTransfarModal = ref(false);
    const rejectedStockTransfarModal = ref(false);
    const cancelStockTransfarModal = ref(false);

    const demandItems = ref([ { product: '', quantity: 1 } ]);
    const addDemandItem = () => {  demandItems.value.push({ product: '', quantity: 1 }); };
    const removeDemandItem = (index: number) => { demandItems.value.splice(index, 1); };
    
    import UsersIcon from "../../components/icons/UsersIcon.vue";
    import ActiveIcon from '../../components/icons/ActiveIcon.vue';
    import RoleIcon from '../../components/icons/RoleIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import MappedIcon from '../../components/icons/MappedIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';
    import ResetIcon from '../../components/icons/ResetIcon.vue';

    // stockTransferDemands Table
    const stockTransferDemands = [
        {
            id: 1,
            name: "ABC-001",
            username: "XYZ-001",
            email: "abc@xyz.com",
            role: "user",
            status: "Requested",
        },
    ];

    // stockTransferVouchers Table
    const stockTransferVouchers = [
        {
            id: 1,
            name: "ABC-001",
            username: "XYZ-001",
            email: "abc@xyz.com",
            role: "user",
            status: "Requested",
        },
    ];

</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Stock Transfers </h2>
            <div class="flex gap-2">
                <button class="common-button" @click="newDemandModal = true"> + New Demand </button>
            </div>
        </div>
        <p>Demand, voucher, dispatch, receive and confirmation flow for warehouse-to-warehouse stock movement.</p>

        <!-- New Demand Modal -->
        <div v-if="newDemandModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="newDemandModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Create Stock Demand</h3>
                <hr>
                <div class="mt-2">
                    <form action="" method="POST">
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>                                    
                                <select v-model="selectedSupplyingWarehouse" class="select-option" name="" id="">
                                    <option value="" disabled>Supplying warehouse</option>
                                    <option value="warehouse 1">warehouse 1</option>
                                    <option value="warehouse 2">warehouse 2</option>
                                </select>
                            </div>
                            <div>
                                <select v-model="selectedRequestingWarehouse" class="select-option" name="" id="">
                                    <option value="" disabled>Requesting warehouse</option>
                                    <option value="warehouse 1">warehouse 1</option>
                                    <option value="warehouse 2">warehouse 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <textarea name="" class="w-full border border-gray-300 p-2 rounded-lg" rows="3" placeholder="Remarks"></textarea>
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <strong for="">Items</strong>
                                <button type="button"class="common-button"@click="addDemandItem">Add More Items</button>
                            </div>
                            <div class="grid grid-cols-12 gap-4 mt-2" v-for="(item, index) in demandItems" :key="index">
                                <div class="col-span-6">
                                    <select v-model="item.product" class="select-option" >
                                        <option value="" disabled> Products </option>
                                        <option value="Product 1"> Product 1 </option>
                                        <option value="Product 2"> Product 2 </option>
                                    </select>
                                </div>
                                <div class="col-span-4"> <input v-model="item.quantity" type="number" class="input-style" placeholder="Enter quantity" > </div>
                                <div class="col-span-2 flex items-center justify-center"> <button type="button" @click="removeDemandItem(index)" :disabled="demandItems.length === 1" class="cursor-pointer" > <DeleteIcon /> </button> </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="mt-2 flex justify-end"> <button class="common-button"> Save </button> </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex items-center gap-2">
                    <PendingIcon /> <span class="text-xl">Requested Demands</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">80</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex items-center gap-2">
                    <ActiveIcon/> <span class="text-xl">Approved Demands</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-green-800">16</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex items-center gap-2">
                    <ActiveIcon /> <span class="text-xl">Ready Vouchers</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">50</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex items-center gap-2">
                    <MappedIcon /> <span class="text-xl">Confirmed</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">12</p>
            </div>
        </div>

        <div class="flex border-b border-gray-200 mt-2">
            <div class="flex w-full">
                <button type="button" @click="activeTab = 'stockTransferDemandTab'" :class="[ 'flex-1 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'stockTransferDemandTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                   <UsersIcon/> Stock Transfer Demand
                </button>
                <button type="button" @click="activeTab = 'stockTransferVoucherTab'" :class="[ 'flex-1 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'stockTransferVoucherTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    <RoleIcon/> Stock Transfer Voucher
                </button>
            </div>
        </div>

        <!-- Stock Transfer Demands -->
        <div v-if="activeTab === 'stockTransferDemandTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class=" flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800"> Stock Transfer Demands </h2>
                <div class="w-2/4 rounded-lg bg-white p-2 shadow"> 
                    <input type="text" placeholder="Search..." class="w-full border-0 outline-none focus:border-0 focus:outline-none focus:ring-0" > 
                </div>
            </div>

            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Demand#</th>
                                <th class="table-th">Route</th>
                                <th class="table-th">Status</th>
                                <th class="table-th">Items</th>
                                <th class="table-th">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="stockTransferDemand in stockTransferDemands" :key="stockTransferDemand.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ stockTransferDemand.name }} </td>
                                <td class="table-td" > {{ stockTransferDemand.username }} </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium" >
                                        {{ stockTransferDemand.status }}
                                    </span> 
                                </td>
                                <td class="table-td" > {{ stockTransferDemand.role }} </td>
                                <td class="table-td" > 
                                    <div class="flex items-center gap-2">
                                        <button @click="viewStockTransfarModal = true" class="px-3 py-1 text-xs border-1 rounded font-medium text-blue-700">
                                            View
                                        </button>
                                        <button @click="approvedStockTransfarModal = true" class="px-3 py-1 text-xs border-1 rounded font-medium text-green-700">
                                            Approved
                                        </button>
                                        <button @click="rejectedStockTransfarModal = true" class="px-3 py-1 text-xs border-1 rounded font-medium text-red-700">
                                            Rejected
                                        </button>
                                        <button @click="cancelStockTransfarModal = true" class="px-3 py-1 text-xs border-1 rounded font-medium text-red-700">
                                            Cancel
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div v-if="editUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="editUserModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Edit User Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Update  </button>
                    </div>
                </div>
            </div>

            <!-- Delete User Modal -->
            <div v-if="deleteUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deleteUserModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Delete User Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- View Stock Transfer Modal -->
            <div v-if="viewStockTransfarModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-5xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="viewStockTransfarModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Demand Product Name</h3>
                    <hr>
                    <div class="grid grid-cols-3">
                        <div class="bg-gray-200 p-2">
                            <div> <strong>Type: </strong> </div>
                            <div> <strong>Status: </strong> </div>
                            <div> <strong>Route: </strong> </div>
                        </div>
                        <div class="bg-gray-200 p-2">
                            <div> <strong>Created By: </strong> </div>
                            <div> <strong>Dispatched By: </strong> </div>
                            <div> <strong>Acknowledged By: </strong> </div>
                            <div> <strong>Confirmed By: </strong> </div>
                        </div>
                        <div class="bg-gray-200 p-2">
                            <div> <strong>Product:</strong> Pro - 1 </div>
                            <div> <strong>SKU:</strong> SKU - 1 </div>
                            <div> <strong>Requested:</strong> ABC - 1 </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 bg-white rounded-lg shadow mt-2 overflow-x-auto"> 
                        <strong>Status</strong>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th>Approved</th>
                                    <th>Dispatched</th>
                                    <th>Received</th>
                                    <th>Confirmed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="p-2">
                                    <td>Accept/Reject</td>
                                    <td>Accept/Reject</td>
                                    <td>Accept/Reject</td>
                                    <td>Accept/Reject</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2 flex justify-end"> <button class="common-button" > Confirm  </button> </div>
                </div>
            </div>

            <!-- Approved Stock Transfer Modal -->
            <div v-if="approvedStockTransfarModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="approvedStockTransfarModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Approved Stock Transfer Modal</h3>

                    <div class="mt-2 flex justify-end"> <button class="common-button" > Confirm </button> </div>
                </div>
            </div>

            <!-- Rejected Stock Transfer Modal -->
            <div v-if="rejectedStockTransfarModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="rejectedStockTransfarModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Rejected Stock Transfer Modal</h3>
                    <hr>
                    <div class="bg-yellow-200 mt-2 p-1">
                        <label for="">Please explain why Demand #name is being rejected.</label>
                    </div>

                    <textarea name="" class="w-full border-1 mt-2" id="" cols="5" rows="5"></textarea>

                    <div class="mt-2 flex justify-end"> <button class="common-button" > Confirm </button> </div>
                </div>
            </div>

            <!-- Cancel Stock Transfer Modal -->
            <div v-if="cancelStockTransfarModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="cancelStockTransfarModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Cancel Stock Transfer Modal</h3>

                    <div class="mt-2 flex justify-end"> <button class="common-button" > Confirm </button> </div>
                </div>
            </div>
        </div>

        <!-- Stock Transfer Vouchers -->
        <div v-if="activeTab === 'stockTransferVoucherTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class=" flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800"> Stock Transfer Vouchers </h2>
                <button class="flex gap-2"> <ResetIcon /> Refresh</button>
            </div>

            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Demand#</th>
                                <th class="table-th">Route</th>
                                <th class="table-th">Status</th>
                                <th class="table-th">Items</th>
                                <th class="table-th">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="stockTransferDemand in stockTransferDemands" :key="stockTransferDemand.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ stockTransferDemand.name }} </td>
                                <td class="table-td" > {{ stockTransferDemand.username }} </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium" >
                                        {{ stockTransferDemand.status }}
                                    </span> 
                                </td>
                                <td class="table-td" > {{ stockTransferDemand.role }} </td>
                                <td class="table-td" > 
                                    <div class="flex items-center gap-2">
                                        <button @click="viewTransfarVoucherModal = true" class="px-3 py-1 text-xs border-1 rounded font-medium text-blue-700">
                                            View
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- View Stock Transfer Modal -->
            <div v-if="viewTransfarVoucherModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-5xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="viewTransfarVoucherModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Demand Product Name</h3>
                    <hr>
                    <div class="grid grid-cols-3">
                        <div class="bg-gray-200 p-2">
                            <div> <strong>Type: </strong> </div>
                            <div> <strong>Status: </strong> </div>
                            <div> <strong>Route: </strong> </div>
                        </div>
                        <div class="bg-gray-200 p-2">
                            <div> <strong>Created By: </strong> </div>
                            <div> <strong>Dispatched By: </strong> </div>
                            <div> <strong>Acknowledged By: </strong> </div>
                            <div> <strong>Confirmed By: </strong> </div>
                        </div>
                        <div class="bg-gray-200 p-2">
                            <div> <strong>Product:</strong> Pro - 1 </div>
                            <div> <strong>SKU:</strong> SKU - 1 </div>
                            <div> <strong>Requested:</strong> ABC - 1 </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 bg-white rounded-lg shadow mt-2 overflow-x-auto"> 
                        <strong>Status</strong>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th>Approved</th>
                                    <th>Dispatched</th>
                                    <th>Received</th>
                                    <th>Confirmed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="p-2">
                                    <td>Accept/Reject</td>
                                    <td>Accept/Reject</td>
                                    <td>Accept/Reject</td>
                                    <td>Accept/Reject</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2 flex justify-end"> <button class="common-button" > Confirm  </button> </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>