<script setup lang="ts">
    import AppLayout from "../../components/AppLayout.vue";
    import DeleteIcon from "../../components/icons/DeleteIcon.vue";
    import FailedIcon from "../../components/icons/FailedIcon.vue";
    import IntegrationIcon from "../../components/icons/IntegrationIcon.vue";
    import EditIcon from "../../components/icons/EditIcon.vue";
    import PendingIcon from "../../components/icons/PendingIcon.vue";
    import ResetIcon from "../../components/icons/ResetIcon.vue";
    import DownloadIcon from "../../components/icons/DownloadIcon.vue";
    import { ref } from 'vue';

    const bulkProductModal = ref(false);
    const addProductModal = ref(false);
    const editProductModal = ref(false);
    const deleteProductModal = ref(false);
    const selectedProduct = ref<any>(null);
    const selectedCategory = ref('');
    const selectedSubCategory = ref('');
    const selectedColor = ref('');
    const selectedSize = ref('');
    const switch1 = ref(false);
    const openProductEditModal = (product: any) =>{
        selectedProduct.value = {...product};
        switch1.value = product.status === "Active";
        editProductModal.value = true;
    };

    const updateProduct = () => {
        if (!selectedProduct.value) return;

        const index = products.value.findIndex(
            products => products.id === selectedProduct.value.id
        );

        if (index !== -1) {
            products.value[index] = {
                ...selectedProduct.value,
                status: switch1.value ? "Active" : "Inactive",
            };
        }

        editProductModal.value = false;
        selectedProduct.value = null;
    };

    const deleteProduct = () => {
        if (!selectedProduct.value) return;

        products.value = products.value.filter(
            products => products.id !== selectedProducts.value.id
        );

        deleteProductModal.value = false;
        selectedProduct.value = null;
    };

    const openProductDeleteModal = (product:any)=>{
        selectedProduct.value = product;
        deleteProductModal.value = true;
    }

    const products = [
        {
            id: 1,
            sku: "ABC-001",
            name: "iPhone",
            category: "Mobile",
            price: "$999",
            stock: 25,
            status: "Active",
        },
        {
            id: 2,
            sku: "ABC-002",
            name: "MacBook",
            category: "Laptop",
            price: "$1299",
            stock: 10,
            status: "Active",
        },
        {
            id: 3,
            sku: "ABC-003",
            name: "AirPods",
            category: "Accessories",
            price: "$249",
            stock: 40,
            status: "Inactive",
        },
    ];
</script>

