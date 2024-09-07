<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head } from '@inertiajs/vue3';
import Toggle from '@/Components/Toggle.vue';
import { ref, onMounted } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import Editor from '@/Components/Editor.vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    product: {
        type: Object,
        required: true
    }
});

const form = useForm({
    name: props.product.name,
    category_id: props.product.category_id,
    power_out: props.product.power_out,
    efficiency: props.product.efficiency,
    dimension: props.product.dimension,
    weight: props.product.weight,
    type: props.product.type,
    voltage: props.product.voltage,
    current: props.product.current,
    temp_coeff: props.product.temp_coeff,
    price: props.product.price,
    discount: props.product.discount,
    warranty: props.product.warranty,
    stock_level: props.product.stock_level,
    supplier: props.product.supplier,
    certification: props.product.certification,
    description: props.product.description,
    img_path: [], // Initialize with an empty array
    datasheet: props.product.datasheet,
    is_displayed: props.product.is_displayed,
});

const imagePreviews = ref(
    props.product.images.map(image => ({
        id: image.id,
        url: `/storage/${image.images}`
    }))
);

function handleFiles(event) {
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreviews.value.push({ id: i, url: e.target.result });
        };
        reader.readAsDataURL(file);
        form.img_path.push(file); // Append the file to img_path array
    }
}

function removeImage(index) {
    imagePreviews.value.splice(index, 1);
    form.img_path.splice(index, 1);
}

function updateProduct(){
    form.patch(route('admin.products.update', props.product.id), {
        onSuccess: () => {
            form.clearErrors();
        }
    });
}

onMounted(() => {
    form.clearErrors();
});
</script>

