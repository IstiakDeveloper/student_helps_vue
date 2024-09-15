<template>
    <GuestLayout>
        <Head title="Student Registration" />

        <div class="bg-white shadow-md rounded-lg p-8 max-w-lg mx-auto">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-6">Student Registration</h2>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Name Input -->
                <div>
                    <InputLabel for="name" value="Full Name" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Email Input -->
                <div>
                    <InputLabel for="email" value="Email Address" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- Phone Input -->
                <div>
                    <InputLabel for="phone" value="Phone Number" />
                    <TextInput
                        id="phone"
                        type="text"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        v-model="form.phone"
                        autocomplete="tel"
                    />
                    <InputError class="mt-2" :message="form.errors.phone" />
                </div>

                <!-- City Input -->
                <div>
                    <InputLabel for="city" value="City" />
                    <TextInput
                        id="city"
                        type="text"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        v-model="form.city"
                        autocomplete="address"
                    />
                    <InputError class="mt-2" :message="form.errors.city" />
                </div>

                <!-- Service Selection -->
                <div>
                    <InputLabel for="service" value="Select Service" />
                    <select
                        id="service"
                        v-model="form.service"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        required
                    >
                        <option value="" disabled>Select a service</option>
                        <option value="Job">Job</option>
                        <option value="Accommodation">Accommodation</option>
                        <option value="Settlement">Settlement</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.service" />
                </div>

                <!-- Password Input -->
                <div>
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <!-- Actions: Register Button and Link to Login -->
                <div class="flex items-center justify-between mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-500 hover:text-gray-700"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton
                        class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    city: '',
    service: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
