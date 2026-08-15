<script setup>
defineProps({
    isOpen: {
        type: Boolean,
        default: true,
    },
});
</script>

<template>
    <aside
        class="fixed left-0 top-0 z-40 h-screen w-64 bg-gray-900 text-white transition-transform duration-300"
        :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="flex h-16 items-center justify-center border-b border-gray-700">
            <h1 class="text-xl font-bold">
                Ebay
            </h1>
        </div>

        <nav class="p-4">
            <a
                href="/dashboard"
                class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800"
            >
                Dashboard
            </a>

            <a
                href="/users"
                class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800"
            >
                Users
            </a>

            <a
                href="#"
                class="mb-2 block rounded-lg px-4 py-3 hover:bg-gray-800"
            >
                Products
            </a>
        </nav>
    </aside>
</template>