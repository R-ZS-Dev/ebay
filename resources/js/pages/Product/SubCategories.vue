<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import ActiveIcon from '../../components/icons/ActiveIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import EditIcon from '../../components/icons/EditIcon.vue';
    import MappedIcon from '../../components/icons/MappedIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';

    import { ref } from 'vue';
    const blukSubCategoryModal = ref(false);
    const addSubCategoryModal = ref(false);
    const selectedCategory = ref('');
    const editSubCategoryModal = ref(false);
    const selectedEditCategory = ref('');
    const deleteSubCategoryModal = ref(false);

    const subcategories = [
        {
            id: 1,
            name: "iPhone",
            subname: "ABC-001",
            status: "Active",
        },
        {
            id: 2,
            name: "MacBook",
            subname: "ABC-002",
            status: "Active",
        },
        {
            id: 3,
            name: "AirPods",
            subname: "ABC-003",
            status: "Inactive",
        },
    ];
</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Sub Category Record </h2>
            <div class="flex gap-2">
                <button class="common-button" @click="blukSubCategoryModal = true"> + Bulk Sub Category </button>
                <button class="common-button" @click="addSubCategoryModal = true"> + Add Sub Category </button>
                <button class="common-button flex items-center gap-2"> <DownloadIcon /> Export</button>
            </div>
        </div>

        <!-- Modals -->
        <!-- Bluk Category Upload Modal -->
        <div v-if="blukSubCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="blukSubCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Bluk Category Upload</h3>
                <input type="file" class="input-style mt-2" name="" >

                <div class="bg-blue-200 mt-2 rounded p-2">
                    <div for="">CSV format: Category Name, Sub Category Name</div>
                </div>

                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500" href=""> Download Template</a></div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Add Sub Category Modal -->
        <div v-if="addSubCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="addSubCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Add Sub Category</h3>
                <select v-model="selectedCategory" class="select-option mt-2" name="" id="">
                    <option value="" disabled>Category</option>
                    <option value="Cat 1">Cat 1</option>
                    <option value="Cat 2">Cat 2</option>
                </select>

                <input type="text" name="" class="input-style mt-2" placeholder="Sub Category name">

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm </button>
                </div>
            </div>
        </div>

        <!-- Edit Sub Category Modal -->
        <div v-if="editSubCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="editSubCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Edit Sub Category</h3>
                <select v-model="selectedEditCategory" class="select-option mt-2" name="" id="">
                    <option value="" disabled>Category</option>
                    <option value="Cat 1">Cat 1</option>
                    <option value="Cat 2">Cat 2</option>
                </select>

                <input type="text" name="" class="input-style mt-2" placeholder="Sub Category name">

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Update </button>
                </div>
            </div>
        </div>

        <!-- Delete Category Modal -->
        <div v-if="deleteSubCategoryModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="deleteSubCategoryModal = false">X</button>

                <h3 class="modal-inner-heading">Delete Category</h3>

                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="deleteSubCategoryModal = false"> Cancel </button>
                    <button class="confirm-button"> Confirm </button>
                </div>
            </div>
        </div>

        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500"> <MappedIcon /> Total SubCategory</p>
                <p class="mt-2 text-3xl font-bold text-blue-800">25</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500"> <ActiveIcon /> Active SubCategory</p>
                <p class="mt-2 text-3xl font-bold text-green-800">13</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500"> <PendingIcon /> Inactive SubCategory</p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">8</p>
            </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th" >Category Name</th>
                            <th class="table-th" >Sub Category Name</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="subcategory in subcategories" :key="subcategory.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ subcategory.id }} </td>
                            <td class="table-td" > {{ subcategory.name }} </td>
                            <td class="table-td" > {{ subcategory.subname }} </td>
                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ subcategory.status }}
                                </span>
                            </td>
                            <td class="table-td">
                                <button title="Edit Sub Category"> <EditIcon @click="editSubCategoryModal = true" /> </button>
                                <button title="Delete Sub Category"> <DeleteIcon @click="deleteSubCategoryModal = true" /> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>