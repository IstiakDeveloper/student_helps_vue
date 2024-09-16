<template>
    <Head>
        <title>Home Page</title>
    </Head>
  <!-- Main Wrapper -->
  <div>

    <header class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <Link href="/">
                    <img src="/images/logo.jpg" alt="Logo" class="h-10" />
                </Link>
            </div>
            <!-- United Kingdom Flag and Text (Center) -->
            <div class="flex items-center space-x-2">
                <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" alt="UK Flag" class="h-6 w-10">
                <span class="text-gray-700 text-lg font-semibold">United Kingdom</span>
            </div>

            <!-- Navigation and Auth Links (Right) -->
            <nav class="hidden md:flex space-x-6 text-lg items-center">
                <Link :href="'/'" class="hover:text-blue-500">Home</Link>
            <Link :href="'/contact'" class="hover:text-blue-500">Contact Us</Link>
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
            <div class="swiper-slide bg-cover bg-center h-96" style="background-image: url('/images/0s.jpg');">
                <div class="container mx-auto px-4 py-32 text-white text-center">
                <h1 class="text-4xl font-extrabold">Welcome to Students Help</h1>
                <p class="m-4 text-lg">Helping students with Accommodation, Jobs, and Settlement in the UK</p>
                <Link href="/register" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg">
                    Get Started
                </Link>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide bg-cover bg-center h-96" style="background-image: url('/images/1s.jpg');">
                <div class="container mx-auto px-4 py-32 text-white text-center">
                <h1 class="text-4xl font-extrabold">Find the Best Accommodation</h1>
                <p class="m-4 text-lg">We provide excellent housing options for students.</p>
                <Link href="/register" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg">
                    Learn More
                </Link>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide bg-cover bg-center h-96" style="background-image: url('/images/2s.jpg');">
                <div class="container mx-auto px-4 py-32 text-white text-center">
                <h1 class="text-4xl font-extrabold">Part-Time Jobs for Students</h1>
                <p class="m-4 text-lg">Discover job opportunities to support your studies.</p>
                <Link href="/register" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg">
                    Find Job
                </Link>
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
        <p class="m-4 text-lg">Discover accommodation, jobs, and settlement solutions tailored for students.</p>
        <Link href="/register" class=" bg-white text-blue-500 font-semibold py-2 px-6 rounded hover:bg-gray-100">
          Learn More
        </Link>
      </div>
    </section>

    <!-- 3 Grid Section -->
    <section class="container mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Grid Item 1: Accommodation -->
      <div class="text-center p-6 bg-white rounded-lg shadow-lg">
        <img src="/images/accm.jpg" alt="Accommodation" class="w-full h-48 object-cover rounded-md">
        <h3 class="text-2xl font-semibold mt-4">Accommodation</h3>
        <p class="m-4">We have Student Rooms and Entire properties in Newcastle, Gateshead & Sunderland.</p>
        <Link href="/register" class="mt-6 bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">
          Learn More
        </Link>
      </div>

      <!-- Grid Item 2: Student Jobs -->
      <div class="text-center p-6 bg-white rounded-lg shadow-lg">
        <img src="/images/jbs.jpg" alt="Student Jobs" class="w-full h-48 object-cover rounded-md">
        <h3 class="text-2xl font-semibold mt-4">Student Jobs</h3>
        <p class="m-4">We have many part-time jobs in Tyne & Wear for students.</p>
        <Link href="/register" class="mt-6 bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">
          Find Jobs
        </Link>
      </div>

      <!-- Grid Item 3: Settlement -->
      <div class="text-center p-6 bg-white rounded-lg shadow-lg">
        <img src="/images/st.jpg" alt="Settlement" class="w-full h-48 object-cover rounded-md">
        <h3 class="text-2xl font-semibold mt-4">Settlement</h3>
        <p class="m-4">Find Sponsorship Visa and Talented Routes through our legal partners.</p>
        <Link href="/register" class="mt-6 bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">
          Learn More
        </Link>
      </div>
    </section>

    <!-- £1 P/M Section -->
    <section class="bg-gray-100 py-16 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Just £1 P/M to Help With</h2>

            <!-- Services Section with Icons -->
            <div class="flex flex-wrap justify-center gap-6 sm:gap-8 md:gap-12 mt-8">
                <div class="service-item w-full sm:w-1/2 md:w-1/3">
                    <div class="bg-white shadow-lg rounded-full p-4 sm:p-6 inline-block">
                        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" alt="Accommodation" class="w-10 h-10 sm:w-12 sm:h-12 mx-auto">
                    </div>
                    <h3 class="mt-2 sm:mt-4 text-lg sm:text-xl font-semibold text-gray-700">Accommodation</h3>
                </div>

                <div class="service-item w-full sm:w-1/2 md:w-1/3">
                    <div class="bg-white shadow-lg rounded-full p-4 sm:p-6 inline-block">
                        <img src="https://img.icons8.com/ios-filled/50/000000/job.png" alt="Student Jobs" class="w-10 h-10 sm:w-12 sm:h-12 mx-auto">
                    </div>
                    <h3 class="mt-2 sm:mt-4 text-lg sm:text-xl font-semibold text-gray-700">Student Jobs</h3>
                </div>

                <div class="service-item w-full sm:w-1/2 md:w-1/3">
                    <div class="bg-white shadow-lg rounded-full p-4 sm:p-6 inline-block">
                        <img src="https://img.icons8.com/ios-filled/50/000000/passport.png" alt="Settlement" class="w-10 h-10 sm:w-12 sm:h-12 mx-auto">
                    </div>
                    <h3 class="mt-2 mb-10 sm:mt-4 text-lg sm:text-xl font-semibold text-gray-700">Settlement</h3>
                </div>
            </div>

            <!-- Subscribe Button -->
            <Link href="/subscriptions" class="bg-green-500 hover:bg-green-600 text-white py-3 px-8 font-bold rounded-full transition-transform transform hover:scale-105 shadow-lg">
                Subscribe Now
            </Link>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
      <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Logo and About -->
        <div>
          <h3 class="text-xl font-bold">Students Help</h3>
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
            <a href="#" aria-label="Facebook">
                <svg class="h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 12.072c0-5.08-4.136-9.216-9.216-9.216-5.08 0-9.216 4.136-9.216 9.216 0 4.713 3.423 8.632 7.88 9.069v-6.412h-2.36v-2.657h2.36v-2.077c0-2.336 1.328-3.607 3.344-3.607.973 0 2.004.175 2.004.175v2.188h-1.126c-1.113 0-1.493.694-1.493 1.406v1.5h2.727l-.436 2.657h-2.291v6.412c4.457-.437 7.88-4.356 7.88-9.069z"/>
                </svg>
            </a>
            <a href="#" aria-label="Twitter">
                <svg class="h-8 " fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.46 6.003c-.77.342-1.605.572-2.473.675a4.294 4.294 0 0 0 1.883-2.373 8.596 8.596 0 0 1-2.728 1.042 4.278 4.278 0 0 0-7.303 3.892c0 .334.038.658.11.973a12.168 12.168 0 0 1-8.832-4.482 4.256 4.256 0 0 0 1.321 5.68 4.272 4.272 0 0 1-1.94-.535v.053a4.279 4.279 0 0 0 3.426 4.186 4.273 4.273 0 0 1-1.933.073 4.282 4.282 0 0 0 3.989 2.964 8.603 8.603 0 0 1-5.334 1.84c-.348 0-.687-.02-1.027-.061a12.093 12.093 0 0 0 6.557 1.924c7.86 0 12.186-6.502 12.186-12.165 0-.185-.004-.368-.012-.552A8.676 8.676 0 0 0 22.46 6.003z"/>
                </svg>
            </a>
            <a href="#" aria-label="YouTube">
            <svg class="h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.498 6.186c-.219-1.636-1.19-2.983-2.796-3.531-2.495-.758-12.73-.758-12.73-.758s-10.235 0-12.73.758c-1.606.548-2.577 1.895-2.796 3.531-.199 1.487-.199 4.605-.199 4.605s0 3.118.199 4.605c.219 1.636 1.19 2.983 2.796 3.531 2.495.758 12.73.758 12.73.758s10.235 0 12.73-.758c1.606-.548 2.577-1.895 2.796-3.531.199-1.487.199-4.605.199-4.605s0-3.118-.199-4.605zm-13.285 7.138v-5.196l5.001 2.598-5.001 2.598z"/>
            </svg>
            </a>

            </div>
        </div>
      </div>
      <div class="mt-8 text-center">
        <p>&copy; 2024 Students Help. All rights reserved.</p>
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
      delay: 1000,
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
