<template>
    <div class="min-h-screen bg-gray-100">
        <SideBar :is-open="sidebarOpen" />
        <TopHeader
            :sidebar-open="sidebarOpen"
            @toggle-sidebar="toggleSidebar"
        />

        <main
            class="pt-16 transition-all duration-300"
            :class="sidebarOpen ? 'ml-64' : 'ml-0'"
        >
            <div class="p-6">
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup>
    import { ref } from "vue";
    import SideBar from "./SideBar.vue";
    import TopHeader from "./TopHeader.vue";

    const sidebarOpen = ref(true);

    function toggleSidebar() {
        sidebarOpen.value = !sidebarOpen.value;
    }
</script>