<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import ActiveIcon from '../../components/icons/ActiveIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import EditIcon from '../../components/icons/EditIcon.vue';
    import MappedIcon from '../../components/icons/MappedIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';

    import { ref } from 'vue';
    const bulkCategoryModal = ref(false);
    const addCategoryModal = ref(false);
    const editCategoryModal = ref(false);
    const deleteCategoryModal = ref(false);
    const switch1 = ref(false);
    const selectedCategory = ref<any>(null);
    const openCategoryEditModal = (category: any) =>{
        selectedCategory.value = {...category};
        switch1.value = category.status === "Active";
        editCategoryModal.value = true;
    };

    const openCategoryDeleteModal = (category:any)=>{
        selectedCategory.value = category;
        deleteCategoryModal.value = true;
    }
    
    const updateCategory = () => {
        if (!selectedCategory.value) return;

        const index = categories.value.findIndex(
            category => category.id === selectedCategory.value.id
        );

        if (index !== -1) {
            categories.value[index] = {
                ...selectedCategory.value,
                status: switch1.value ? "Active" : "Inactive",
            };
        }

        editCategoryModal.value = false;
        selectedCategory.value = null;
    };

    const deleteCategory = () => {
        if (!selectedCategory.value) return;

        categories.value = categories.value.filter(
            category => category.id !== selectedCategory.value.id
        );

        deleteCategoryModal.value = false;
        selectedCategory.value = null;
    };

    const categories = ref([
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
            <h2 class="text-3xl font-semibold text-gray-800"> Category Record </h2>

            <div class="flex gap-2">
                <button class="common-button" @click="bulkCategoryModal = true"> + Bulk Category </button>
                <button class="common-button" @click="addCategoryModal = true"> + Add Category </button>
                <button class="common-button flex items-center gap-2"> <DownloadIcon /> Export</button>
            </div>
        </div>

        <!-- Modals -->
        <!-- Bluk Category Upload Modal -->
        <div v-if="bulkCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="bulkCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Bluk Category Upload</h3>
                <input type="file" class="input-style mt-2" name="" >

                <div class="bg-blue-200 mt-2 rounded p-2">
                    <label for="">Example: Cat 1, Cat 2</label>
                </div>

                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500 hover:text-blue-700" href="/templates/category-template.csv" download> Download Template</a></div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Add New Category Modal -->
        <div v-if="addCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="addCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Add New Category</h3>
                <input type="text" name="" class="input-style mt-2" placeholder="Category name">

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Edit Category Modal -->
        <div v-if="editCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="editCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Edit Category</h3>
                <input v-if="selectedCategory"v-model="selectedCategory.name" type="text" name="" class="input-style mt-2" placeholder="Edit Category">

                <label class="inline-flex cursor-pointer items-center mt-2" title="Inctivate Category">
                    <input v-model="switch1" type="checkbox" class="peer sr-only" >
                    <div class="switch-toggle-button" ></div>
                </label>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" @click="updateCategory"> Update </button>
                </div>
            </div>
        </div>

        <!-- Delete Category Modal -->
        <div v-if="deleteCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="deleteCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Delete Category</h3>

                <p class="mt-4 text-gray-600">
                    Are you sure you want to delete
                    <strong>{{ selectedCategory?.name }}</strong>?
                </p>

                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="deleteCategoryModal = false"> Cancel </button>
                    <button class="confirm-button" @click="deleteCategory"> Confirm </button>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <MappedIcon /> Total Category</p>
                <p class="mt-2 text-3xl font-bold text-blue-800">40</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex gap-2"> <ActiveIcon /> Active Category</p>
                <p class="mt-2 text-3xl font-bold text-green-800">20</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <PendingIcon /> Inactive Category</p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">12</p>
            </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th">Category Name</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="category in categories" :key="category.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ category.id }} </td>
                            <td class="table-td" > {{ category.name }} </td>
                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ category.status }}
                                </span>
                            </td>
                            <td class="table-td">
                                <button title="Edit Category"> <EditIcon @click="openCategoryEditModal(category)" /> </button>
                                <button title="Delete Category"> <DeleteIcon @click="openCategoryDeleteModal(category)" /> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>