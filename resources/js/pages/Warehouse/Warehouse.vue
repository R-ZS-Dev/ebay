<script setup lang="ts">
    import AppLayout from '../../components/AppLayout.vue';
    import { ref } from 'vue';
    import DownloadIcon from '../../components/icons/DownloadIcon.vue';
    import EditIcon from '../../components/icons/EditIcon.vue';
    import DeleteIcon from '../../components/icons/DeleteIcon.vue';
    import EyeIcon from '../../components/icons/EyeIcon.vue';
    import IntegrationIcon from '../../components/icons/IntegrationIcon.vue';
    import PendingIcon from '../../components/icons/PendingIcon.vue';
    import OutofStock from '../../components/icons/OutofStock.vue';

    const manageStockModal = ref(false);
    const uploadCSVModal = ref(false);
    const addWarehouseVModal = ref(false);
    const importWarehouseCSVModal = ref(false);
    const updateWarehouseStockModal = ref(false);
    const switch1 = ref(false);
    const switch2 = ref(false);
    const switch3 = ref(false);
    const switch4 = ref(false);
    const selectedWarehouse = ref('');
    const selectedCategory = ref('');
    const selectedSubCategory = ref<string[]>([]);
    const showSubCategory = ref(false);
    const editSelectedCategory = ref('');
    const editSelectedSubCategory = ref<string[]>([]);
    const editShowSubCategory = ref(false);
    const deactiveWarehouseModal = ref(false);
    const viewWarehouseModal = ref(false);
    const editWarehouseModal = ref(false);
    const deleteWarehouseModal = ref(false);
    const selectedWarehouseCategory = ref('');
    const selectedWarehouseSubCategory = ref('');
    const selectedProduct = ref('');

    const warehouses = [
        {
            id: 1,
            warehouse: "ABC-001",
            category: "Cat 1",
            subcategory: "Sub Cat 1",
            product: "Product 1",
            totalstock: 55,
            address: "XYZ-0009",
            status: "Active",
            main: "Main 1",
            action: "Active",
        }
    ];

    const warehouseStockRecords = [
        {
            id: 1,
            sku: "ABC-001",
            category: "Cat 1",
            subcategory: "Sub Cat 1",
            product: "Product 1",
            status: "Active",
            totalstock: 55,
            action: "Active",
        }
    ];
