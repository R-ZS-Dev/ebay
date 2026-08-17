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
            <a href="/dashboard" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" > Dashboard </a>

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
                    <a href="/product/products" class="block rounded-lg px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white" >
                        Products
                    </a>

                    <a href="/product/categories" class="block rounded-lg px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white" >
                        Category
                    </a>

                    <a href="/product/subcategories" class="block rounded-lg px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white" >
                        Sub Category
                    </a>                    
                </div>
            </div>

            <!-- SKU Management DropDown -->
            <div class="mb-2">
                <button
                    type="button"
                    @click="skuDetailOpen = !skuDetailOpen"
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
                    <a href="#" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                        Create SKU
                    </a>
                    
                    <a href="#" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                        SKU Record
                    </a>

                    <a href="#" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                        Unutlize SKU
                    </a>
                </div>
            </div>

            <!-- Order -->
            <a href="/order/orders" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                Order
            </a>

            <a href="/channelrecords" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                Channel Record
            </a>

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
                    <a href="/users" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                        User Management
                    </a>

                    <a href="#" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                        Channel Integration
                    </a>

                    <a href="#" class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800" >
                        Logs
                    </a>
                </div>
            </div>
        </nav>
    </aside>
</template>

<script setup>
    import { ref } from "vue";

    defineProps({
        isOpen: {
            type: Boolean,
            default: true,
        },
    });

    const productDetailOpen = ref(false);
    const skuDetailOpen = ref(false);
    const settingOpen = ref(false);
</script>