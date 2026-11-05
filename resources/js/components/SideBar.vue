<template>
    <aside
        class="fixed left-0 top-0 z-40 h-screen w-64 overflow-y-auto bg-gray-900 text-white transition-transform duration-300"
        :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <!-- Logo -->
        <div class="flex h-16 items-center justify-center border-b border-gray-700">
            <h1 class="text-xl font-bold"> Ebay </h1>
        </div>

        <!-- Menu -->
        <nav class="p-4">
            <!-- Dashboard -->
            <a href="/dashboard" class="sidebar-link" :class="isActive('/dashboard') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                Dashboard 
            </a>

            <!-- Product Detail Dropdown -->
            <div class="mb-2">
                <button
                    type="button"
                    @click="productDetailOpen = !productDetailOpen"
                    class="flex w-full items-center justify-between rounded-lg px-4 py-3 text-left hover:bg-gray-800"
                >
                    <span>Product Detail</span>

                    <!-- Arrow -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-5 w-5 transition-transform duration-200"
                        :class="productDetailOpen ? 'rotate-180' : ''"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m19.5 8.25-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                </button>

                <!-- Dropdown Items -->
                <div v-if="productDetailOpen" class="mt-1 space-y-1 pl-4">
                    <a href="/product/categories" class="sidebar-link" :class="isActive('/product/categories') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Category
                    </a>

                    <a href="/product/subcategories" class="sidebar-link" :class="isActive('/product/subcategories') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Sub Category
                    </a>

                    <a href="/product/size" class="sidebar-link" :class="isActive('/product/size') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Size
                    </a>

                    <a href="/product/color" class="sidebar-link" :class="isActive('/product/color') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Color
                    </a>

                    <a href="/product/products" class="sidebar-link" :class="isActive('/product/products') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Products
                    </a>
                </div>
            </div>

            <!-- SKU Management DropDown -->
            <div class="mb-2">
                <button type="button" @click="skuDetailOpen = !skuDetailOpen"
                    class="flex w-full items-center justify-between rounded-lg px-4 py-3 text-left hover:bg-gray-800"
                >
                    <span>SKU Management</span>

                    <!-- Arrow -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-5 w-5 transition-transform duration-200"
                        :class="skuDetailOpen ? 'rotate-180' : ''"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m19.5 8.25-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                </button>
                
                <div v-if="skuDetailOpen" class="mt-1 space-y-1 pl-4">
                    <a href="/sku/createsku" class="sidebar-link" :class="isActive('/sku/createsku') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Create SKU
                    </a>
                    
                    <a href="/sku/skurecords" class="sidebar-link" :class="isActive('/sku/skurecords') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        SKU Record
                    </a>

                    <a href="/sku/unutilizedsku" class="sidebar-link" :class="isActive('/sku/unutilizedsku') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Unutlize SKU
                    </a>
                </div>
            </div>

            <!-- Order -->
            <a href="/order/orders" class="sidebar-link" :class="isActive('/order/orders') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                Order
            </a>

            <a href="/channelrecords" class="sidebar-link" :class="isActive('/channelrecords') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                Channel Record
            </a>

            <!-- WareHouse -->
            <div class="mb-2">
                <button type="button" @click="warehouseOpen = !warehouseOpen"
                    class="flex w-full items-center justify-between rounded-lg px-4 py-3 text-left hover:bg-gray-800"
                >
                    <span>Warehouse</span>

                    <!-- Arrow -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-5 w-5 transition-transform duration-200"
                        :class="warehouseOpen ? 'rotate-180' : ''"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m19.5 8.25-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                </button>

                <div v-if="warehouseOpen" class="mt-1 space-y-1 pl-4">
                    <a href="/warehouse/warehouse/" class="sidebar-link" :class="isActive('/warehouse/warehouse/') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Warehouse
                    </a>

                    <a href="/warehouse/stocktransaction/" class="sidebar-link" :class="isActive('/warehouse/stocktransaction/') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Stock Transactions
                    </a>

                    <a href="/warehouse/StockTransfer/" class="sidebar-link" :class="isActive('/warehouse/StockTransfer/') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Stock Transfer
                    </a>

                    <a href="/warehouse/orderdispatch/" class="sidebar-link" :class="isActive('/warehouse/orderdispatch/') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Order Dispatch
                    </a>
                </div>
            </div>

            <!-- Setting DropDown -->
            <div class="mb-2">
                <button type="button" @click="settingOpen = !settingOpen"
                    class="flex w-full items-center justify-between rounded-lg px-4 py-3 text-left hover:bg-gray-800"
                >
                    <span>Setting</span>

                    <!-- Arrow -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-5 w-5 transition-transform duration-200"
                        :class="settingOpen ? 'rotate-180' : ''"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m19.5 8.25-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                </button>

                <div v-if="settingOpen" class="mt-1 space-y-1 pl-4">
                    <a href="/setting/usermanagement" class="sidebar-link" :class="isActive('/setting/usermanagement') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        User Management
                    </a>

                    <a href="/setting/channelintegration" class="sidebar-link" :class="isActive('/setting/channelintegration') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Channel Integration
                    </a>

                    <a href="/setting/logs" class="sidebar-link" :class="isActive('/setting/logs') ? 'sidebar-link-active' : 'sidebar-link-inactive'" >
                        Logs
                    </a>
                </div>
            </div>
        </nav>
    </aside>
</template>

<script setup>
    import { ref } from "vue";
    defineProps({ isOpen: { type: Boolean, default: true, }, });

    const currentPath = ref(window.location.pathname);

    const productDetailOpen = ref(false);
    const skuDetailOpen = ref(false);
    const settingOpen = ref(false);
    const warehouseOpen = ref(false);

    const isActive = (path) => currentPath.value === path;

    const updateDropdowns = (path) => {
        productDetailOpen.value = path.startsWith("/product/");
        skuDetailOpen.value = path.startsWith("/sku/");
        warehouseOpen.value = path.startsWith("/warehouse/");
        settingOpen.value = path.startsWith("/setting/");
    };

    updateDropdowns(currentPath.value);

    window.addEventListener("popstate", () => {
        currentPath.value = window.location.pathname;
        updateDropdowns(currentPath.value);
    });
</script>