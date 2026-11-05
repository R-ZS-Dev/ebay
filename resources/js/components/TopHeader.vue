<template>
    <header class="fixed right-0 top-0 z-50 h-16 bg-white shadow transition-all duration-300":class="sidebarOpen ? 'left-64' : 'left-0'">
        <div class="flex h-full items-center justify-between px-4">
            <button type="button" @click="$emit('toggle-sidebar')" class="flex h-10 w-10 items-center justify-center rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <!-- Profile -->
            <div class="relative">
                <button
                    type="button"
                    @click="profileOpen = !profileOpen"
                    @blur="profileOpen = false"
                    class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-200"
                >
                    <img
                        src="/upload/images/logo.png"
                        class="h-full w-full rounded-full object-cover"
                    />
                </button>

                <div
                    v-if="profileOpen"
                    class="absolute right-0 top-12 w-48 rounded-lg bg-white py-2 shadow-lg"
                >
                    <a
                        href="#"
                        class="block px-4 py-2 hover:bg-gray-100"
                    >
                        Profile Settings
                    </a>

                    <button
                        class="block w-full px-4 py-2 text-left text-red-600 hover:bg-red-50"
                    >
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
    import { ref } from "vue";
    defineProps({
        sidebarOpen: {
            type: Boolean,
            default: true,
        },
    });

    defineEmits(["toggle-sidebar"]);
    const profileOpen = ref(false);
</script>