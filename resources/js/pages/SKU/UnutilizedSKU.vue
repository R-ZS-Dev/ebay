<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import ResetIcon from '../../components/icons/ResetIcon.vue';
    import SyncIcon from '../../components/icons/SyncIcon.vue';
    import { ref } from 'vue';
    // For Modals
    const resetSKUModal = ref(false);
    const deleteSKUModal = ref(false);
    const restoreSKUModal = ref(false);

    const resetSKU = () => { resetSKUModal.value = false; };
    const deleteSKU = () => { deleteSKUModal.value = false; };
    const restoreSKU = () => { restoreSKUModal.value = false; };

    // Table record
    const selectedRecords = ref<number[]>([]);

    const UnutlizeSKURecords = [
        {
            id: 1,
            channel: "Channel 1",
            shop: "Shop 1",
            listingid: "2354-525",
            channelsku: "sku-channel",
            mastersku: "sku-master",
            next45days: "24-09-2027",
            day45counter: 25,
            createdby: "User Name",
        },
        {
            id: 2,
            channel: "Channel 2",
            shop: "Shop 2",
            listingid: "2354-151",
            channelsku: "sku-channel2",
            mastersku: "sku-master2",
            next45days: "08-08-2027",
            day45counter: 35,
            createdby: "User Name2",
        },
        {
            id: 3,
            channel: "Channel 3",
            shop: "Shop 3",
            listingid: "2114-525",
            channelsku: "sku-channel3",
            mastersku: "sku-master3",
            next45days: "24-04-2027",
            day45counter: 15,
            createdby: "User Name3",
        },
    ];
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> Unutilized SKU Record </h2>

        <!-- Filters -->
        <div class="card-main-div">
            <div class="grid grid-cols-1"> 
                <input class="input-style" type="text" name="" placeholder="Search listing# / sku / title/ external ids..."> 
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
            <!-- Category -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Category</option>
                    <option value="Cat 1">Cat 1</option>
                    <option value="Cat 2">Cat 2</option>
                </select> 
            </div>
            <!-- Sub Category -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Sub Category</option>
                    <option value="Sub Cat 1">Sub Cat 1</option>
                    <option value="Sub Cat 2">Sub Cat 2</option>
                </select> 
            </div>
            <!-- Pre Order -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Select Days</option>
                    <option value="0 to 15 days">0 to 15 days</option>
                    <option value="15 to 30 days">15 to 30 days</option>
                    <option value="30 to 45 days">30 to 45 days</option>
                </select> 
            </div>
            <div class="grid grid-cols-1"> <button class="common-button">Refresh</button> </div>
            <div class="grid grid-cols-1"> <button class="common-button">Clear Filter</button> </div>
        </div>
        <!-- Buttons -->
         <div class="flex justify-end mt-2 gap-2">
            <button class="common-button flex gap-2"> <DownloadIcon/> Export</button>
            <button class="common-button flex gap-2" @click="resetSKUModal = true"> <ResetIcon/> Reset</button>
            <button class="common-button flex gap-2" @click="deleteSKUModal = true"> <DeleteIcon/> Delete</button>
            <button class="common-button flex gap-2" @click="restoreSKUModal = true"> <SyncIcon/> Restore</button>
        </div>

        <!-- Record Table -->
        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">
                                <input
                                    type="checkbox"
                                    :checked="selectedRecords.length === UnutlizeSKURecords.length"
                                    @change="selectedRecords = selectedRecords.length === UnutlizeSKURecords.length ? [] : UnutlizeSKURecords.map(record => record.id)"
                                    class="h-4 w-4 rounded border-gray-300"
                                />
                            </th>
                            <th class="table-th">Channel</th>
                            <th class="table-th">Shop</th>
                            <th class="table-th">Listing ID</th>
                            <th class="table-th">Channel SKU</th>
                            <th class="table-th">Master SKU</th>
                            <th class="table-th">Next 45-Days Date</th>
                            <th class="table-th">45-Day Counter</th>
                            <th class="table-th">Created By</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            v-for="UnutlizeSKURecord in UnutlizeSKURecords"
                            :key="UnutlizeSKURecord.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="table-td">
                                <input type="checkbox" :value="UnutlizeSKURecord.id" v-model="selectedRecords" class="h-4 w-4 rounded border-gray-300" />
                            </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.channel }} </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.shop }} </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.listingid }} </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.channelsku }} </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.mastersku }} </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.next45days }} </td>
                            <td class="table-td"> 
                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                    {{ UnutlizeSKURecord.day45counter }}
                                </span> 
                            </td>
                            <td class="table-td"> {{ UnutlizeSKURecord.createdby }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Reset Modal -->
        <div v-if="resetSKUModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="resetSKUModal = false">X</button>
                <h3 class="modal-inner-heading">Reset SKU</h3>
                <p class="mt-4 text-gray-600"> Are you sure you want to reset SKU? </p>
                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="resetSKUModal = false"> Cancel </button>
                    <button class="confirm-button" @click="resetSKU"> Confirm </button>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div v-if="deleteSKUModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="deleteSKUModal = false">X</button>
                <h3 class="modal-inner-heading">Delete SKU</h3>
                <p class="mt-4 text-gray-600"> Are you sure you want to delete SKU? </p>
                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="deleteSKUModal = false"> Cancel </button>
                    <button class="confirm-button" @click="deleteSKU"> Confirm </button>
                </div>
            </div>
        </div>

        <!-- Restore Modal -->
        <div v-if="restoreSKUModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="restoreSKUModal = false">X</button>
                <h3 class="modal-inner-heading">Restore SKU</h3>
                <p class="mt-4 text-gray-600"> Are you sure you want to restore SKU? </p>
                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="restoreSKUModal = false"> Cancel </button>
                    <button class="confirm-button" @click="restoreSKU"> Confirm </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>