<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import ActiveIcon from '../../components/icons/ActiveIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import EditIcon from '../../components/icons/EditIcon.vue';
    import MappedIcon from '../../components/icons/MappedIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';

    import { ref } from 'vue';
    const bulkSizeModal = ref(false);
    const addSizeModal = ref(false);
    const editSizeModal = ref(false);
    const deleteSizeModal = ref(false);
    const switch1 = ref(false);
    const selectedSize = ref<any>(null);
    const openSizeEditModal = (size: any) =>{
        selectedSize.value = {...size};
        switch1.value = size.status === "Active";
        editSizeModal.value = true;
    };

    const opensizeDeleteModal = (size:any)=>{
        selectedSize.value = size;
        deleteSizeModal.value = true;
    }
    
    const updatesize = () => {
        if (!selectedSize.value) return;

        const index = sizes.value.findIndex(
            size => size.id === selectedSize.value.id
        );

        if (index !== -1) {
            sizes.value[index] = {
                ...selectedSize.value,
                status: switch1.value ? "Active" : "Inactive",
            };
        }

        editSizeModal.value = false;
        selectedSize.value = null;
    };

    const deletesize = () => {
        if (!selectedSize.value) return;

        sizes.value = sizes.value.filter(
            size => size.id !== selectedSize.value.id
        );

        deleteSizeModal.value = false;
        selectedSize.value = null;
    };

    const sizes = ref([
        {
            id: 1,
            name: "ABC-001",
            status: "Active",
        },
        {
            id: 2,
            name: "ABC-002",
            status: "Active",
        },
        {
            id: 3,
            name: "ABC-003",
            status: "Inactive",
        },
    ]);

</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Size Record </h2>

            <div class="flex gap-2">
                <button class="common-button" @click="bulkSizeModal = true"> + Bulk size </button>
                <button class="common-button" @click="addSizeModal = true"> + Add size </button>
                <button class="common-button flex items-center gap-2"> <DownloadIcon /> Export</button>
            </div>
        </div>

        <!-- Modals -->
        <!-- Bulk size Upload Modal -->
        <div v-if="bulkSizeModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="bulkSizeModal = false">X</button>

                <h3 class="modal-inner-heading">Bluk size Upload</h3>
                <input type="file" class="input-style mt-2" name="" >

                <div class="bg-blue-200 mt-2 rounded p-2">
                    <label for="">Example: Large, 120X200</label>
                </div>

                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500 hover:text-blue-700" href="/templates/size-template.csv" download> Download Template</a></div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Add New size Modal -->
        <div v-if="addSizeModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="addSizeModal = false">X</button>

                <h3 class="modal-inner-heading">Add New size</h3>
                <input type="text" name="" class="input-style mt-2" placeholder="size name">

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Edit size Modal -->
        <div v-if="editSizeModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="editSizeModal = false">X</button>

                <h3 class="modal-inner-heading">Edit size</h3>
                <input v-if="selectedSize"v-model="selectedSize.name" type="text" name="" class="input-style mt-2" placeholder="Edit size">

                <label class="inline-flex cursor-pointer items-center mt-2" title="Inctivate size">
                    <input v-model="switch1" type="checkbox" class="peer sr-only" >
                    <div class="switch-toggle-button" ></div>
                </label>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" @click="updatesize"> Update </button>
                </div>
            </div>
        </div>

        <!-- Delete size Modal -->
        <div v-if="deleteSizeModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="deleteSizeModal = false">X</button>

                <h3 class="modal-inner-heading">Delete size</h3>

                <p class="mt-4 text-gray-600">
                    Are you sure you want to delete
                    <strong>{{ selectedSize?.name }}</strong>?
                </p>

                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="deleteSizeModal = false"> Cancel </button>
                    <button class="confirm-button" @click="deletesize"> Confirm </button>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <MappedIcon /> Total size</p>
                <p class="mt-2 text-3xl font-bold text-blue-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex gap-2"> <ActiveIcon /> Active size</p>
                <p class="mt-2 text-3xl font-bold text-green-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <PendingIcon /> Inactive size</p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">1250</p>
            </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th" >size Name</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="size in sizes" :key="size.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ size.id }} </td>
                            <td class="table-td" > {{ size.name }} </td>
                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ size.status }}
                                </span>
                            </td>
                            <td class="table-td">
                                <button title="Edit Size"> <EditIcon @click="openSizeEditModal(size)" /> </button>
                                <button title="Delete Size"> <DeleteIcon @click="opensizeDeleteModal(size)""/> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>