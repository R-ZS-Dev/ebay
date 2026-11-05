<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import { ref } from 'vue';
    const activeTab = ref("usersRecordTab")
    const addNewUser = ref(false);
    const addNewRole = ref(false);
    const editUserModal = ref(false);
    const editPermissionModal = ref(false);
    const editRoleModal = ref(false);
    const deleteUserModal = ref(false);
    const selectedUser = ref<any>(null);
    const openUserDeleteModal = (user: any) => {
        selectedUser.value = user;
        deleteUserModal.value = true;
    };
    const addNewPermission = ref(false);
    const selectedDepartment = ref('');

    const deleteRoleModal = ref(false);
    const selectedRole = ref<any>(null);

    const openDeleteRoleModal = (role: any) => {
        selectedRole.value = role;
        deleteRoleModal.value = true;
    };

    import UsersIcon from "../../components/icons/UsersIcon.vue";
    import ActiveIcon from '../../components/icons/ActiveIcon.vue';
    import RoleIcon from '../../components/icons/RoleIcon.vue';
    import PermissionIcon from '../../components/icons/PermissionIcon.vue';
    import EditIcon from '../../components/icons/EditIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';

    // UserManagment Table
    const userManagmentRecords = [
        {
            id: 1,
            name: "ABC-001",
            username: "XYZ-001",
            email: "abc@xyz.com",
            department: "Ecommerce",
            role: "user",
            status: "Active",
        },
        {
            id: 2,
            name: "XYZ-002",
            username: "ABC-001",
            email: "xyz@abc.com",
            department: "Chat Support",
            role: "user",
            status: "Active",
        },
    ];

    // RoleManagment Table
    const RoleManagmentRecords = [
        {
            id: 1,
            displayname: "ABC-001",
            username: "XYZ-001",
            description: "abc xyz",
            permissions: "view, edit, delete",
        },
        {
            id: 2,
            displayname: "XYZ-001",
            username: "ABC-001",
            description: "xyz abc",
            permissions: "view, edit, delete",
        },
    ];
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> User Management </h2>
        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex items-center gap-2">
                    <UsersIcon/> <span class="text-xl">Total Users</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex items-center gap-2">
                    <ActiveIcon/> <span class="text-xl">Active Users</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-green-800">1,200</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex items-center gap-2">
                    <RoleIcon/> <span class="text-xl">Total Roles</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-blue-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex items-center gap-2">
                    <PermissionIcon/> <span class="text-xl">Permissions</span>
                </p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">1250</p>
            </div>
        </div>

        <div class="flex border-b border-gray-200 mt-2">
            <div class="flex w-full">
                <button type="button" @click="activeTab = 'usersRecordTab'" :class="[ 'flex-1 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'usersRecordTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                   <UsersIcon/> Users Record
                </button>
                <button type="button" @click="activeTab = 'roleRecordTab'" :class="[ 'flex-1 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'roleRecordTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    <RoleIcon/> Roles Record
                </button>
                <button type="button" @click="activeTab = 'permissionRecordTab'" :class="[ 'flex-1 px-5 py-3 font-medium border rounded-lg flex items-center justify-center gap-2',
                        activeTab === 'permissionRecordTab' ? 'border-black text-black' : 'border-gray-200 text-gray-500 hover:text-black',
                    ]"
                >
                    <PermissionIcon/> Permission Record
                </button>
            </div>
        </div>

        <!-- User Managment -->
        <div v-if="activeTab === 'usersRecordTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class=" flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800"> User Management </h2>
                <div><button class="common-button" @click="addNewUser = true">+ Add User</button></div>
            </div>

            <!-- Add User Modal -->
            <div v-if="addNewUser" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="addNewUser = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Add New User</h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2">
                        <input type="text" name="" class="input-style" placeholder="Full name">
                        <input type="text" name="" class="input-style" placeholder="Username">
                        <input type="email" name="" class="input-style" placeholder="Email">
                        <input type="text" name="" class="input-style" placeholder="Password">
                        <select v-model="selectedRole" class="select-option" name="" id="">
                            <option value="" disabled>Role</option>
                            <option value="Role 1">Role 1</option>
                            <option value="Role 2">Role 2</option>
                        </select>

                        <select v-model="selectedDepartment" class="select-option" name="" id="">
                            <option value="" disabled>Department</option>
                            <option value="Department 1">Department 1</option>
                            <option value="Department 2">Department 2</option>
                        </select>
                        <textarea name="" class="input-style col-span-1 sm:col-span-2" placeholder="Address"></textarea>
                    </div>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Confirm </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 bg-white p-2 rounded-lg shadow mt-2">
                <input type="text" name="" id="" placeholder="Search...">
            </div>

            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Name</th>
                                <th class="table-th">Username</th>
                                <th class="table-th">Email</th>
                                <th class="table-th">Department</th>
                                <th class="table-th">Role</th>
                                <th class="table-th">Status</th>
                                <th class="table-th">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="userManagmentRecord in userManagmentRecords" :key="userManagmentRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ userManagmentRecord.name }} </td>
                                <td class="table-td" > {{ userManagmentRecord.username }} </td>
                                <td class="table-td" > {{ userManagmentRecord.email }} </td>
                                <td class="table-td" > {{ userManagmentRecord.department }} </td>
                                <td class="table-td" > {{ userManagmentRecord.role }} </td>
                                <td class="table-td">
                                    <span
                                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                    >
                                        {{ userManagmentRecord.status }}
                                    </span>
                                </td>
                                <td class="table-td">
                                    <button title="Edit User" @click="editUserModal = true"> <EditIcon /> </button>
                                    <button title="Delete User" @click="openUserDeleteModal(userManagmentRecord)"> <DeleteIcon /> </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div v-if="editUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="editUserModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Edit User Modal</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2">
                        <input type="text" name="" class="input-style" placeholder="Full name">
                        <input type="text" name="" class="input-style" placeholder="Username">
                        <input type="email" name="" class="input-style" placeholder="Email">
                        <input type="text" name="" class="input-style" placeholder="Password">
                        <select v-model="selectedRole" class="select-option" name="" id="">
                            <option value="" disabled>Role</option>
                            <option value="Role 1">Role 1</option>
                            <option value="Role 2">Role 2</option>
                        </select>

                        <select v-model="selectedDepartment" class="select-option" name="" id="">
                            <option value="" disabled>Department</option>
                            <option value="Department 1">Department 1</option>
                            <option value="Department 2">Department 2</option>
                        </select>
                        <textarea name="" class="input-style col-span-1 sm:col-span-2" placeholder="Address"></textarea>
                    </div>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Update </button>
                    </div>
                </div>
            </div>

            <!-- Delete User Modal -->
            <div v-if="deleteUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deleteUserModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Delete User Modal</h3>

                    <p class="mt-4 text-gray-600"> Are you sure you want to delete
                        <strong>{{ selectedUser?.name }}</strong>?
                    </p>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button" > Confirm  </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Management -->
        <div v-if="activeTab === 'roleRecordTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class=" flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800"> Role Management </h2>
                <div><button class="common-button" @click="addNewRole = true">+ Add Role</button></div>
            </div>

            <!-- Add New Role Modal-->
            <div v-if="addNewRole" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="addNewRole = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Add New Role</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2 mb-2">
                        <input type="text" name="" class="input-style" placeholder="Role name (lowercase nospaces)">
                        <input type="text" name="" class="input-style" placeholder="Display name">
                        <textarea name="" class="input-style col-span-1 sm:col-span-2" placeholder="Description (Optional)"></textarea>
                    </div>
                    <strong>Permissions</strong>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 mt-2">
                        <div><input type="checkbox" name="" id=""> Permission 1</div>
                        <div><input type="checkbox" name="" id=""> Permission 2</div>
                        <div><input type="checkbox" name="" id=""> Permission 3</div>
                        <div><input type="checkbox" name="" id=""> Permission 4</div>
                        <div><input type="checkbox" name="" id=""> Permission 5</div>
                        <div><input type="checkbox" name="" id=""> Permission 6</div>
                    </div>

                    <div class="mt-2 flex justify-end"> <button class="common-button"> Confirm </button> </div>
                </div>
            </div>

            <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-th">Display Name</th>
                                <th class="table-th">Name</th>
                                <th class="table-th">Description</th>
                                <th class="table-th">Permissions</th>
                                <th class="table-th">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="RoleManagmentRecord in RoleManagmentRecords" :key="RoleManagmentRecord.id" class="hover:bg-gray-50">
                                <td class="table-td" > {{ RoleManagmentRecord.displayname }} </td>
                                <td class="table-td" > {{ RoleManagmentRecord.username }} </td>
                                <td class="table-td" > {{ RoleManagmentRecord.description }} </td>
                                <td class="table-td">
                                    <span
                                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                    >
                                        {{ RoleManagmentRecord.permissions }}
                                    </span>
                                </td>
                                <td class="table-td">
                                    <button title="Edit Role" @click="editRoleModal = true"> <EditIcon /> </button>
                                    <button title="Delete Role" @click="openDeleteRoleModal(RoleManagmentRecord)"> <DeleteIcon /> </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Edit Role Modal -->
            <div v-if="editRoleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="editRoleModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Edit Role Modal</h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2 mb-2">
                        <input type="text" name="" class="input-style" placeholder="Role name (lowercase nospaces)">
                        <input type="text" name="" class="input-style" placeholder="Display name">
                        <textarea name="" class="input-style col-span-1 sm:col-span-2" placeholder="Description (Optional)"></textarea>
                    </div>
                    <strong>Permissions</strong>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 mt-2">
                        <div><input type="checkbox" name="" id=""> Permission 1</div>
                        <div><input type="checkbox" name="" id=""> Permission 2</div>
                        <div><input type="checkbox" name="" id=""> Permission 3</div>
                        <div><input type="checkbox" name="" id=""> Permission 4</div>
                        <div><input type="checkbox" name="" id=""> Permission 5</div>
                        <div><input type="checkbox" name="" id=""> Permission 6</div>
                    </div>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Update </button>
                    </div>
                </div>
            </div>

            <!-- Delete Role Modal -->
            <div v-if="deleteRoleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deleteRoleModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Delete Role Modal</h3>
                    <p class="mt-4 text-gray-600">
                        Are you sure you want to delete <strong>{{ selectedRole?.displayname }}</strong>?
                    </p>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Confirm </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Permission Table -->
        <div v-if="activeTab === 'permissionRecordTab'" class="border-x border-b rounded-lg border-black p-5" >
            <div class=" flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800"> Permission Overview </h2>
                <div class="flex gap-2">
                    <div><button class="common-button flex gap-2" @click="editPermissionModal = true"> <EditIcon /> Edit Permission</button></div>
                    <div><button class="common-button" @click="addNewPermission = true">+ Add Permission</button></div>
                </div>
            </div>

            <!-- Add New Permission Modal -->
            <div v-if="addNewPermission" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="addNewPermission = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Add New Permission</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2">
                        <input type="text" name="" class="input-style" placeholder="Permission name">
                        <input type="text" name="" class="input-style" placeholder="Display name">
                    </div>
                    <input type="text" name="" class="input-style mt-2" placeholder="Module name (e.g User, Role, Permission)">
                    <textarea name="" class="input-style col-span-1 sm:col-span-2 mt-2" placeholder="Description (Optional)"></textarea>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Confirm </button>
                    </div>
                </div>
            </div>

            <!-- Edit Permission Modal -->
            <div v-if="editPermissionModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="editPermissionModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Edit Permission</h3>
                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-4">
                        <span class="permission-tags"> View </span>
                        <span class="permission-tags"> ADD </span>
                        <span class="permission-tags"> Edit </span>
                        <span class="permission-tags"> Delete </span>
                    </div>

                    <div class="mt-2 flex justify-end"> <button class="common-button"> Update </button> </div>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-2 rounded-lg bg-white p-6 shadow mt-2">
                <div class="w-full"><strong>Permissions</strong></div>
                <span class="permission-tags"> View </span>
                <span class="permission-tags"> ADD </span>
                <span class="permission-tags"> Edit </span>
                <span class="permission-tags"> Delete </span>
            </div>
        </div>
    </AppLayout>
</template>