<template>
    <Head title="Update Product" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Product Information</h2>
        </template>
        <div class="py-12">
            <div class="flex flex-col space-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-start">
                    <Link class="bg-main-400 px-3  rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.products.index')">
                        <i class="fa-solid fa-arrow-left m-2"></i>Back
                    </Link>
                </div>
                <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <label for="form-name" class="block text-lg font-medium text-gray-700">Product Name</label>
                            <input id="form-name" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.name" type="text" required>
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="col-span-1">
                            <label for="form-category" class="block text-lg font-medium text-gray-700">Select Category</label>
                            <select id="category" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.category_id">
                                <option disabled selected>Category</option>
                                <option v-for="category in props.categories" :key="category.id" :value="category.id">{{category.name}}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.category_id" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <label for="prod-name" class="block text-lg font-medium text-gray-700">Description</label>
                            <textarea class="w-full h-5/6 border-2 rounded-md" v-model="form.description"></textarea>
                            <!-- <Editor v-model="form.description" /> -->
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div class="col-span-1">
                            <div class="flex justify-between">
                                <label for="prod-name" class="block text-lg font-medium text-gray-700 p-3">Image/s <sup>(max 3 images upload)</sup></label>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="bg-green-500 px-2 py-1 rounded-lg text-white">
                                        <input type="file" multiple @change="handleFiles" class="hidden" id="file-upload" />
                                        <label for="file-upload" class="flex cursor-pointer">
                                            <i class="fa-solid fa-plus text-xl"></i>
                                            <span class="ml-1 hidden sm:flex items-center">Add Images</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-300 rounded-lg w-full h-56 mt-2 flex items-center justify-center overflow-hidden">
                                <div class="flex space-x-2">
                                    <div v-for="(preview, index) in imagePreviews" :key="index" class="relative">
                                        <img :src="preview.url" class="w-24 h-24 object-cover rounded-lg" />
                                        <button @click="removeImage(index)" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Product Specifications</p>
                    <div class="border-t-4 pt-4">
                        <div class="flex"><p class="font-bold">General Information</p><sup class="ml-1 mt-2">Please fill out the fields with "*"</sup></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            <div>
                                <label for="form-price" class="block text-lg font-medium text-gray-700">Current Price</label>
                                <input id="form-price" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.price" type="text">
                                <InputError class="mt-2" :message="form.errors.price" />
                            </div>
                            <div>
                                <label for="form-discount" class="block text-lg font-medium text-gray-700">Discount</label>
                                <input id="form-discount" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"  v-model="form.discount" type="text">
                                <InputError class="mt-2" :message="form.errors.discount" />
                            </div>
                            <div>
                                <label for="form-warranty" class="block text-lg font-medium text-gray-700">Warranty*</label>
                                <input id="form-warranty" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.warranty" type="text">
                                <InputError class="mt-2" :message="form.errors.warranty" />
                            </div>
                            <div>
                                <label for="form-stock-level" class="block text-lg font-medium text-gray-700">Stock Level</label>
                                <input id="form-stock-level" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.stock_level" type="text">
                                <InputError class="mt-2" :message="form.errors.stock_level" />
                            </div>
                            <div>
                                <label for="form-supplier" class="block text-lg font-medium text-gray-700">Supplier*</label>
                                <input id="form-supplier" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.supplier" type="text">
                                <InputError class="mt-2" :message="form.errors.supplier" />
                            </div>
                            <div>
                                <label for="is_featured" class="block text-lg font-medium text-gray-700">Displayed</label>
                                <Toggle v-model="form.is_displayed" class="mt-3" />
                                <InputError class="mt-2" :message="form.errors.is_displayed" />
                            </div>
                        </div>
                        <div class="flex mt-10"><p class="font-bold">Technical Information</p><sup class="ml-1 mt-2">Please fill out the fields with "*"</sup></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            <div>
                                <label for="form-power-out" class="block text-lg font-medium text-gray-700">Power Out*</label>
                                <input id="form-power-out" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.power_out" type="text">
                                <InputError class="mt-2" :message="form.errors.power_out" />
                            </div>
                            <div>
                                <label for="form-efficiency" class="block text-lg font-medium text-gray-700">Efficiency*</label>
                                <input id="form-efficiency" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.efficiency" type="text">
                                <InputError class="mt-2" :message="form.errors.efficiency" />
                            </div>
                            <div>
                                <label for="form-voltage" class="block text-lg font-medium text-gray-700">Voltage*</label>
                                <input id="form-voltage" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.voltage" type="text">
                                <InputError class="mt-2" :message="form.errors.voltage" />
                            </div>
                            <div>
                                <label for="form-dimension" class="block text-lg font-medium text-gray-700">Dimensions*</label>
                                <input id="form-dimension" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.dimension" type="text">
                                <InputError class="mt-2" :message="form.errors.dimension" />
                            </div>
                            <div>
                                <label for="form-weight" class="block text-lg font-medium text-gray-700">Weight*</label>
                                <input id="form-weight" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.weight" type="text">
                                <InputError class="mt-2" :message="form.errors.weight" />
                            </div>
                            <div>
                                <label for="form-current" class="block text-lg font-medium text-gray-700">Current*</label>
                                <input id="form-current" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.current" type="text">
                                <InputError class="mt-2" :message="form.errors.current" />
                            </div>
                            <div>
                                <label for="form-temp_coeff" class="block text-lg font-medium text-gray-700">Temperature Coefficient*</label>
                                <input id="form-temp_coeff" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.temp_coeff" type="text">
                                <InputError class="mt-2" :message="form.errors.temp_coeff" />
                            </div>
                            <div>
                                <label for="form-type" class="block text-lg font-medium text-gray-700">Type*</label>
                                <input id="form-type" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.type" type="text">
                                <InputError class="mt-2" :message="form.errors.type" />
                            </div>
                            <div>
                                <label for="form-certification" class="block text-lg font-medium text-gray-700">Certification*</label>
                                <input id="form-certification" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.certification" type="text">
                                <InputError class="mt-2" :message="form.errors.certification" />
                            </div>
                        </div>
                        <div class="flex justify-end mt-5">
                            <input type="submit" placeholder="" class="bg-green-500 px-3 py-1 text-white rounded-lg" @click="updateProduct">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>