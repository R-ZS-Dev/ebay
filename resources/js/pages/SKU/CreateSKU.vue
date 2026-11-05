<script setup lang="ts">
import AppLayout from "../../components/AppLayout.vue";
import { ref } from "vue";
import DownloadIcon from "../../components/icons/DownloadIcon.vue";
import PendingIcon from "../../components/icons/PendingIcon.vue";
const activeTab = ref("tab1");
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> Create Record </h2>

        <div class="flex border-b border-gray-200 bg-white">
            <div class="flex w-full">
                <button
                    type="button"
                    @click="activeTab = 'tab1'"
                    :class="[
                        'w-1/2 px-5 py-3 font-medium border rounded-lg',
                        activeTab === 'tab1'
                            ? 'border-black text-black'
                            : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    Create SKU for Single Product
                </button>
                <button
                    type="button"
                    @click="activeTab = 'tab2'"
                    :class="[
                        'w-1/2 px-5 py-3 font-medium border rounded-lg',
                        activeTab === 'tab2'
                            ? 'border-black text-black'
                            : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    Create SKU for Combine Product
                </button>
            </div>
        </div>

        <div
            v-if="activeTab === 'tab1'"
            class="border-x border-b rounded-lg p-2 bg-white"
        >
            <div class="flex flex-col gap-5 lg:flex-row">
                <div class="w-full rounded-lg lg:w-[60%]">
                    <div class="font-bold">Create Single SKUs</div>
                    <div class="flex gap-4 mt-2">
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Channel">Channel</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Store">Store</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-2">
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Category"> Category </option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Sub Category"> Sub Category </option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-2">
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Color">Color</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Size">Size</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-2">
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="FullFilment">FullFilment</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <input class="input-style" type="text" name="" placeholder="Pack of" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-2">
                        <button class="common-button flex gap-2"> <DownloadIcon /> Save & Export</button>
                    </div>
                </div>
                <div class="w-full rounded-lg lg:w-[40%] shadow-lg p-3">
                    <div class="font-bold">Single SKU Preview</div>

                    <div class="grid grid-cols-2">
                        <div> <strong class="mt-2" for="">Channel: </strong> Channel 1 </div>
                        <div> <strong class="mt-2" for="">Shop: </strong> Shop 1 </div>
                        <div> <strong class="mt-2" for="">Category: </strong> Category 1 </div>
                        <div> <strong class="mt-2" for="">Sub Category: </strong> Sub Category 1 </div>
                        <div> <strong class="mt-2" for="">Fulfilment: </strong> SF, Default </div>
                        <div> <strong class="mt-2" for="">Pack of: </strong> 2X,5X.. </div>
                    </div>

                    <div class="shadow-md p-3 mt-3">
                        <div for="">Generated SKU Samples</div>
                        <div>Provide a listing prefix to preview generated SKUs.</div>
                    </div>

                    <div for="" class="mt-3">Ready for creation</div>
                    <div>0 of 0</div>
                </div>
            </div>
        </div>

        <div
            v-else-if="activeTab === 'tab2'"
            class="border-x border-b rounded-lg p-2 bg-white"
        >
            <div class="flex flex-col gap-5 lg:flex-row">
                <div class="w-full rounded-lg lg:w-[60%]">
                    <div class="font-bold">Create Combine SKUs</div>
                    <div class="flex gap-4 mt-2">
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Channel">Channel</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Store">Store</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex mt-2">
                        <div class="flex-1">
                            <select class="select-option" name="" id="">
                                <option value="Fullfilment">Fullfilment</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div class="flex flex-col gap-3">
                            <select class="select-option" name="" id="">
                                <option value="Category"> Category </option>
                            </select>
                            <select class="select-option" name="" id="">
                                <option value="Sub Category"> Sub Category </option>
                            </select>
                            <select class="select-option" name="" id="">
                                <option value="Products">Products</option>
                            </select>
                            <input class="input-style" type="text" name="" placeholder="Pack of" />
                        </div>
                        <div class="flex flex-col gap-3">
                            <select class="select-option" name="" id="">
                                <option value="Category"> Category </option>
                            </select>
                            <select class="select-option" name="" id="">
                                <option value="Sub Category"> Sub Category </option>
                            </select>
                            <select class="select-option" name="" id="">
                                <option value="Products">Products</option>
                            </select>
                            <input class="input-style" type="text" name="" placeholder="Pack of" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-2 gap-2">
                        <button class="common-button flex gap-2"> <PendingIcon /> Add Pending</button>
                        <button class="common-button flex gap-2"> <DownloadIcon /> Save & Export</button>
                    </div>
                </div>
                <div class="w-full rounded-lg border border-gray-200 p-3 shadow-md lg:w-[40%]" >
                    <div class="font-bold">Combine SKU Preview</div>

                    <div class="grid grid-cols-2">
                        <div> <strong class="mt-2" for="">Channel: </strong> Channel 1 </div>
                        <div> <strong class="mt-2" for="">Shop: </strong> Shop 1 </div>
                        <div> <strong class="mt-2" for="">Category: </strong> Category 1 </div>
                        <div> <strong class="mt-2" for="">Sub Category: </strong> Sub Category 1 </div>
                        <div> <strong class="mt-2" for="">Fulfilment: </strong> SF, Default </div>
                        <div> <strong class="mt-2" for="">Pack of: </strong> 2X,5X.. </div>
                    </div>

                    <div class="shadow-md p-3 mt-3">
                        <div for="">Generated SKU Pairs Preview</div>
                        <div>Select products to preview generated SKUs.</div>
                    </div>

                    <div for="" class="mt-3">Pending Combine SKU Records</div>
                    <div>No pending combine SKU records yet.</div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
