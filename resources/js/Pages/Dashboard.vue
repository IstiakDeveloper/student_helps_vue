<!-- resources/js/Pages/Dashboard.vue -->

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Admin Dashboard" />

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <h1>Hello</h1>
          <div class="p-6 text-gray-900">This is test dashboard</div>
        </div>
      </div>
    </div>
  </AdminLayout>


</template>
