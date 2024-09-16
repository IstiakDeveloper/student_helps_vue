<template>
    <AdminLayout>
      <div class="bg-gray-100 min-h-screen py-10">
        <div class="mx-auto bg-white shadow-md rounded-lg p-8">
          <h1 class="text-3xl font-bold text-gray-800 mb-6">Profile</h1>

          <!-- Profile Details Section -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <h3 class="text-sm text-gray-500">Full Name</h3>
              <p class="text-lg font-medium text-gray-900">{{ user.name }}</p>
            </div>

            <div>
              <h3 class="text-sm text-gray-500">Email</h3>
              <p class="text-lg font-medium text-gray-900">{{ user.email }}</p>
            </div>
            <div>
              <h3 class="text-sm text-gray-500">City</h3>
              <p class="text-lg font-medium text-gray-900">{{ user.city }}</p>
            </div>
            <div>
              <h3 class="text-sm text-gray-500">Service</h3>
              <p class="text-lg font-medium text-gray-900">{{ user.service }}</p>
            </div>
          </div>

          <!-- Subscription Details Section -->
          <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Subscriptions</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Month</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TXN ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expires At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr
                    v-for="subscription in subscriptions"
                    :key="subscription.id"
                    :class="{
                        'bg-green-100': subscription.status === 'approved',
                        'bg-red-100': subscription.status === 'rejected',
                        'bg-yellow-100': subscription.status === 'pending'
                    }"
                    >
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ subscription.id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.months }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.payment_method }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.transection_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.amount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.expires_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                        @click="openModal(subscription)"
                        >
                        Change Status
                        </button>
                    </td>
                    </tr>
                </tbody>
                </table>

          </div>

          <!-- Modal for Changing Status -->
          <div v-if="isModalOpen" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Change Status</h3>
              <form @submit.prevent="submitStatus">
                <label for="status" class="block text-sm font-medium text-gray-700">Select Status</label>
                <select
                  id="status"
                  v-model="formStatus.status"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                  required
                >
                  <option value="pending">Pending</option>
                  <option value="approved">Approved</option>
                  <option value="rejected">Rejected</option>
                </select>
                <div class="mt-6 flex justify-end">
                  <button @click="closeModal" class="mr-3 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Cancel</button>
                  <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </AdminLayout>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  const props = defineProps({
    user: Object,
    subscriptions: Array,
  });

  const isModalOpen = ref(false);
  const formStatus = ref({
    id: null,
    status: 'pending',
  });

  const openModal = (subscription) => {
    formStatus.value.id = subscription.id;
    formStatus.value.status = subscription.status;
    isModalOpen.value = true;
  };

  const closeModal = () => {
    isModalOpen.value = false;
  };

  const submitStatus = () => {
    // Make API call to update the status
    axios.put(route('subscriptions.updateStatus', formStatus.value.id), formStatus.value)
      .then(() => {
        closeModal();
        // Optionally refresh the page or data
        location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  };
  </script>
