<template>
  <!-- Main Wrapper -->
  <div>

    <header class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <Link href="/">   
                    <img src="https://via.placeholder.com/100x40?text=Logo" alt="Logo" class="h-10" />
                </Link>
            </div>
            <!-- United Kingdom Flag and Text (Center) -->
            <div class="flex items-center space-x-2">
                <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" alt="UK Flag" class="h-6 w-10">
                <span class="text-gray-700 text-lg font-semibold">United Kingdom</span>
            </div>

            <!-- Navigation and Auth Links (Right) -->
            <nav class="hidden md:flex space-x-6 text-lg items-center">
            <a href="#" class="hover:text-blue-500">Home</a>
            <a href="#" class="hover:text-blue-500">Contact Us</a>
             <!-- Check if the user is logged in -->
                <template v-if="props.isLoggedIn">
                    <Link href="/dashboard" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Dashboard</Link>
                </template>
                
                <template v-else>
                    <button @click="openModal" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
                        Sign In
                    </button>
                    <Link href="/register" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Sign Up</Link>
                </template>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="block md:hidden focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">

            <nav class="flex flex-col items-center space-y-4 py-4">
            <a href="#" class="hover:text-blue-500">Home</a>
            <a href="#" class="hover:text-blue-500">Contact Us</a>
              <!-- Check if the user is logged in in mobile menu -->
                <template v-if="props.isLoggedIn">
                    <Link href="/dashboard" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Dashboard</Link>
                </template>
                
                <template v-else>
                    <a href="#" @click="openModal" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Sign In</a>
                    <Link href="/register" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Sign Up</Link>
                </template>
            </nav>
        </div>
    </header>

    <section class="relative">
        <div class="swiper">
            <!-- Swiper slides -->
            <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide bg-cover bg-center h-96" style="background-image: url('https://via.placeholder.com/1200x400?text=Slide+1');">
                <div class="container mx-auto px-4 py-32 text-white text-center">
                <h1 class="text-4xl font-extrabold">Welcome to Student Hub</h1>
                <p class="mt-4 text-lg">Helping students with Accommodation, Jobs, and Settlement in the UK</p>
                <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-8 rounded-full shadow-lg">
                    Get Started
                </button>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide bg-cover bg-center h-96" style="background-image: url('https://via.placeholder.com/1200x400?text=Slide+2');">
                <div class="container mx-auto px-4 py-32 text-white text-center">
                <h1 class="text-4xl font-extrabold">Find the Best Accommodation</h1>
                <p class="mt-4 text-lg">We provide excellent housing options for students.</p>
                <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-8 rounded-full shadow-lg">
                    Learn More
                </button>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide bg-cover bg-center h-96" style="background-image: url('https://via.placeholder.com/1200x400?text=Slide+3');">
                <div class="container mx-auto px-4 py-32 text-white text-center">
                <h1 class="text-4xl font-extrabold">Part-Time Jobs for Students</h1>
                <p class="mt-4 text-lg">Discover job opportunities to support your studies.</p>
                <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-8 rounded-full shadow-lg">
                    Find Jobs
                </button>
                </div>
            </div>
            </div>

            <!-- Add Pagination and Navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-blue-500 text-white py-8">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold">Start Your Journey with Us!</h2>
        <p class="mt-4 text-lg">Discover accommodation, jobs, and settlement solutions tailored for students.</p>
        <button class="mt-6 bg-white text-blue-500 font-semibold py-2 px-6 rounded hover:bg-gray-100">
          Learn More
        </button>
      </div>
    </section>

    <!-- 3 Grid Section -->
    <section class="container mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Grid Item 1: Accommodation -->
      <div class="text-center p-6 bg-white rounded-lg shadow-lg">
        <img src="https://via.placeholder.com/300x200?text=Accommodation" alt="Accommodation" class="w-full h-48 object-cover rounded-md">
        <h3 class="text-2xl font-semibold mt-4">Accommodation</h3>
        <p class="mt-4">We have Student Rooms and Entire properties in Newcastle, Gateshead & Sunderland.</p>
        <button class="mt-6 bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">
          Learn More
        </button>
      </div>

      <!-- Grid Item 2: Student Jobs -->
      <div class="text-center p-6 bg-white rounded-lg shadow-lg">
        <img src="https://via.placeholder.com/300x200?text=Student+Jobs" alt="Student Jobs" class="w-full h-48 object-cover rounded-md">
        <h3 class="text-2xl font-semibold mt-4">Student Jobs</h3>
        <p class="mt-4">We have many part-time jobs in Tyne & Wear for students.</p>
        <button class="mt-6 bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">
          Find Jobs
        </button>
      </div>

      <!-- Grid Item 3: Settlement -->
      <div class="text-center p-6 bg-white rounded-lg shadow-lg">
        <img src="https://via.placeholder.com/300x200?text=Settlement" alt="Settlement" class="w-full h-48 object-cover rounded-md">
        <h3 class="text-2xl font-semibold mt-4">Settlement</h3>
        <p class="mt-4">Find Sponsorship Visa and Talented Routes through our legal partners.</p>
        <button class="mt-6 bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">
          Learn More
        </button>
      </div>
    </section>

    <!-- £1 P/M Section -->
    <section class="bg-gray-100 py-16 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Just £1 P/M to Help With</h2>
            
            <!-- Services Section with Icons -->
            <div class="flex justify-center gap-12 mt-8">
            <div class="service-item">
                <div class="bg-white shadow-lg rounded-full p-6 inline-block">
                <img src="https://img.icons8.com/ios-filled/50/000000/home.png" alt="Accommodation" class="w-12 h-12 mx-auto">
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-700">Accommodation</h3>
            </div>
            
            <div class="service-item">
                <div class="bg-white shadow-lg rounded-full p-6 inline-block">
                <img src="https://img.icons8.com/ios-filled/50/000000/job.png" alt="Student Jobs" class="w-12 h-12 mx-auto">
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-700">Student Jobs</h3>
            </div>
            
            <div class="service-item">
                <div class="bg-white shadow-lg rounded-full p-6 inline-block">
                <img src="https://img.icons8.com/ios-filled/50/000000/passport.png" alt="Settlement" class="w-12 h-12 mx-auto">
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-700">Settlement</h3>
            </div>
            </div>

            <!-- Subscribe Button -->
            <button class="mt-10 bg-green-500 hover:bg-green-600 text-white py-3 px-8 font-bold rounded-full transition-transform transform hover:scale-105 shadow-lg">
            Subscribe Now
            </button>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
      <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Logo and About -->
        <div>
          <h3 class="text-xl font-bold">Student Hub</h3>
          <p class="mt-4">Helping students find accommodation, jobs, and settlement opportunities in the UK.</p>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="text-xl font-bold">Quick Links</h3>
          <ul class="mt-4 space-y-2">
            <li><a href="#" class="hover:text-blue-400">Accommodation</a></li>
            <li><a href="#" class="hover:text-blue-400">Student Jobs</a></li>
            <li><a href="#" class="hover:text-blue-400">Settlement</a></li>
          </ul>
        </div>

        <!-- Social Media -->
        <div>
          <h3 class="text-xl font-bold">Follow Us</h3>
          <div class="mt-4 flex space-x-4">
            <a href="#"><img src="https://via.placeholder.com/40?text=FB" alt="Facebook" class="h-8"></a>
            <a href="#"><img src="https://via.placeholder.com/40?text=TW" alt="Twitter" class="h-8"></a>
            <a href="#"><img src="https://via.placeholder.com/40?text=IG" alt="Instagram" class="h-8"></a>
          </div>
        </div>
      </div>
      <div class="mt-8 text-center">
        <p>&copy; 2024 Student Hub. All rights reserved.</p>
      </div>
    </footer>

    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
      <div class="bg-white rounded-lg shadow-lg max-w-sm w-full mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
          <h3 class="text-xl font-semibold">Sign In</h3>
        </div>
        <div class="p-6">
          <form @submit.prevent="handleSignIn">
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input
                type="email"
                id="email"
                v-model="form.email"
                required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Enter your email"
              />
            </div>
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <input
                type="password"
                id="password"
                v-model="form.password"
                required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Enter your password"
              />
            </div>
            <div class="flex items-center justify-between">
              <button
                type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                Sign In
              </button>
              <button
                type="button"
                @click="closeModal"
                class="text-gray-500 hover:text-gray-700 focus:outline-none"
              >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link, useForm, Head } from '@inertiajs/vue3';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Define reactive state for modal visibility
const isModalOpen = ref(false);
const isLoggedIn = ref(false); // Update this based on your authentication logic


// Initialize form handling with Inertia's useForm
const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const props = defineProps({
  isLoggedIn: Boolean
});

// Function to open the modal
const openModal = () => {
  isModalOpen.value = true;
};

// Function to close the modal
const closeModal = () => {
  isModalOpen.value = false;
};

const handleSignIn = () => {
  form.post(route('login'), {
    onFinish: () => {
      form.reset('password'); // Reset the password field after submission
      closeModal(); // Close the modal after submission
      isLoggedIn.value = true; // Update login status after successful sign-in
    },
    onError: () => {
      console.error('Login failed');
    },
  });
};

// Initialize Swiper when the component is mounted
onMounted(() => {
  const swiper = new Swiper('.swiper', {
    modules: [Navigation, Pagination],
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  // Mobile menu toggle functionality
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
});
</script>



<style scoped>
/* Custom styles */
.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #333;
  text-align: center;
}

h1 {
  font-size: 2.5rem;
  line-height: 1.2;
}

button {
  transition: background-color 0.3s ease, transform 0.3s ease;
}

button:hover {
  transform: scale(1.05);
}

</style>