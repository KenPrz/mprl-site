<template>
  <div>
    <div class="flex border-b-2">
      <div v-for="category in projectCategory" :key="category.id" @click="selectCategory(category.id)"
        :class="['cursor-pointer px-4 py-2', selectedCategory === category.id ? 'active-tab' : 'inactive-tab']">
        {{ category.name }}
      </div>
    </div>
    <div class="carousel grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
      <div class="">
        <div class="carousel-inner" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
          <div class="carousel-item m-4 p-4" v-for="(project, index) in paginatedProjects" :key="index">
            <div class="project-card cursor-pointer" v-for="proj in project" :key="proj.id" @click="openModal(proj)">
              <img
                :src="proj.first_image ? `/storage/${proj.first_image.images}` : '/images/products-images/solarpanel.png'"
                class="w-full h-60 object-cover rounded-2xl shadow-xl">
              <div class="mt-5">
                <h3 class="font-bold text-lg text-blue-500">{{ proj.title }}</h3>
                <div class="flex">
                  <p class="text-blue-600 font-semibold text-sm">System Size: <span class="text-orange-500">{{
                      proj.system_size }}kWp</span></p>
                  <p class="text-blue-600 font-semibold text-sm ml-5">Monthly Saving: <span class="text-orange-500">₱{{
                    proj.monthly_saving }}/month</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" @click="prevSlide">&#10094;</button>
        <button class="carousel-control-next" @click="nextSlide">&#10095;</button>
      </div>
    </div>
    <div class="carousel-dots">
      <span v-for="(project, index) in paginatedProjects" :key="index" class="dot"
        :class="{ active: currentSlide === index }" @click="goToSlide(index)"></span>
    </div>

    <!-- Updated Modal with Image Carousel -->
    <transition name="modal">
      <div v-if="selectedProject" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg max-w-4xl w-full relative modal-content">
          <button @click="closeModal" class="absolute top-4 right-4 text-2xl">&times;</button>
          
          <h2 class="text-2xl font-bold mb-6 text-blue-800">{{ getCategoryName(selectedProject.category_id) }} Project Highlight</h2>
          
          <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 pr-0 md:pr-4 mb-4 md:mb-0">
              <!-- Main Image Container -->
              <div class="relative h-64 mb-4">
                <transition name="fade" mode="out-in">
                  <img
                    :key="currentImageIndex"
                    :src="currentImage"
                    class="w-full h-full object-cover rounded-lg absolute top-0 left-0"
                    alt="Project Image"
                  >
                </transition>
              </div>
              <!-- Thumbnail Images -->
              <div class="flex space-x-2 overflow-x-auto">
                <img
                  v-for="(image, index) in selectedProject.images"
                  :key="image.id"
                  :src="`/storage/${image.images}`"
                  @mouseenter="setCurrentImage(index)"
                  @click="setCurrentImage(index)"
                  class="w-16 h-16 object-cover rounded cursor-pointer transition-opacity duration-300"
                  :class="{ 'opacity-50': index !== currentImageIndex, 'ring-2 ring-blue-500': index === currentImageIndex }"
                  alt="Thumbnail"
                >
              </div>
            </div>
            
            <div class="w-full md:w-1/2 pl-0 md:pl-4">
              <h3 class="text-3xl font-semibold mb-4">{{ selectedProject.title }}</h3>
              
              <p class="mb-2">
                <span class="font-semibold text-orange-500">System Size:</span> 
                {{ selectedProject.system_size }} kWp
              </p>
              <p class="mb-4">
                <span class="font-semibold text-orange-500">Monthly Savings:</span> 
                Over ₱{{ selectedProject.monthly_saving }}
              </p>
              <div class="h-32 overflow-y-auto">
                <p class="text-gray-700 text-md">{{ selectedProject.content }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'CustomCarousel',
  props: {
    projectCategory: {
      type: Array,
      default: () => [],
      required: true,
    },
    projects: {
      type: Array,
      default: () => [],
      required: true,
    },
    itemsPerPage: {
      type: Number,
      default: 2,
    }
  },
  data() {
    return {
      selectedCategory: null,
      currentSlide: 0,
      selectedProject: null,
      currentImageIndex: 0,
    };
  },
  computed: {
    paginatedProjects() {
      const perPage = 1;
      return this.filteredProjects.reduce((resultArray, item, index) => {
        const chunkIndex = Math.floor(index / perPage);

        if (!resultArray[chunkIndex]) {
          resultArray[chunkIndex] = [];
        }

        resultArray[chunkIndex].push(item);

        return resultArray;
      }, []);
    },
    filteredProjects() {
      if (this.selectedCategory === null) return this.projects;
      return this.projects.filter(project => project.category_id === this.selectedCategory);
    },
    currentImage() {
      if (this.selectedProject && this.selectedProject.images && this.selectedProject.images.length > 0) {
        return `/storage/${this.selectedProject.images[this.currentImageIndex].images}`;
      }
      return '/images/products-images/solarpanel.png';
    },
  },
  mounted() {
    if (this.projectCategory.length > 0) {
      this.selectedCategory = this.projectCategory[0].id;
    }
  },
  methods: {
    prevSlide() {
      this.currentSlide = (this.currentSlide - 1 + this.paginatedProjects.length) % this.paginatedProjects.length;
    },
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.paginatedProjects.length;
    },
    goToSlide(index) {
      this.currentSlide = index;
    },
    selectCategory(categoryId) {
      this.selectedCategory = categoryId;
      this.currentSlide = 0; // Reset to first slide when changing category
    },
    openModal(project) {
      this.selectedProject = project;
      this.currentImageIndex = 0; // Reset to first image when opening modal
    },
    closeModal() {
      this.selectedProject = null;
    },
    getCategoryName(categoryId) {
      const category = this.projectCategory.find(cat => cat.id === categoryId);
      return category ? category.name : 'Unknown';
    },
    setCurrentImage(index) {
      this.currentImageIndex = index;
    },
  },
};
</script>

<style>
.active-tab {
  font-weight: bold;
  color: #003e57;
  border-bottom: 2px solid #00b050;
}

.inactive-tab {
  color: #c0c0c0;
}

.carousel {
  position: relative;
  overflow: hidden;
}

.carousel-inner {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.carousel-item {
  flex: 0 0 100%;
  max-width: 100%;
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: black;
  border: none;
  padding: 10px;
  cursor: pointer;
}

.carousel-control-prev {
  left: 10px;
}

.carousel-control-next {
  right: 10px;
}

.carousel-dots {
  text-align: center;
  margin-top: 10px;
}

.carousel-dots .dot {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 5px;
  background-color: #ccc;
  border-radius: 50%;
  cursor: pointer;
}

.carousel-dots .dot.active {
  background-color: #333;
}

/* Modal Transition Styles */
.modal-enter-active, .modal-leave-active {
  transition: opacity 0.3s, transform 0.3s;
}

.modal-enter-from, .modal-leave-to {
  opacity: 0;
  transform: translateY(20px);
}

.modal-enter-to, .modal-leave-from {
  opacity: 1;
  transform: translateY(0);
}

.modal-content {
  transition: transform 0.3s;
}

.modal-enter-active .modal-content {
  transform: translateY(20px);
}

.modal-enter-to .modal-content {
  transform: translateY(0);
}

/* Fade transition for main image */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>