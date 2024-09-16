<template>
    <AdminLayout>
      <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6">All Subscriptions</h1>

        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serial</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Months</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expires At</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr
              v-for="(subscription, index) in subscriptions"
              :key="subscription.id"
              :class="{
                'bg-green-100': subscription.status === 'approved',
                'bg-yellow-100': subscription.status === 'pending',
                'bg-red-100': subscription.status === 'rejected'
              }"
            >
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ index + 1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.user.name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.months }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">€{{ subscription.amount }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.expires_at }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ subscription.status }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                <button
                  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                  @click="goToUser(subscription.user.id)"
                >
                  Show User
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </AdminLayout>
  </template>

  <script setup>
  import { usePage } from '@inertiajs/vue3';
  import { router } from '@inertiajs/vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  const { subscriptions } = usePage().props;

  const goToUser = (userId) => {
    router.visit(route('users.show', userId));
  };
  </script>
