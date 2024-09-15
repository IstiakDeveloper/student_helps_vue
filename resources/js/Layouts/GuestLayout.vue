<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 via-gray-100 to-blue-50">
        <!-- Container -->
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg w-full">
            <!-- Logo Section -->
            <div class="text-center mb-6">
                <Link href="/">
                    <img src="/images/logo.jpg" alt="Logo" class="w-16 h-16 mx-auto" />
                </Link>

            </div>

            <!-- Slot for Content -->
            <div class="space-y-6">
                <slot />
            </div>

            <!-- Footer Links -->
            <div class="text-center mt-8">
                <Link
                    href="/terms"
                    class="text-sm text-gray-400 hover:text-gray-600 transition-colors"
                >
                    Terms & Conditions
                </Link>
                <span class="text-sm text-gray-400 mx-2">|</span>
                <Link
                    href="/privacy"
                    class="text-sm text-gray-400 hover:text-gray-600 transition-colors"
                >
                    Privacy Policy
                </Link>
            </div>
        </div>
    </div>
</template>
