<template>
  <div>
    <div class="flex border-b-2">
      <div
        v-for="category in projectCategory"
        :key="category.id"
        @click="selectCategory(category.id)"
        :class="['cursor-pointer px-4 py-2', selectedCategory === category.id ? 'active-tab' : 'inactive-tab']"
      >
        {{ category.name }}
      </div>
    </div>
    <div class=" carousel grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
      <div class="">
        <div class="carousel-inner" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
          <div class="carousel-item m-4 border rounded-2xl shadow-lg p-4" v-for="(project, index) in paginatedProjects" :key="index">
            <div class="project-card" v-for="(proj, i) in project" :key="proj.id">
              <img :src="proj.first_image ? `/storage/${proj.first_image.images}` : '/images/products-images/solarpanel.png'" class="w-full h-60 object-cover rounded-2xl">
              <div class="mt-5">
                <h3 class="font-bold text-lg text-blue-500">{{ proj.title }}</h3>
                <div class="flex">
                  <p class="text-blue-600 font-semibold text-sm">System Size: <span class="text-orange-500">{{ proj.system_size }}kWp</span></p>
                  <p class="text-blue-600 font-semibold text-sm ml-5">Monthly Saving: <span class="text-orange-500">{{ proj.monthly_saving }}</span></p>
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
          <span v-for="(project, index) in paginatedProjects" :key="index" class="dot" :class="{ active: currentSlide === index }" @click="goToSlide(index)"></span>
        </div>
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
    };
  },
  computed: {
    paginatedProjects() {
      const perPage = 1;
      return this.filteredProjects.reduce((resultArray, item, index) => { 
        const chunkIndex = Math.floor(index/perPage);

        if(!resultArray[chunkIndex]) {
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
  },
  mounted() {
    // Select the first category by default
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
    },
  },
};
</script>


<style>
.active-tab {
  font-weight: bold;
  color: #003e57; /* Change to desired color */
  border-bottom: 2px solid #00b050; /* Change to desired underline color */
}
.inactive-tab {
  color: #c0c0c0
  ; /* Greyed out color */
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
  /* background-color: rgba(0, 0, 0, 0.5); */
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
</style>
