<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import ActiveIcon from '../../components/icons/ActiveIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import EditIcon from '../../components/icons/EditIcon.vue';
    import MappedIcon from '../../components/icons/MappedIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';

    import { ref } from 'vue';
    const bulkColorModal = ref(false);
    const addColorModal = ref(false);
    const editColorModal = ref(false);
    const deleteColorModal = ref(false);
    const switch1 = ref(false);
    const selectedColor = ref<any>(null);
    const openColorEditModal = (color: any) =>{
        selectedColor.value = {...color};
        switch1.value = color.status === "Active";
        editColorModal.value = true;
    };

    const openColorDeleteModal = (color:any)=>{
        selectedColor.value = color;
        deleteColorModal.value = true;
    }
    
    const updateColor = () => {
        if (!selectedColor.value) return;

        const index = colors.value.findIndex(
            color => color.id === selectedColor.value.id
        );

        if (index !== -1) {
            colors.value[index] = {
                ...selectedColor.value,
                status: switch1.value ? "Active" : "Inactive",
            };
        }

        editColorModal.value = false;
        selectedColor.value = null;
    };

    const deleteColor = () => {
        if (!selectedColor.value) return;

        colors.value = colors.value.filter(
            color => color.id !== selectedColor.value.id
        );

        deleteColorModal.value = false;
        selectedColor.value = null;
    };

    const colors = ref([
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
            <h2 class="text-3xl font-semibold text-gray-800"> Color Record </h2>

            <div class="flex gap-2">
                <button class="common-button" @click="bulkColorModal = true"> + Bulk Color </button>
                <button class="common-button" @click="addColorModal = true"> + Add Color </button>
                <button class="common-button flex items-center gap-2"> <DownloadIcon /> Export</button>
            </div>
        </div>

        <!-- Modals -->
        <!-- Bluk color Upload Modal -->
        <div v-if="bulkColorModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="bulkColorModal = false">X</button>

                <h3 class="modal-inner-heading">Bluk Color Upload</h3>
                <input type="file" class="input-style mt-2" name="" >

                <div class="bg-blue-200 mt-2 rounded p-2">
                    <label for="">Example: Red, Black</label>
                </div>

                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500 hover:text-blue-700" href="/templates/color-template.csv" download> Download Template</a></div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Add New color Modal -->
        <div v-if="addColorModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="addColorModal = false">X</button>

                <h3 class="modal-inner-heading">Add New Color</h3>
                <input type="text" name="" class="input-style mt-2" placeholder="color name">

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Edit color Modal -->
        <div v-if="editColorModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="editColorModal = false">X</button>

                <h3 class="modal-inner-heading">Edit Color</h3>
                <input v-if="selectedColor"v-model="selectedColor.name" type="text" name="" class="input-style mt-2" placeholder="Edit color">

                <label class="inline-flex cursor-pointer items-center mt-2" title="Inctivate color">
                    <input v-model="switch1" type="checkbox" class="peer sr-only" >
                    <div class="switch-toggle-button" ></div>
                </label>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" @click="updateColor"> Update </button>
                </div>
            </div>
        </div>

        <!-- Delete color Modal -->
        <div v-if="deleteColorModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="deleteColorModal = false">X</button>

                <h3 class="modal-inner-heading">Delete Color</h3>

                <p class="mt-4 text-gray-600">
                    Are you sure you want to delete
                    <strong>{{ selectedColor?.name }}</strong>?
                </p>

                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="deleteColorModal = false"> Cancel </button>
                    <button class="confirm-button" @click="deleteColor"> Confirm </button>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <MappedIcon /> Total Color</p>
                <p class="mt-2 text-3xl font-bold text-blue-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex gap-2"> <ActiveIcon /> Active Color</p>
                <p class="mt-2 text-3xl font-bold text-green-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <PendingIcon /> Inactive Color</p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">1250</p>
            </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th" >color Name</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="color in colors" :key="color.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ color.id }} </td>
                            <td class="table-td" > {{ color.name }} </td>
                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ color.status }}
                                </span>
                            </td>
                            <td class="table-td">
                                <button title="Edit Color"> <EditIcon @click="openColorEditModal(color)" /> </button>
                                <button title="Delete Color"> <DeleteIcon @click="openColorDeleteModal(color)""/> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>