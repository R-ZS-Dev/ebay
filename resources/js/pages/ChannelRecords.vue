<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Channel Record </h2>
            <div class="flex gap-2">
                <button class="common-button flex gap-2"> <DownloadIcon /> Export</button>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex justify-content-center gap-2">
                    <ListingIcon /> <span class="text-xl">Total Listing</span>                    
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">1,586</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex justify-content-center gap-2">
                    <VariationIcon /> <span class="text-xl">Total Variation</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">5,684</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex justify-content-center gap-2">
                    <IntegrationIcon/> <span class="text-xl">Total Mapped Listing</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-green-800">3,814</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex justify-content-center gap-2">
                    <MappedIcon/> <span class="text-xl">Total Mapped Variation</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-green-800">7,354</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="card-main-div">
            <div class="grid grid-cols-1"> 
                <input class="input-style" type="text" name="" placeholder="Search record..."> 
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
            <!-- Status -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Status</option>
                    <option value="Matched">Matched</option>
                    <option value="Unmatched">Unmatched</option>
                </select> 
            </div>
            <!-- Out Of Stock -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Out of Stock</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> 
            </div>
            <!-- Pre Order -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Pre Order</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> 
            </div>
            <div class="grid grid-cols-1"> <button class="common-button">Refresh</button> </div>
            <div class="grid grid-cols-1"> <button class="common-button">Clear Filter</button> </div>
        </div>

        <!-- Record Table -->
        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">Channel</th>
                            <th class="table-th">Shop</th>
                            <th class="table-th">Master SKU</th>
                            <th class="table-th">Listing #</th>
                            <th class="table-th">Channel SKU</th>
                            <th class="table-th">Title</th>
                            <th class="table-th">Variations</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            v-for="channelrecordtable in channelrecordtables"
                            :key="channelrecordtable.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="table-td" > {{ channelrecordtable.channel }} </td>
                            <td class="table-td" > {{ channelrecordtable.shop }} </td>
                            <td class="table-td" > {{ channelrecordtable.lisitngnumber }} </td>
                            <td class="table-td" > {{ channelrecordtable.masterSKU }} </td>
                            <td class="table-td" > {{ channelrecordtable.channelSKU }} </td>
                            <td class="table-td" > {{ channelrecordtable.title }} </td>
                            <td class="table-td" > {{ channelrecordtable.totalVariation }} </td>

                            <td class="table-td">
                                <button class="group relative mr-2" @click="openViewDetailModal(channelrecordtable)">
                                    <EyeIcon />
                                    <span
                                        class="absolute left-1/2 top-full z-10 hidden -translate-x-1/2 whitespace-nowrap
                                        rounded bg-black px-2 py-1 text-xs text-white group-hover:block"
                                    >
                                        View Details
                                    </span>
                                </button>
                                <button class="group relative mr-2" @click="openOutOfStockModal(channelrecordtable)">
                                    <OutofStock />
                                    <span
                                        class="absolute left-1/2 top-full z-10 hidden -translate-x-1/2 whitespace-nowrap
                                        rounded bg-black px-2 py-1 text-xs text-white group-hover:block"
                                    >
                                        Out of Stock
                                    </span>
                                </button>
                                <button class="group relative mr-2" @click="openPreOrderModal(channelrecordtable)">
                                    <PreOrderIcon />
                                    <span
                                        class="absolute left-1/2 top-full z-10 hidden -translate-x-1/2 whitespace-nowrap
                                        rounded bg-black px-2 py-1 text-xs text-white group-hover:block"
                                    >
                                        Pre Order
                                    </span>
                                </button>
                                <button class="group relative mr-2" @click="openListingModal(channelrecordtable)">
                                    <ListingIcon />
                                    <span
                                        class="absolute left-1/2 top-full z-10 hidden -translate-x-1/2 whitespace-nowrap
                                        rounded bg-black px-2 py-1 text-xs text-white group-hover:block"
                                    >
                                        View Listing
                                    </span>
                                </button>
                                <label class="inline-flex cursor-pointer items-center mt-2" title="Inctivate Category">
                                    <input v-model="switch1" type="checkbox" class="peer sr-only" >
                                    <div class="switch-toggle-button" ></div>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- View Detail Modal -->
        <div v-if="showViewDetailModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="showViewDetailModal = false" > X </button>
                <h3 class="modal-inner-heading"> View Channel Record </h3>

                <div v-if="selectedChannelRecord" class="mt-4 space-y-3 text-left" >
                    <p> <strong>Channel:</strong> {{ selectedChannelRecord.sku }} </p>
                    <p> <strong>Shop:</strong> {{ selectedChannelRecord.name }} </p>
                    <p> <strong>Category:</strong> {{ selectedChannelRecord.category }} </p>
                    <p> <strong>Price:</strong> {{ selectedChannelRecord.price }} </p>
                    <p> <strong>Stock:</strong> {{ selectedChannelRecord.stock }} </p>
                    <p> <strong>Status:</strong> {{ selectedChannelRecord.status }} </p>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="button" class="cancel-button" @click="showViewDetailModal = false" > Close </button>
                </div>
            </div>
        </div>

        <!-- Out of Stock Modal -->
        <div v-if="showOutOfStockModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="showOutOfStockModal = false">
                    X
                </button>

                <h3 class="modal-inner-heading"> Out of Stock </h3>

                <div v-if="selectedOutOfStockRecord" class="mt-4 space-y-2 text-left" >
                    <p> <strong>Channel:</strong> {{ selectedOutOfStockRecord.sku }} </p>
                    <p> <strong>Shop:</strong> {{ selectedOutOfStockRecord.name }} </p>
                    <p> <strong>Category:</strong> {{ selectedOutOfStockRecord.category }} </p>
                    <p> <strong>Current Stock:</strong> {{ selectedOutOfStockRecord.stock }} </p>
                </div>

                <p class="mt-4 text-gray-600"> Are you sure you want to mark this record as out of stock? </p>

                <div class="mt-6 flex justify-center gap-2">
                    <button type="button" class="cancel-button" @click="showOutOfStockModal = false" > Cancel </button>
                    <button type="button"class="confirm-button"@click="confirmOutOfStock"> Confirm </button>
                </div>
            </div>
        </div>

        <!-- View Listing Modal -->
        <div v-if="showlistingModal" class="modal-outer-div">
            <div class="modal-inner-div">

                <button
                    type="button"
                    class="modal-cross-sign"
                    @click="showlistingModal = false"
                >
                    X
                </button>

                <h3 class="modal-inner-heading">
                    View Listing
                </h3>

                <div
                    v-if="ShowListingModalRecord"
                    class="mt-4 space-y-2 text-left"
                >
                    <p>
                        <strong>Channel:</strong>
                        {{ ShowListingModalRecord.sku }}
                    </p>

                    <p>
                        <strong>Shop:</strong>
                        {{ ShowListingModalRecord.name }}
                    </p>

                    <p>
                        <strong>Category:</strong>
                        {{ ShowListingModalRecord.category }}
                    </p>

                    <p>
                        <strong>Price:</strong>
                        {{ ShowListingModalRecord.price }}
                    </p>

                    <p>
                        <strong>Stock:</strong>
                        {{ ShowListingModalRecord.stock }}
                    </p>

                    <p>
                        <strong>Status:</strong>
                        {{ ShowListingModalRecord.status }}
                    </p>
                </div>

                <div class="mt-6 flex justify-center">
                    <button
                        type="button"
                        class="cancel-button"
                        @click="showlistingModal = false"
                    >
                        Close
                    </button>
                </div>

            </div>
        </div>

    </AppLayout>
