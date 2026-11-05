<script setup lang="ts">
    import AppLayout from "../../components/AppLayout.vue";
    import { ref } from 'vue';
    import EditIcon from "../../components/icons/EditIcon.vue";
    import DeleteIcon from "../../components/icons/DeleteIcon.vue";
    import ShopIcon from "../../components/icons/ShopIcon.vue";
    import IntegrationIcon from "../../components/icons/IntegrationIcon.vue";
    import ImportIcon from "../../components/icons/ImportIcon.vue";
    import ChannelIcon from "../../components/icons/ChannelIcon.vue";
    import ActiveIcon from "../../components/icons/ActiveIcon.vue";
    import PendingIcon from "../../components/icons/PendingIcon.vue";
    import RuleIcon from "../../components/icons/RuleIcon.vue";
    import ProductLimit from "../../components/icons/ProductLimit.vue";
    import FetchProductIcon from "../../components/icons/FetchProductIcon.vue";
    const activeTab = ref("channelsTab");
    const addNewStoreModal = ref(false);
    const addNewIntegrationModal = ref(false);
    const ruleApplyModal = ref(false);
    const productRuleLimitModal = ref(false);
    const fetchProductListingModal = ref(false);
    const deactiveStoreModal = ref(false);
    const storeIntegrationModal = ref(false);
    const deleteStoreModal = ref(false);
    const storeUpdaterModal = ref(false);
    const switch1 = ref(false);
    const switch2 = ref(false);

    // Channel Record Table
    const channelRecords = [
        {
            id: 1,
            channel: "ABC-001",
            abbr: "ABC",
            defaultPerson: "abc xyz",
            integration: "15",
            activeIntegration: "0",
            status: "Active",
            update: "12/29/2025, 11:52:43 AM",
        },
    ];

    // Integration Record Table
    const integrationRecords = [
        {
            id: 1,
            shop: "ABC",
            channel: "ABC-001",
            fulfilment: "SELLER",
            code: "SF",
            region: "UK",
            status: "Active",
            connected: "-",
            rule: "-",
            cap_qty: "-",
            actions: "-",
        },
    ];
