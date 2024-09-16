<template>
    <AdminLayout>
      <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Subscribe</h1>
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label for="months" class="block text-sm font-medium text-gray-700">Months</label>
            <input
              id="months"
              v-model="form.months"
              type="number"
              min="1"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
          </div>

          <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input
              id="amount"
              v-model="amount"
              type="text"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              readonly
            />
          </div>

          <div class="mb-4">
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
            <select
              id="payment_method"
              v-model="form.payment_method"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
              <option value="Cash">Cash</option>
              <option value="Bank">Bank</option>
            </select>
          </div>

          <div v-if="form.payment_method === 'Bank'" class="mb-4">
            <label for="transaction_id" class="block text-sm font-medium text-gray-700">Transaction ID</label>
            <input
              id="transaction_id"
              v-model="form.transaction_id"
              type="text"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
            <small class="text-gray-500">Please check bank details for payment.</small>
          </div>

          <button
            type="submit"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700"
          >
            Submit
          </button>
        </form>
      </div>
    </AdminLayout>
  </template>

  <script setup>
  import { ref, computed } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  const form = useForm({
    months: 1,
    payment_method: 'Cash',
    transaction_id: '',
    amount: 0
  });

  // Set the fixed amount per month
  const amountPerMonth = 1; // 1 euro per month

  // Computed property to calculate the amount based on selected months
  const amount = computed(() => {
    return form.months * amountPerMonth;
  });

  const submit = () => {
    // Include the calculated amount in the form submission
    form.amount = amount.value;

    form.post(route('subscriptions.store'), {
      onSuccess: () => {
        form.reset();
      }
    });
  };
  </script>