<template>
    <AppLayout>
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-semibold text-gray-800"> Products Record </h2>
            <div class="flex gap-2">
                <button class="common-button" @click="bulkProductModal = true"> + Bulk Product Upload </button>
                <button class="common-button" @click="addProductModal = true"> + Add Product </button>
            </div>
        </div>

        <!-- Modals -->
        <!-- Bulk Product Upload Modal -->
        <div v-if="bulkProductModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="bulkProductModal = false">X</button>

                <h3 class="modal-inner-heading">Bluk Products Upload</h3>
                <input type="file" class="input-style mt-2" name="" >

                <div class="bg-blue-200 mt-2 rounded p-2"> <label for="">Example: Product 1, Product 2</label> </div>

                <div class="mt-2 flex gap-2"><DownloadIcon class="h-5 w-5"/><a class="text-blue-500 hover:text-blue-700" href="/templates/product-template.csv" download> Download Template</a></div>

                <div class="mt-2 flex justify-end"> <button class="common-button" > Confirm </button> </div>
            </div>
        </div>

        <!-- Add Product Modal -->
        <div v-if="addProductModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="relative w-full max-w-2xl rounded-lg bg-white p-6 shadow-xl">
                <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-500"
                @click="addProductModal = false">X</button>

                <h3 class="text-lg font-semibold text-gray-800">Add New Product</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2">
                    <input type="text" name="" class="input-style" placeholder="Product name">
                    <input type="text" name="" class="input-style" placeholder="Product sku">

                    <select v-model="selectedCategory" class="select-option" name="" id="">
                        <option value="" disabled>Category</option>
                        <option value="Cat 1">Cat 1</option>
                        <option value="Cat 2">Cat 2</option>
                    </select>

                    <select v-model="selectedSubCategory" class="select-option" name="" id="">
                        <option value="" disabled>Sub Category</option>
                        <option value="Sub Cat 1">Sub Cat 1</option>
                        <option value="Sub Cat 2">Sub Cat 2</option>
                    </select>

                    <select v-model="selectedColor" class="select-option" name="" id="">
                        <option value="" disabled>Select Color</option>
                        <option value="Color 1">Color 1</option>
                        <option value="Color 2">Color 2</option>
                    </select>

                    <select v-model="selectedSize" class="select-option" name="" id="">
                        <option value="" disabled>Select Size</option>
                        <option value="Size 1">Size 1</option>
                        <option value="Size 2">Size 2</option>
                    </select>

                    <input type="text" name="" class="input-style" placeholder="Cost Price">
                    <input type="text" name="" class="input-style" placeholder="Sale Price">
                    <input type="text" name="" class="input-style" placeholder="Min Stock">
                    <input type="text" name="" class="input-style" placeholder="Actual Stock">
                </div>
                <input type="file" class="input-style mt-4 w-full" name="" >
                <div class="mt-2 flex justify-end">
                    <button class="common-button" > Confirm  </button>
                </div>
            </div>
        </div>

        <!-- Edit product Modal -->
        <div v-if="editProductModal" class="modal-outer-div">
            <div class="modal-inner-div !max-w-2xl">
                <button type="button" class="modal-cross-sign" @click="editProductModal = false">X</button>

                <h3 class="modal-inner-heading">Edit product</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2">
                    <input v-if="selectedProduct" v-model="selectedProduct.name" type="text" name="" class="input-style" placeholder="Product name">
                    <input type="text" name="" class="input-style" placeholder="Product sku">

                    <select v-model="selectedCategory" class="select-option" name="" id="">
                        <option value="" disabled>Category</option>
                        <option value="Cat 1">Cat 1</option>
                        <option value="Cat 2">Cat 2</option>
                    </select>

                    <select v-model="selectedSubCategory" class="select-option" name="" id="">
                        <option value="" disabled>Sub Category</option>
                        <option value="Sub Cat 1">Sub Cat 1</option>
                        <option value="Sub Cat 2">Sub Cat 2</option>
                    </select>

                    <select v-model="selectedColor" class="select-option" name="" id="">
                        <option value="" disabled>Select Color</option>
                        <option value="Color 1">Color 1</option>
                        <option value="Color 2">Color 2</option>
                    </select>

                    <select v-model="selectedSize" class="select-option" name="" id="">
                        <option value="" disabled>Select Size</option>
                        <option value="Size 1">Size 1</option>
                        <option value="Size 2">Size 2</option>
                    </select>

                    <input type="text" name="" class="input-style" placeholder="Cost Price">
                    <input type="text" name="" class="input-style" placeholder="Sale Price">
                    <input type="text" name="" class="input-style" placeholder="Min Stock">
                    <input type="text" name="" class="input-style" placeholder="Actual Stock">
                    <input type="file" class="input-style" name="" >
    
                    <label class="inline-flex cursor-pointer items-center" title="Inctivate product">
                        <input v-model="switch1" type="checkbox" class="peer sr-only" >
                        <div class="switch-toggle-button" ></div>
                    </label>
                </div>

                <div class="mt-2 flex justify-end">
                    <button class="common-button" @click="updateProduct"> Update </button>
                </div>
            </div>
        </div>

        <!-- Delete product Modal -->
        <div v-if="deleteProductModal" class="modal-outer-div">
            <div class="modal-inner-div">
                <button type="button" class="modal-cross-sign" @click="deleteProductModal = false">X</button>

                <h3 class="modal-inner-heading">Delete Product</h3>

                <p class="mt-4 text-gray-600">
                    Are you sure you want to delete
                    <strong>{{ selectedProduct?.name }}</strong>?
                </p>

                <div class="mt-6 flex justify-center gap-2">
                    <button class="cancel-button" @click="deleteProductModal = false"> Cancel </button>
                    <button class="confirm-button" @click="deleteProduct"> Confirm </button>
                </div>
            </div>
        </div>

        <!-- Top Cards -->
        <div class="card-main-div">
            <div class="card-inner-div">
                <p class="text-sm font-medium text-blue-500 flex gap-2"> <IntegrationIcon /> Total Products</p>
                <p class="mt-2 text-3xl font-bold text-blue-800">8000</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-green-500 flex gap-2"> <PendingIcon /> Inactive Products</p>
                <p class="mt-2 text-3xl font-bold text-green-800">1,200</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-yellow-500 flex gap-2"> <FailedIcon /> Out of Stock</p>
                <p class="mt-2 text-3xl font-bold text-yellow-800">500</p>
            </div>

            <div class="card-inner-div">
                <p class="text-sm font-medium text-red-500 flex gap-2"> <ResetIcon /> Zero Stock Products</p>
                <p class="mt-2 text-3xl font-bold text-red-800">1250</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-2 mt-2">
            <div class="col-span-3"> <input type="text" name="" class="input-style w-64" placeholder="search..."> </div>

            <div class="col-span-2">
                <select v-model="selectedCategory" class="select-option" name="" id="">
                    <option value="" disabled>Category</option>
                    <option value="Cat 1">Cat 1</option>
                    <option value="Cat 2">Cat 2</option>
                </select>
            </div>

            <div class="col-span-2">
                <select v-model="selectedSubCategory" class="select-option" name="" id="">
                    <option value="" disabled>Sub Category</option>
                    <option value="Sub Cat 1">Sub Cat 1</option>
                    <option value="Sub Cat 2">Sub Cat 2</option>
                </select>
            </div>

            <div class="col-span-2">
                <select v-model="selectedColor" class="select-option w-32" name="" id="">
                    <option value="" disabled>Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="col-span-2">
                <select v-model="selectedSize" class="select-option w-32" name="" id="">
                    <option value="" disabled>Stock status</option>
                    <option value="In stock">In stock</option>
                    <option value="Low stock">Low stock</option>
                    <option value="Out of stock">Out of stock</option>
                </select>
            </div>

            <div class="col-span-1"> <button class="common-button flex items-center justify-center gap-2 w-full !h-11"> <DownloadIcon /> Export</button> </div>
        </div>

        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">ID</th>
                            <th class="table-th">Product SKU</th>
                            <th class="table-th">Product Name</th>
                            <th class="table-th">Category</th>
                            <th class="table-th">Price</th>
                            <th class="table-th">Stock</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="product in products" :key="product.id" class="hover:bg-gray-50">
                            <td class="table-td" > {{ product.id }} </td>
                            <td class="table-td" > {{ product.sku }} </td>
                            <td class="table-td" > {{ product.name }} </td>
                            <td class="table-td" > {{ product.category }} </td>
                            <td class="table-td" > {{ product.price }} </td>
                            <td class="table-td" > {{ product.stock }} </td>

                            <td class="table-td">
                                <span
                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                                >
                                    {{ product.status }}
                                </span>
                            </td>

                            <td class="table-td">
                                <button title="Edit Product"> <EditIcon @click="openProductEditModal(product)" /> </button>
                                <button title="Delete Product"> <DeleteIcon @click="openProductDeleteModal(product)" /> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
