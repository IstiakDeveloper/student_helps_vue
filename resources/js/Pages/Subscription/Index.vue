<template>
    <AdminLayout>
      <template #default>
        <div class="container mx-auto p-4">
          <!-- Add Subscription Button -->
          <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">My Subscriptions</h1>
            <Link
              href="/subscriptions/create"
              class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600"
            >
              Add Subscription
            </Link>
          </div>

          <!-- Subscriptions Table -->
          <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
              <tr>
                <th class="py-2 px-4 border">SL</th>
                <th class="py-2 px-4 border">Months</th>
                <th class="py-2 px-4 border">Payment Method</th>
                <th class="py-2 px-4 border">Transcetion ID</th>
                <th class="py-2 px-4 border">Amount</th>
                <th class="py-2 px-4 border">Status</th>
                <th class="py-2 px-4 border">Expires At</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(subscription, index) in subscriptions" :key="subscription.id" :class="getRowClass(subscription)">
                <td class="py-2 px-4 border">{{ index + 1 }}</td> <!-- Serial number -->
                <td class="py-2 px-4 border">{{ subscription.months }}</td>
                <td class="py-2 px-4 border">{{ subscription.payment_method }}</td>
                <td class="py-2 px-4 border">{{ subscription.transaction_id }}</td>
                <td class="py-2 px-4 border">{{ subscription.amount }}</td>
                <td class="py-2 px-4 border">{{ subscription.status }}</td>
                <td class="py-2 px-4 border">{{ subscription.expires_at }}</td>

              </tr>
            </tbody>
          </table>
        </div>
      </template>
    </AdminLayout>
  </template>

  <script setup>
  import { Link, useForm, Head, usePage } from '@inertiajs/vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';
  import { ref } from 'vue';


  const { subscriptions } = usePage().props;

const getRowClass = (subscription) => {
  const currentDate = new Date();
  const expiresAt = new Date(subscription.expires_at);

  if (subscription.status === 'approved') {
    return 'bg-green-100';
  } else if (subscription.status === 'pending') {
    return 'bg-yellow-100';
  } else if (expiresAt < currentDate) {
    return 'bg-red-100';
  }

  return '';
};
</script>

<style scoped>
.bg-green-100 {
  background-color: #d1fae5; /* Light green */
}
.bg-yellow-100 {
  background-color: #fef3c7; /* Light yellow */
}
.bg-red-100 {
  background-color: #fee2e2; /* Light red */
}
</style>