</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Warehouse </h2>
            <div class="flex gap-2">
                <button class="common-button" @click="manageStockModal = true"> + Manage Stock </button>
                <button class="common-button" @click="uploadCSVModal = true"> + Upload Stock CSV </button>
                <button class="common-button" @click="importWarehouseCSVModal = true"> + Import Warehouse CSV </button>
                <button class="common-button" @click="addWarehouseVModal = true"> + Add Warehouse </button>
            </div>
        </div>

        <!-- Manage Stock Modal -->
        <div v-if="manageStockModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-2xl rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="manageStockModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Update Warehouse Stock</h3>
                <span>Set the exact stock quantity for one or more warehouse products.</span>
                <hr>
                <div class="mt-2">
                    <strong>Warehouse 1</strong>
                    <div>Select a warehouse, product, and its final stock quantity.</div>
                    <div class="mt-2">
                        <form action="" method="POST">
                            <div class="rounded-lg border border-gray-300 bg-gray-100 p-2 mt-2">
                                <select v-model="selectedWarehouse" class="select-option mt-2" name="" id="">
                                    <option value="" disabled>Warehouse</option>
                                    <option value="Warehouse 1">Warehouse 1</option>
                                    <option value="Warehouse 2">Warehouse 2</option>
                                </select>
                                <div class="grid grid-cols-2 gap-4 mt-2">
                                    <div>                                    
                                        <select v-model="selectedWarehouseCategory" class="select-option" name="" id="">
                                            <option value="" disabled>Cat</option>
                                            <option value="cat 1">cat 1</option>
                                            <option value="cat 2">cat 2</option>
                                        </select>
                                    </div>
                                    <div>
                                        <select v-model="selectedWarehouseSubCategory" class="select-option" name="" id="">
                                            <option value="" disabled>Sub Cat</option>
                                            <option value="subCat 1">Sub Cat 1</option>
                                            <option value="subCat 2">Sub Cat 2</option>
                                        </select>
                                    </div>
                                    <div>
                                        <select v-model="selectedProduct" class="select-option" name="" id="">
                                            <option value="" disabled>Products</option>
                                            <option value="Product 1">Product 1</option>
                                            <option value="Product 2">Product 2</option>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="text" name="" class="input-style" placeholder="Final Stock">
                                    </div>
                                </div>
                                <div>
                                    <input type="text" name="" class="input-style mt-2" placeholder="Reference">
                                </div>
                            </div>
                            <div>
                                <button class="common-button mt-3"> Add Warehouse  </button>
                            </div>
                            <hr class="mt-2">
                            <div class="mt-2 flex justify-end">
                                <button class="common-button"> Save Stock  </button>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>

        <!-- Upload CSV Modal -->
        <div v-if="uploadCSVModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-2xl rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="uploadCSVModal = false">X</button>

                <h3 class="modal-inner-heading">Bulk Stock Upload</h3>
                <span>Upload a CSV with warehouse_code, master_sku, stock and reference.</span>
                <div class="bg-blue-200 mt-2 rounded p-2"> <label for="">The stock value replaces the current warehouse stock. Use 0 to clear stock. Valid rows will be saved even if some rows fail.</label> </div>
                
                <input type="file" class="input-style mt-2" name="" >
                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500 hover:text-blue-700" href="/templates/warehouse-bulk-stock-template.csv" download> Download Template</a></div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm  </button>
                </div>
            </div>
        </div>

        <!-- Add Warehouse Modal -->
        <div v-if="addWarehouseVModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="addWarehouseVModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Add Warehouse</h3>
                <span>Create a new warehouse and assign subcategories.</span>
                <hr>
                <form action="" method="post">
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label>Wharehouse name</label>
                            <input type="text" name="" class="input-style" placeholder="Warehouse name">
                        </div>
                        <div>
                            <label>Wharehouse code</label>
                            <input type="text" name="" class="input-style" placeholder="WH-001">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label>Address Line 1</label>
                            <input type="text" name="" class="input-style" placeholder="Address Line 1">
                        </div>
                        <div>
                            <label>Address Line 2</label>
                            <input type="text" name="" class="input-style" placeholder="Address Line 2">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label>State/Region</label>
                            <input type="text" name="" class="input-style" placeholder="State/Region">
                        </div>
                        <div>
                            <label>City</label>
                            <input type="text" name="" class="input-style" placeholder="City">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label>Postal code</label>
                            <input type="text" name="" class="input-style" placeholder="Postal code">
                        </div>
                        <div>
                            <label>Country Code</label>
                            <input type="text" name="" class="input-style" placeholder="Country Code">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label>Email</label>
                            <input type="text" name="" class="input-style" placeholder="Email">
                        </div>
                        <div>
                            <label>Phone number</label>
                            <input type="text" name="" class="input-style" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label>Category</label>
                            <select v-model="selectedCategory" class="select-option mt-2" name="" id="">
                                <option value="" disabled>Category</option>
                                <option value="Cat 1">Cat 1</option>
                                <option value="Cat 2">Cat 2</option>
                            </select>
                        </div>
                        <div class="relative">
                            <label>Sub Category</label>

                            <button type="button" class="select-option mt-2 w-full text-left flex justify-between items-center" @click="showSubCategory = !showSubCategory">
                                <span> {{ selectedSubCategory.length ? selectedSubCategory.join(', ') : 'Sub Category' }} </span>
                                <span>▼</span>
                            </button>

                            <div v-if="showSubCategory" class="absolute z-20 mt-1 w-full rounded-md border border-gray-300 bg-white shadow-lg p-3">
                                <label class="flex items-center gap-2 py-2 cursor-pointer">
                                    <input type="checkbox" v-model="selectedSubCategory" value="Sub Cat 1" />
                                    <span>Sub Cat 1</span>
                                </label>

                                <label class="flex items-center gap-2 py-2 cursor-pointer">
                                    <input type="checkbox" v-model="selectedSubCategory" value="Sub Cat 2" />
                                    <span>Sub Cat 2</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span>Subcategory Dispatch Warehouse</span>
                        <div class="grid grid-cols-12 gap-4 mt-2 rounded-lg border border-gray-300 p-2">
                            <div class="col-span-5">Category -> Sub Category</div>
                            <div class="col-span-5">Dispatch Warehouse</div>
                            <div class="col-span-2">
                                <label class="inline-flex cursor-pointer items-center" title="Allow Warehouse">
                                    <input v-model="switch4" type="checkbox" class="peer sr-only" >
                                    <div class="switch-toggle-button" ></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2 rounded-lg border border-gray-300 p-2">
                        <div class="w-full flex flex-col gap-2">
                            <strong>Active</strong>
                            <span>Warehouse is available for operations.</span>
                            <label class="inline-flex cursor-pointer items-center" title="Deactivate Store">
                                <input v-model="switch2" type="checkbox" class="peer sr-only" >
                                <div class="switch-toggle-button" ></div>
                            </label>
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <strong>Main Warehouse</strong>
                            <span>Make this the primary warehouse.</span>
                            <label class="inline-flex cursor-pointer items-center" title="Deactivate Store">
                                <input v-model="switch3" type="checkbox" class="peer sr-only" >
                                <div class="switch-toggle-button" ></div>
                            </label>
                        </div>
                    </div>
                </form>

                <div class="mt-2 flex justify-end">
                    <button class="common-button"> Confirm </button>
                </div>
            </div>
        </div>

        <!-- Import Warehouse Modal -->
         <div v-if="importWarehouseCSVModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-2xl rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="importWarehouseCSVModal = false">X</button>

                <h3 class="modal-inner-heading">Import Warehouse CSV</h3>     
                <span>Import warehouse details, subcategories and dispatch settings.</span>           
                <div class="bg-blue-200 mt-2 rounded p-2"> <label for="">Repeat the warehouse row for each subcategory. Include all warehouse columns from the sample template. Existing warehouse codes will be updated.</label> </div>
                
                <input type="file" class="input-style mt-2" name="" >
                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500 hover:text-blue-700" href="/templates/warehouse-import-template.csv" download> Download Template</a></div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button"> Confirm </button>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card-main-div">
            <div class="grid grid-cols-1 lg:col-span-2"> <input class="input-style" type="text" name="" placeholder="Search name, address or code..."> </div>
            <!-- Category -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Select Category</option>
                    <option value="Cat 1">Cat 1</option>
                    <option value="Cat 2">Cat 2</option>
                </select> 
            </div>
            <!-- Sub Category -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Select Sub Category</option>
                    <option value="Sub Cat 1">Sub Cat 1</option>
                    <option value="Sub Cat 2">Sub Cat 2</option>
                </select> 
            </div>
            <!-- All Statuses -->
            <div class="grid grid-cols-1"> 
                <select class="select-option" name="" id="">
                    <option value="" disabled>Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select> 
            </div>
            <div class="grid grid-cols-1"> <button class="common-button">Export CSV</button> </div>
            <div class="grid grid-cols-1"> <button class="common-button">Clear Filter</button> </div>
        </div>

        <!-- Record Table -->
         <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">Warehouse</th>
                            <th class="table-th" >Category</th>
                            <th class="table-th" >Sub Category</th>
                            <th class="table-th">Product</th>
                            <th class="table-th">Total Stock</th>
                            <th class="table-th">Address</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Main</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="warehouse in warehouses" :key="warehouse.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ warehouse.warehouse }} </td>
                            <td class="table-td" > {{ warehouse.category }} </td>
                            <td class="table-td" > {{ warehouse.subcategory }} </td>
                            <td class="table-td" > {{ warehouse.product }} </td>
                            <td class="table-td" > {{ warehouse.totalstock }} </td>
                            <td class="table-td" > {{ warehouse.address }} </td>
                            <td class="table-td" > 
                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">{{ warehouse.status }}</span> 
                            </td>
                            <td class="table-td" >
                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">{{ warehouse.main }}</span>  
                            </td>
                            <td class="table-td">
                                <!-- Switch 1 -->
                                <label @click="deactiveWarehouseModal = true" class="inline-flex cursor-pointer items-center" title="Deactivate Store">
                                    <input v-model="switch1" type="checkbox" class="peer sr-only" >
                                    <div class="switch-toggle-button" ></div>
                                </label>

                                <!-- View Icon -->
                                <button type="button" class="ml-2 inline-flex items-center" title="View Warehouse">
                                    <EyeIcon @click="viewWarehouseModal = true" />
                                </button>

                                <!-- Edit Icon -->
                                <button type="button" class="ml-2 inline-flex items-center" title="Edit Warehouse">
                                    <EditIcon @click="editWarehouseModal = true" />
                                </button>

                                <!-- Delete Icon -->
                                <button type="button" class="ml-2 inline-flex items-center" title="Delete Warehouse">
                                    <DeleteIcon @click="deleteWarehouseModal = true" />
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Deactive Warehouse Modal -->
            <div v-if="deactiveWarehouseModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deactiveWarehouseModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Deactive Warehouse Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Confirm </button>
                    </div>
                </div>
            </div>

            <!-- View Warehouse Modal -->
            <div v-if="viewWarehouseModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="viewWarehouseModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Warehouse Name</h3>
                    <span>Warehouse Code</span>
                    <hr>

                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>                                    
                            <select v-model="selectedWarehouseCategory" class="select-option" name="" id="">
                                <option value="" disabled>Cat</option>
                                <option value="cat 1">cat 1</option>
                                <option value="cat 2">cat 2</option>
                            </select>
                        </div>
                        <div>
                            <select v-model="selectedWarehouseSubCategory" class="select-option" name="" id="">
                                <option value="" disabled>Sub Cat</option>
                                <option value="subCat 1">Sub Cat 1</option>
                                <option value="subCat 2">Sub Cat 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <select v-model="selectedProduct" class="select-option" name="" id="">
                            <option value="" disabled>Products</option>
                            <option value="Product 1">Product 1</option>
                            <option value="Product 2">Product 2</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div class="bg-gray-100 p-2 rounded-lg">
                            <strong>Total Products</strong>
                            <div>
                                <p class="text-lg font-lg flex gap-2 mt-1"> <IntegrationIcon class="text-blue-500" /> 8050</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-2 rounded-lg">
                            <strong>Total Products</strong>
                            <div>
                                <p class="text-lg font-lg flex gap-2 mt-1"> <PendingIcon class="text-blue-500" /> 8</p>
                            </div>
                        </div>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 mt-2">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="table-th">SKU</th>
                                <th class="table-th">Categoty</th>
                                <th class="table-th">Sub Category</th>
                                <th class="table-th">Product</th>
                                <th class="table-th">Status</th>
                                <th class="table-th">Stock</th>
                                <th class="table-th">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="warehouseStockRecord in warehouseStockRecords" :key="warehouseStockRecord.id" class="hover:bg-gray-50">
                                <td class="table-td"> {{ warehouseStockRecord.sku }} </td>
                                <td class="table-td"> {{ warehouseStockRecord.category }} </td>
                                <td class="table-td"> {{ warehouseStockRecord.subcategory }} </td>
                                <td class="table-td"> {{ warehouseStockRecord.product }} </td>
                                <td class="table-td">
                                    <span class="rounded-lg bg-green-100 px-1 py-1 font-medium text-green-700">
                                        {{ warehouseStockRecord.status }}
                                    </span>
                                </td>
                                <td class="table-td"> {{ warehouseStockRecord.totalstock }} </td>
                                <td class="table-td"> 
                                    <!-- View Icon -->
                                    <button type="button" class="ml-2 inline-flex items-center" title="Out of Stock">
                                        <OutofStock @click="updateWarehouseStockModal = true" />
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <!-- Update Warehouse Stock Modal -->
                     <div v-if="updateWarehouseStockModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                        <div class="relative w-full max-w-2xl rounded-lg bg-white p-6 shadow-xl">
                            <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                            @click="updateWarehouseStockModal = false">X</button>

                            <h3 class="text-lg font-semibold text-gray-800">Update Warehouse Stock</h3>
                            <span>Set the exact stock quantity for one or more warehouse products.</span>
                            <hr>
                            <div class="mt-2">
                                <strong>Warehouse 1</strong>
                                <div>Select a warehouse, product, and its final stock quantity.</div>
                                <div class="mt-2">
                                    <form action="" method="POST">
                                        <div class="rounded-lg border border-gray-300 bg-gray-100 p-2 mt-2">
                                            <select v-model="selectedWarehouse" class="select-option mt-2" name="" id="">
                                                <option value="" disabled>Warehouse</option>
                                                <option value="Warehouse 1">Warehouse 1</option>
                                                <option value="Warehouse 2">Warehouse 2</option>
                                            </select>
                                            <div class="grid grid-cols-2 gap-4 mt-2">
                                                <div>                                    
                                                    <select v-model="selectedWarehouseCategory" class="select-option" name="" id="">
                                                        <option value="" disabled>Cat</option>
                                                        <option value="cat 1">cat 1</option>
                                                        <option value="cat 2">cat 2</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <select v-model="selectedWarehouseSubCategory" class="select-option" name="" id="">
                                                        <option value="" disabled>Sub Cat</option>
                                                        <option value="subCat 1">Sub Cat 1</option>
                                                        <option value="subCat 2">Sub Cat 2</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <select v-model="selectedProduct" class="select-option" name="" id="">
                                                        <option value="" disabled>Products</option>
                                                        <option value="Product 1">Product 1</option>
                                                        <option value="Product 2">Product 2</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <input type="text" name="" class="input-style" placeholder="Final Stock">
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="" class="input-style mt-2" placeholder="Reference">
                                            </div>
                                        </div>
                                        <div>
                                            <button class="common-button mt-3"> Add Warehouse  </button>
                                        </div>
                                        <hr class="mt-2">
                                        <div class="mt-2 flex justify-end">
                                            <button class="common-button"> Save Stock  </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Warehouse Modal -->
            <div v-if="editWarehouseModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-3xl rounded-lg max-h-[90vh] overflow-y-auto bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="editWarehouseModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Edit Warehouse Modal</h3>
                    <span>Edit warehouse and assign subcategories.</span>
                    <hr>
                    <form action="" method="post">
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label>Wharehouse name</label>
                                <input type="text" name="" class="input-style" placeholder="Warehouse name">
                            </div>
                            <div>
                                <label>Wharehouse code</label>
                                <input type="text" name="" class="input-style" placeholder="WH-001">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label>Address Line 1</label>
                                <input type="text" name="" class="input-style" placeholder="Address Line 1">
                            </div>
                            <div>
                                <label>Address Line 2</label>
                                <input type="text" name="" class="input-style" placeholder="Address Line 2">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label>State/Region</label>
                                <input type="text" name="" class="input-style" placeholder="State/Region">
                            </div>
                            <div>
                                <label>City</label>
                                <input type="text" name="" class="input-style" placeholder="City">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label>Postal code</label>
                                <input type="text" name="" class="input-style" placeholder="Postal code">
                            </div>
                            <div>
                                <label>Country Code</label>
                                <input type="text" name="" class="input-style" placeholder="Country Code">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label>Email</label>
                                <input type="text" name="" class="input-style" placeholder="Email">
                            </div>
                            <div>
                                <label>Phone number</label>
                                <input type="text" name="" class="input-style" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label>Category</label>
                                <select v-model="editSelectedCategory" class="select-option mt-2" name="" id="">
                                    <option value="" disabled>Category</option>
                                    <option value="Cat 1">Cat 1</option>
                                    <option value="Cat 2">Cat 2</option>
                                </select>
                            </div>
                            <div class="relative">
                                <label>Sub Category</label>

                                <button type="button" class="select-option mt-2 w-full text-left flex justify-between items-center" @click="editShowSubCategory = !editShowSubCategory">
                                    <span> {{ editSelectedSubCategory.length ? editSelectedSubCategory.join(', ') : 'Sub Category' }} </span>
                                    <span>▼</span>
                                </button>

                                <div v-if="editShowSubCategory" class="absolute z-20 mt-1 w-full rounded-md border border-gray-300 bg-white shadow-lg p-3">
                                    <label class="flex items-center gap-2 py-2 cursor-pointer">
                                        <input type="checkbox" v-model="editSelectedSubCategory" value="Sub Cat 1" />
                                        <span>Sub Cat 1</span>
                                    </label>

                                    <label class="flex items-center gap-2 py-2 cursor-pointer">
                                        <input type="checkbox" v-model="editSelectedSubCategory" value="Sub Cat 2" />
                                        <span>Sub Cat 2</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <span>Subcategory Dispatch Warehouse</span>
                            <div class="grid grid-cols-12 gap-4 mt-2 rounded-lg border border-gray-300 p-2">
                                <div class="col-span-5">Category -> Sub Category</div>
                                <div class="col-span-5">Dispatch Warehouse</div>
                                <div class="col-span-2">
                                    <label class="inline-flex cursor-pointer items-center" title="Allow Warehouse">
                                        <input v-model="switch4" type="checkbox" class="peer sr-only" >
                                        <div class="switch-toggle-button" ></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2 rounded-lg border border-gray-300 p-2">
                            <div class="w-full flex flex-col gap-2">
                                <strong>Active</strong>
                                <span>Warehouse is available for operations.</span>
                                <label class="inline-flex cursor-pointer items-center" title="Deactivate Store">
                                    <input v-model="switch2" type="checkbox" class="peer sr-only" >
                                    <div class="switch-toggle-button" ></div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <strong>Main Warehouse</strong>
                                <span>Make this the primary warehouse.</span>
                                <label class="inline-flex cursor-pointer items-center" title="Deactivate Store">
                                    <input v-model="switch3" type="checkbox" class="peer sr-only" >
                                    <div class="switch-toggle-button" ></div>
                                </label>
                            </div>
                        </div>
                    </form>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Update </button>
                    </div>
                </div>
            </div>

            <!-- Delete Warehouse Modal -->
            <div v-if="deleteWarehouseModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                    @click="deleteWarehouseModal = false">X</button>

                    <h3 class="text-lg font-semibold text-gray-800">Delete Warehouse Modal</h3>

                    <div class="mt-2 flex justify-end">
                        <button class="common-button"> Confirm </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>