</template>

<script setup lang="ts">
    import AppLayout from '../components/AppLayout.vue';
    import DownloadIcon from '../components/icons/DownloadIcon.vue';
    import IntegrationIcon from '../components/icons/IntegrationIcon.vue';
    import ListingIcon from '../components/icons/ListingIcon.vue';
    import EyeIcon from '../components/icons/EyeIcon.vue';
    import MappedIcon from '../components/icons/MappedIcon.vue';
    import VariationIcon from '../components/icons/VariationIcon.vue';
    import OutofStock from '../components/icons/OutofStock.vue';
    import PreOrderIcon from '../components/icons/PreOrderIcon.vue';
    import { ref } from 'vue';
    const switch1 = ref(false);
    const showViewDetailModal = ref(false);
    const selectedChannelRecord = ref<any>(null);
    const showOutOfStockModal = ref(false);
    const selectedOutOfStockRecord = ref<any>(null);
    const showPreOrderModal = ref(false);
    const selectedPreOrderModalRecord = ref<any>(null);
    const showlistingModal = ref(false);
    const ShowListingModalRecord = ref<any>(null);

    const openViewDetailModal = (record: any) => {
        selectedChannelRecord.value = { ...record };
        showViewDetailModal.value = true;
    };

    const openOutOfStockModal = (record: any) => {
        selectedOutOfStockRecord.value = { ...record };
        showOutOfStockModal.value = true;
    };

    const confirmOutOfStock = () => {
        showOutOfStockModal.value = false;
    };

    const confirmPreOrder = () => {
        showPreOrderModal.value = false;
    };

    const openPreOrderModal = (record: any) => {
        selectedPreOrderModalRecord.value = { ...record };
        showPreOrderModal.value = true;
    };

    const openListingModal = (record: any) => {
        ShowListingModalRecord.value = { ...record };
        showlistingModal.value = true;
    };

    const channelrecordtables = [
        {
            id: 1,
            channel: "Channel 1",
            shop: "Shop 1",
            lisitngnumber: 123546,
            masterSKU: "master_sku_size_color_1",
            channelSKU: "channel_child_sku",
            title: "Title 1",
            totalVariation: 25,
        },
        {
            id: 2,
            channel: "Channel 2",
            shop: "Shop 2",
            lisitngnumber: 123546,
            masterSKU: "master_sku_size_color_2",
            channelSKU: "channel_child_sku",
            title: "Title 2",
            totalVariation: 10,
        },
        {
            id: 3,
            channel: "Channel 3",
            shop: "Shop 3",
            lisitngnumber: 123546,
            masterSKU: "master_sku_size_color_3",
            channelSKU: "channel_child_sku",
            title: "Title 3",
            totalVariation: 40,
        },
    ];
</script>
