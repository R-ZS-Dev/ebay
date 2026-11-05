<script setup lang="ts">
    import AppLayout from "../../components/AppLayout.vue";
    import { ref } from "vue";
    import DownloadIcon from "../../components/icons/DownloadIcon.vue";
    const activeTab = ref("skuRecordTab");
    const selectedChannel = ref('');
    const selectedShop = ref('');
    const selectedCategory = ref('');
    const selectedSubCategory = ref('');

    // Created SKU Record Table
    const createdSkuRecords = [
        {
            id: 1,
            created_at: "8/24/2026, 6:16:11 PM",
            channel: "Channel 1",
            shop: "Shop 1",
            product_id: "786",
            product: "ABC-001",
            product_sku: "Master_product_size_color",
            listing: "228",
            sku_code: "seller_channel_shop_product_size_color_prefix_packof",
            fulfilment: "Seller",
            pack_qty: "2",
            created_by: "User1",
        }
    ];

    // Mapped SKU Table
    const mappedSkuRecords = [
        {
            id: 1,
            listing: "228",
            channel: "Channel 1",
            shop: "Shop 1",
            product: "ABC-001",
            sku_code: "seller_channel_shop_product_size_color_prefix_packof",
            variation_sku_code: "seller_channel_shop_product_size_color_prefix_packof",
            product_sku: "Master_product_size_color",
            price: 0.5,
            quantity: "2"
        }
    ];

    // Mapped SKU Table
    const unmappedSkuRecords = [
        {
            id: 1,
            listing: "228",
            channel: "Channel 1",
            shop: "Shop 1",
            product: "ABC-001",
            sku_code: "seller_channel_shop_product_size_color_prefix_packof",
            variation_sku_code: "seller_channel_shop_product_size_color_prefix_packof",
            product_sku: "Master_product_size_color",
            price: 0.5,
            quantity: "2"
        }
    ];
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> SKU Record </h2>

        <div class="flex border-b border-gray-200">
            <div class="flex w-full">
                <button type="button" @click="activeTab = 'skuRecordTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg',
                        activeTab === 'skuRecordTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    Created SKU Records
                </button>
                <button type="button" @click="activeTab = 'mappedRecordTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg',
                        activeTab === 'mappedRecordTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    Mapped SKU Records
                </button>
                <button type="button" @click="activeTab = 'unMappedRecordTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg',
                        activeTab === 'unMappedRecordTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    UnMapped SKU Records
                </button>
                <button type="button" @click="activeTab = 'combineSkuTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg',
                        activeTab === 'combineSkuTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    Combine SKU Records
                </button>
            </div>
        </div>

        <!-- Created SKU Record Section -->
        <div v-if="activeTab === 'skuRecordTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="card-main-div grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Start & End Date -->
                <input class="input-style" type="date" name="" />
                <input class="input-style" type="date" name="" />
                <!-- Channel -->
                <select v-model="selectedChannel" class="select-option" name="" id="">
                    <option value="" disabled>Select Channel</option>
                    <option value="Channel 1">Channel 1</option>
                    <option value="Channel 2">Channel 2</option>
                    <option value="Channel 3">Channel 3</option>
                </select>
                <!-- Shop -->
                <select v-model="selectedShop" class="select-option" name="" id="">
                    <option value="" disabled>Select Shop</option>
                    <option value="Shope 1">Shope 1</option>
                    <option value="Shope 2">Shope 2</option>
                    <option value="Shope 3">Shope 3</option>
                </select>
                <!-- Category -->
                <select v-model="selectedCategory" class="select-option" name="" id="">
                    <option value="" disabled>Category</option>
                    <option value="Category 1">Category 1</option>
                    <option value="Category 2">Category 2</option>
                    <option value="Category 3">Category 3</option>
                </select>
                <!-- Sub Category -->
                <select v-model="selectedSubCategory" class="select-option" name="" id="">
                    <option value="" disabled>Sub Category</option>
                    <option value="Sub Category 1">Sub Category 1</option>
                    <option value="Sub Category 2">Sub Category 2</option>
                    <option value="Sub Category 3">Sub Category 3</option>
                </select>
                <input class="input-style"  type="text" name=""
                    placeholder="Search order..."
                />

                <button class="common-button">Clear Filter</button>
            </div>

            <!-- Created SKU Record Table -->
            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-3">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Created At</th>
                                <th class="table-th">Channel</th>
                                <th class="table-th">Shop</th>
                                <th class="table-th">Product ID</th>
                                <th class="table-th">Product</th>
                                <th class="table-th">Product SKU</th>
                                <th class="table-th">Listing#</th>
                                <th class="table-th">SKU Code</th>
                                <th class="table-th">Fullfilment</th>
                                <th class="table-th">Pack QTY</th>
                                <th class="table-th">Created By</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="createdSkuRecord in createdSkuRecords" :key="createdSkuRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ createdSkuRecord.created_at }} </td>
                                <td class="table-td" > {{ createdSkuRecord.channel }} </td>
                                <td class="table-td" > {{ createdSkuRecord.shop }} </td>
                                <td class="table-td" > {{ createdSkuRecord.product_id }} </td>
                                <td class="table-td" > {{ createdSkuRecord.product }} </td>
                                <td class="table-td" > {{ createdSkuRecord.product_sku }} </td>
                                <td class="table-td" > {{ createdSkuRecord.listing }} </td>
                                <td class="table-td" > {{ createdSkuRecord.sku_code }} </td>
                                <td class="table-td" > {{ createdSkuRecord.fulfilment }} </td>
                                <td class="table-td" > {{ createdSkuRecord.pack_qty }} </td>
                                <td class="table-td" > {{ createdSkuRecord.created_by }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Mapped SKU Record -->
        <div v-if="activeTab === 'mappedRecordTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="card-main-div grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4" >
                <!-- Channel -->
                <select class="select-option" name="" id="">
                    <option value="Channel">Channel</option>
                </select>
                <!-- Shop -->
                <select class="select-option" name="" id="">
                    <option value="Shop">Shop</option>
                </select>
                <input class="input-style" type="text" name=""
                    placeholder="Search listing id / sku / title"
                />

                <div class="flex gap-2">
                    <button class="common-button flex-1">Clear Filter</button>
                    <button class="common-button flex items-center gap-2"> <DownloadIcon /> Export</button>
                </div>
            </div>

            <!-- Mapped SKU Record -->
            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-3">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Listing#</th>
                                <th class="table-th">Channel</th>
                                <th class="table-th">Shop</th>
                                <th class="table-th">Product</th>
                                <th class="table-th">SKU Code</th>
                                <th class="table-th">Variation SKU</th>
                                <th class="table-th">Product SKU</th>
                                <th class="table-th">Price</th>
                                <th class="table-th">Quantity</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="mappedSkuRecord in mappedSkuRecords" :key="mappedSkuRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ mappedSkuRecord.listing }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.channel }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.shop }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.product }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.sku_code }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.variation_sku_code }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.product_sku }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.price }} </td>
                                <td class="table-td" > {{ mappedSkuRecord.quantity }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- UnMapped SKU Record -->
        <div v-if="activeTab === 'unMappedRecordTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="card-main-div grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4" >
                <!-- Channel -->
                <select class="select-option" name="" id="">
                    <option value="Channel">Channel</option>
                </select>
                <!-- Shop -->
                <select class="select-option" name="" id="">
                    <option value="Shop">Shop</option>
                </select>
                <input class="input-style" type="text" name=""
                    placeholder="Search listing id / sku / title"
                />

                <div class="flex gap-2">
                    <button class="common-button flex-1">Clear Filter</button>
                    <button class="common-button flex items-center gap-2"> <DownloadIcon /> Export</button>
                </div>

                <input class="input-style" type="file" name="" />
                <select class="select-option" name="" id="">
                    <option value="Single">Single</option>
                    <option value="Combine">Combine</option>
                </select>

                <div class="flex gap-2">
                    <button class="common-button flex-1">Upload & Map</button>
                    <button class="common-button flex-1">Clear</button>
                </div>
                
                <div class="flex gap-2">
                    <button class="common-button flex flex-1 items-center justify-center gap-2"> <DownloadIcon /> <a href="/templates/unmap-sku-template.csv" download> Download Template </a> </button>
                </div>
            </div>

            <!-- UnMapped SKU Record -->
            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-3">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Listing#</th>
                                <th class="table-th">Channel</th>
                                <th class="table-th">Shop</th>
                                <th class="table-th">Product</th>
                                <th class="table-th">SKU Code</th>
                                <th class="table-th">Variation SKU</th>
                                <th class="table-th">Product SKU</th>
                                <th class="table-th">Price</th>
                                <th class="table-th">Quantity</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="unmappedSkuRecord in unmappedSkuRecords" :key="unmappedSkuRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ unmappedSkuRecord.listing }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.channel }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.shop }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.product }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.sku_code }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.variation_sku_code }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.product_sku }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.price }} </td>
                                <td class="table-td" > {{ unmappedSkuRecord.quantity }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Combined SKU Record -->
        <div v-if="activeTab === 'combineSkuTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="card-main-div grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4" >
                <input class="input-style lg:col-span-2" type="file" name="" />
                <button class="common-button flex-1">Upload</button>
                <button class="common-button flex flex-1 items-center justify-center gap-2"> <DownloadIcon /> <a href="/templates/combine-sku-template.csv" download> Download Template </a> </button>
            </div>
        </div>
    </AppLayout>
</template>