</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Channel Control Center </h2>
            <div class="flex gap-2">
                <button class="common-button" @click="addNewStoreModal = true">+ Add New Store</button>
                <button class="common-button flex items-center gap-2" @click="addNewIntegrationModal = true"><IntegrationIcon /> New Integration</button>
            </div>
        </div>

        <!-- Add User Modal -->
        <div v-if="addNewStoreModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="addNewStoreModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Add New Store</h3>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Add New Integration Modal -->
        <div v-if="addNewIntegrationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="addNewIntegrationModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Add New Integration</h3>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm  </button>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="flex items-center gap-2 text-sm font-medium text-blue-500">
                    <ChannelIcon /> <span class="text-xl">Channels</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="flex items-center gap-2 text-sm font-medium text-green-500"> 
                    <ActiveIcon/> <span class="text-xl">Active Channels</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-green-800">1,200</p>
            </div>

            <div class="card-inner-div">
                <p class="flex items-center gap-2 text-sm font-medium text-blue-500"> 
                    <ShopIcon/> <span class="text-xl">Shops</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="flex items-center gap-2 text-sm font-medium text-yellow-500">
                    <PendingIcon/> <span class="text-xl">Pending Integrations</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">1250</p>
            </div>
        </div>

        <div class="flex border-b border-gray-200 mt-2">
            <div class="flex w-full">
                <button type="button" @click="activeTab = 'channelsTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'channelsTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    <ChannelIcon /> Channel Record
                </button>
                <button type="button" @click="activeTab = 'integrationTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'integrationTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    <IntegrationIcon /> Integration Record
                </button>
                <button type="button" @click="activeTab = 'importTab'" :class="[ 'w-1/2 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'importTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    <ImportIcon /> Import Record
                </button>
            </div>
        </div>

        <!-- Channel Record Table -->
        <div v-if="activeTab === 'channelsTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="flex gap-2">
                <input class="input-style" type="text" name="" placeholder="Search Channel..." />

                <select class="select-option" name="" id="">
                    <option value="Status">Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Channel</th>
                                <th class="table-th">Abbr</th>
                                <th class="table-th">Default Region</th>
                                <th class="table-th">Integration</th>
                                <th class="table-th">Active Integrations</th>
                                <th class="table-th">Status</th>
                                <th class="table-th">Updated</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="channelRecord in channelRecords" :key="channelRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ channelRecord.channel }} </td>
                                <td class="table-td" > {{ channelRecord.abbr }} </td>
                                <td class="table-td" > {{ channelRecord.defaultPerson }} </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700" >
                                        {{ channelRecord.integration }}
                                    </span>
                                </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700" >
                                        {{ channelRecord.activeIntegration }}
                                    </span>
                                </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700" >
                                        {{ channelRecord.status }}
                                    </span>
                                </td>
                                <td class="table-td" > {{ channelRecord.update }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Integration Table -->
        <div v-if="activeTab === 'integrationTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="flex gap-2">
                <select class="select-option" name="" id="">
                    <option value="Channel">Channel</option>
                </select>
                <select class="select-option" name="" id="">
                    <option value="Shop">Shop</option>
                </select>
                <select class="select-option" name="" id="">
                    <option value="Status">Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Active">Active</option>
                    <option value="Disable">Disable</option>
                    <option value="Error">Error</option>
                </select>

                <input
                    class="input-style"
                    type="text"
                    name=""
                    placeholder="Search Channel..."
                />
            </div>

            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Shop</th>
                                <th class="table-th">Channel</th>
                                <th class="table-th">Fulfilment</th>
                                <th class="table-th">Code</th>
                                <th class="table-th">Region</th>
                                <th class="table-th">Status</th>
                                <th class="table-th">Connected</th>
                                <th class="table-th">Rule</th>
                                <th class="table-th">Cap Qty</th>
                                <th class="table-th">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="integrationRecord in integrationRecords" :key="integrationRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ integrationRecord.shop }} </td>
                                <td class="table-td" > {{ integrationRecord.channel }} </td>
                                <td class="table-td" > {{ integrationRecord.fulfilment }} </td>
                                <td class="table-td" > {{ integrationRecord.code }} </td>
                                <td class="table-td" > {{ integrationRecord.region }} </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700" >
                                        {{ integrationRecord.status }}
                                    </span>
                                </td>
                                <td class="table-td" > {{ integrationRecord.connected }} </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700" >
                                        {{ integrationRecord.rule }}
                                    </span>
                                </td>
                                <td class="table-td" > 
                                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700" >
                                        {{ integrationRecord.cap_qty }}
                                    </span>
                                </td>
                                <td class="table-td" >
                                    {{ integrationRecord.actions }} 
                                    <!-- Inventory RUle Icon -->
                                    <button type="button" class="ml-2 inline-flex items-center" title="No Rule Applied">
                                       <RuleIcon @click="ruleApplyModal = true" />
                                    </button>

                                    <button type="button" class="ml-2 inline-flex items-center" title="Product Limit">
                                        <ProductLimit @click="productRuleLimitModal = true" />
                                    </button>

                                    <button type="button" class="ml-2 inline-flex items-center" title="Fetch Products Only">
                                        <FetchProductIcon @click="fetchProductListingModal = true" />
                                    </button>

                                    <!-- Switch 1 -->
                                    <label @click="deactiveStoreModal = true" class="inline-flex cursor-pointer items-center" title="Deactivate Store">
                                        <input v-model="switch1" type="checkbox" class="peer sr-only" >
                                        <div class="switch-toggle-button" ></div>
                                    </label>

                                    <!-- Edit Icon -->
                                    <button type="button" class="ml-2 inline-flex items-center" title="Integration">
                                        <EditIcon @click="storeIntegrationModal = true" />
                                    </button>

                                    <!-- Delete Icon -->
                                    <button type="button" class="ml-2 inline-flex items-center" title="Delete">
                                        <DeleteIcon @click="deleteStoreModal = true" />
                                    </button>

                                    <!-- Switch 2 -->
                                    <label @click="storeUpdaterModal = true" class="inline-flex cursor-pointer items-center" title="Updater On - Values will be update">
                                        <input v-model="switch2" type="checkbox" class="peer sr-only" >
                                        <div class="switch-toggle-button" ></div>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Rule Apply Modal -->
            <div v-if="ruleApplyModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="ruleApplyModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Rule Apply Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- Product Rule Limit Modal -->
            <div v-if="productRuleLimitModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="productRuleLimitModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Product Rule Limit Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- Fetch Product Listing Modal -->
            <div v-if="fetchProductListingModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="fetchProductListingModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Fetch Product Listing Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- Fetch Product Listing Modal -->
            <div v-if="deactiveStoreModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deactiveStoreModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Deactive Store Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- Store Integration Modal -->
            <div v-if="storeIntegrationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="storeIntegrationModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Store Integration Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- Delete Store Modal -->
            <div v-if="deleteStoreModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deleteStoreModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Delete Store Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>

            <!-- Store Updater Modal -->
            <div v-if="storeUpdaterModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="storeUpdaterModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Store Updater Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Import Table -->
        <div v-if="activeTab === 'importTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class="card-main-div grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4" >
                <input class="input-style lg:col-span-2" type="file" name="" />
                <div class="flex gap-2 lg:col-span-2">
                    <button class="common-button flex-1">Run Import</button>
                    <button class="common-button flex-1">Clear</button>
                    <button class="common-button flex-1"><a href="/templates/channel-import-template.csv" download>Download Template</a></button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
