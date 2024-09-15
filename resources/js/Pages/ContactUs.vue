<template>
    <div class="container mx-auto p-6">
      <div class="mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Back Button -->
        <div class="mb-6">
          <button @click="goBack" class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1.707-7.707a1 1 0 111.414-1.414L10 10.586V5a1 1 0 112 0v5.586l.293-.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3z" clip-rule="evenodd"/>
            </svg>
            Back
          </button>
        </div>

        <div class="flex gap-6 justify-center mt-10">
            <div class="shadow-md px-4">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-6 text-center">Contact Us</h1>

            <p class="text-gray-600 mb-8 text-center text-lg">
            If you have any questions or need further assistance, please fill out the form below. We are here to help!
            </p>

            <form @submit.prevent="submitForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
                </div>

                <!-- Email -->
                <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
                </div>

                <!-- Subject -->
                <div class="md:col-span-2">
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input
                    id="subject"
                    v-model="form.subject"
                    type="text"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
                </div>

                <!-- Message -->
                <div class="md:col-span-2">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea
                    id="message"
                    v-model="form.message"
                    rows="6"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                ></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button
                type="submit"
                class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                Send Message
                </button>
            </div>
            </form>
            <!-- Success message -->
            <div v-if="formSuccess" class="mt-6 text-green-600 text-center">
                 Your message has been sent successfully. We will get back to you shortly.
            </div>
        </div>
        <!-- Contact Details -->
        <div class="shadow-md px-4">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-6 text-center">Get In Touch</h1>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div>
              <h3 class="text-lg font-medium text-gray-700 mb-4">Contact Information:</h3>

              <!-- Phone -->
              <div class="mb-4">
                <h4 class="font-medium text-gray-800">Phone</h4>
                <p class="text-gray-600">+1 123-456-7890</p>
              </div>

              <!-- Email -->
              <div class="mb-4">
                <h4 class="font-medium text-gray-800">Email</h4>
                <p class="text-gray-600">support@company.com</p>
              </div>

              <!-- Address -->
              <div class="mb-4">
                <h4 class="font-medium text-gray-800">Address</h4>
                <p class="text-gray-600">1234 Company St, Suite 100, City, State, 12345</p>
              </div>
            </div>

            <!-- Map -->
            <div class="md:col-span-2">
              <h3 class="text-lg font-medium text-gray-700 mb-4">Find Us</h3>
              <iframe
                class="w-full h-64 rounded-lg shadow-md"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345081786!2d144.95373631550425!3d-37.817209979751594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce6e0!2sCompany%20Address!5e0!3m2!1sen!2sus!4v1633901749014!5m2!1sen!2sus"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';

  const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: ''
  });

  const formSuccess = ref(false);

  const goBack = () => {
    window.history.back();
  };

  const submitForm = () => {
    form.post(route('contact.submit'), {
      onSuccess: () => {
        formSuccess.value = true;
        form.reset();
      }
    });
  };
  </script>

  <style scoped>
  /* Add any additional styles if needed */
  </style>
