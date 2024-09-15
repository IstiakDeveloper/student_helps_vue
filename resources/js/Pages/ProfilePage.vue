<template>
    <AdminLayout>
        <div class="bg-gray-100 min-h-screen py-10">
            <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Profile</h1>

                <!-- Profile Details Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm text-gray-500">Full Name</h3>
                        <p class="text-lg font-medium text-gray-900">{{ props.user.name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm text-gray-500">Email</h3>
                        <p class="text-lg font-medium text-gray-900">{{ props.user.email }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm text-gray-500">Phone</h3>
                        <p class="text-lg font-medium text-gray-900">{{ props.user.phone }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm text-gray-500">City</h3>
                        <p class="text-lg font-medium text-gray-900">{{ props.user.city }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm text-gray-500">Service</h3>
                        <p class="text-lg font-medium text-gray-900">{{ props.user.service }}</p>
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="mt-8 text-right">
                    <button
                        class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700"
                        @click="openModal"
                    >
                        Edit Profile
                    </button>
                </div>
            </div>

            <!-- Edit Profile Modal -->
            <div v-if="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Profile</h2>

                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="name" value="Full Name" />
                            <TextInput
                                id="name"
                                v-model="form.name"
                                class="block w-full mt-1"
                            />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                class="block w-full mt-1"
                            />
                            <InputError :message="form.errors.email" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="phone" value="Phone" />
                            <TextInput
                                id="phone"
                                v-model="form.phone"
                                class="block w-full mt-1"
                            />
                            <InputError :message="form.errors.phone" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="city" value="City" />
                            <TextInput
                                id="city"
                                v-model="form.city"
                                class="block w-full mt-1"
                            />
                            <InputError :message="form.errors.city" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="service" value="Service" />
                            <select v-model="form.service" class="block w-full mt-1">
                                <option value="" disabled>Select a service</option>
                                <option value="Job">Job</option>
                                <option value="Accommodation">Accommodation</option>
                                <option value="Settlement">Settlement</option>
                            </select>
                            <InputError :message="form.errors.service" class="mt-2" />
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <button
                                type="button"
                                class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg"
                                @click="closeModal"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700"
                            >
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';



const isModalOpen = ref(false);

const props = defineProps({
    user: Object,  // 'user' data from the controller
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    phone: props.user.phone,
    city: props.user.city,
    service: props.user.service
});

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

const submit = () => {
    // Submit logic for profile update
    form.post(route('student.profile.update'), {
        onSuccess: () => {
            closeModal();
            // Handle success case
        }
    });
};
</script>
