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
        <div class="p-4 sm:p-6 lg:p-8">
            <div class="max-w-7xl mx-auto space-y-6">
                <div class="flex justify-start">
                    <Link class="bg-main-400 px-4 py-2 rounded-md text-white hover:bg-main-500" :href="route('admin.products.index')">
                        <i class="fa-solid fa-arrow-left mr-2"></i><span>Back</span>
                    </Link>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="form-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <input id="form-name" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.name" type="text" required>
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Select Category</label>
                            <select id="category" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.category_id">
                                <option disabled selected>Category</option>
                                <option v-for="category in props.categories" :key="category.id" :value="category.id">{{category.name}}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.category_id" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="prod-name" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea class="w-full h-40 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.description"></textarea>
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-sm font-medium text-gray-700">Image/s <span class="text-xs">(max 3 images upload)</span></label>
                                <div class="bg-green-500 px-3 py-1 rounded-lg text-white">
                                    <input type="file" multiple @change="handleFiles" class="hidden" id="file-upload" />
                                    <label for="file-upload" class="flex items-center cursor-pointer">
                                        <i class="fa-solid fa-plus text-xl mr-1"></i>
                                        <span class="hidden sm:inline">Add Images</span>
                                    </label>
                                </div>
                            </div>
                            <div class="bg-gray-300 rounded-lg w-full h-40 flex items-center justify-center overflow-hidden">
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
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4">Product Specifications</h3>
                        <div class="mb-4">
                            <h4 class="font-medium mb-2">General Information <span class="text-sm font-normal">(Fields with * are required)</span></h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div>
                                    <label for="form-price" class="block text-sm font-medium text-gray-700 mb-1">Current Price</label>
                                    <input id="form-price" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.price" type="text">
                                    <InputError class="mt-1" :message="form.errors.price" />
                                </div>
                                <div>
                                    <label for="form-discount" class="block text-sm font-medium text-gray-700 mb-1">Discount</label>
                                    <input id="form-discount" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent"  v-model="form.discount" type="text">
                                    <InputError class="mt-1" :message="form.errors.discount" />
                                </div>
                                <div>
                                    <label for="form-warranty" class="block text-sm font-medium text-gray-700 mb-1">Warranty*</label>
                                    <input id="form-warranty" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.warranty" type="text">
                                    <InputError class="mt-1" :message="form.errors.warranty" />
                                </div>
                                <div>
                                    <label for="form-stock-level" class="block text-sm font-medium text-gray-700 mb-1">Stock Level</label>
                                    <input id="form-stock-level" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.stock_level" type="text">
                                    <InputError class="mt-1" :message="form.errors.stock_level" />
                                </div>
                                <div>
                                    <label for="form-supplier" class="block text-sm font-medium text-gray-700 mb-1">Supplier*</label>
                                    <input id="form-supplier" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.supplier" type="text">
                                    <InputError class="mt-1" :message="form.errors.supplier" />
                                </div>
                                <div>
                                    <label for="is_featured" class="block text-sm font-medium text-gray-700 mb-1">Displayed</label>
                                    <Toggle v-model="form.is_displayed" class="mt-1" />
                                    <InputError class="mt-1" :message="form.errors.is_displayed" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2">Technical Information <span class="text-sm font-normal">(Fields with * are required)</span></h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div>
                                    <label for="form-power-out" class="block text-sm font-medium text-gray-700 mb-1">Power Out*</label>
                                    <input id="form-power-out" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.power_out" type="text">
                                    <InputError class="mt-1" :message="form.errors.power_out" />
                                </div>
                                <div>
                                    <label for="form-efficiency" class="block text-sm font-medium text-gray-700 mb-1">Efficiency*</label>
                                    <input id="form-efficiency" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.efficiency" type="text">
                                    <InputError class="mt-1" :message="form.errors.efficiency" />
                                </div>
                                <div>
                                    <label for="form-voltage" class="block text-sm font-medium text-gray-700 mb-1">Voltage*</label>
                                    <input id="form-voltage" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.voltage" type="text">
                                    <InputError class="mt-1" :message="form.errors.voltage" />
                                </div>
                                <div>
                                    <label for="form-dimension" class="block text-sm font-medium text-gray-700 mb-1">Dimensions*</label>
                                    <input id="form-dimension" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.dimension" type="text">
                                    <InputError class="mt-1" :message="form.errors.dimension" />
                                </div>
                                <div>
                                    <label for="form-weight" class="block text-sm font-medium text-gray-700 mb-1">Weight*</label>
                                    <input id="form-weight" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.weight" type="text">
                                    <InputError class="mt-1" :message="form.errors.weight" />
                                </div>
                                <div>
                                    <label for="form-current" class="block text-sm font-medium text-gray-700 mb-1">Current*</label>
                                    <input id="form-current" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.current" type="text">
                                    <InputError class="mt-1" :message="form.errors.current" />
                                </div>
                                <div>
                                    <label for="form-temp_coeff" class="block text-sm font-medium text-gray-700 mb-1">Temperature Coefficient*</label>
                                    <input id="form-temp_coeff" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.temp_coeff" type="text">
                                    <InputError class="mt-1" :message="form.errors.temp_coeff" />
                                </div>
                                <div>
                                    <label for="form-type" class="block text-sm font-medium text-gray-700 mb-1">Type*</label>
                                    <input id="form-type" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.type" type="text">
                                    <InputError class="mt-1" :message="form.errors.type" />
                                </div>
                                <div>
                                    <label for="form-certification" class="block text-sm font-medium text-gray-700 mb-1">Certification*</label>
                                    <input id="form-certification" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.certification" type="text">
                                    <InputError class="mt-1" :message="form.errors.certification" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-green-500 px-4 py-2 text-white rounded-lg hover:bg-green-600" @click="updateProduct">
                            Update Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style scoped>
textarea {
  width: 100%;
  height: 90%;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
</style>