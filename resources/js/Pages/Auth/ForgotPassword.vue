

<template>
    <Head title="Esqueci a Senha" />
    <div class="w-full min-h-screen flex flex-col items-center pt-12 pb-9 px-4">
        <img class="max-w-20 h-auto rounded-full" src="https://placehold.co/600?text=Logo" alt="">
        <div class="max-w-96 flex flex-col p-6 gap-y-5 shadow-xl rounded-lg">
            <div class="flex flex-col gap-y-3 text-center">
                <h1>Esqueceu a Senha?</h1>
                <small class="text-justify">Sem problema! Basta nos informar seu endereço de 
                    email e nós lhe enviaremos um link de redefinição de senha que permitirá 
                    que você escolha uma nova.
                </small>
            </div>

            <form @submit.prevent="submit">
                <div class="flex flex-col gap-y-1">
                    <label for="email">Email</label>
                    <InputText v-model="form.email" id="email" type="email" autocomplete="username" required fluid />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <Button class="mt-5" @click="submit" label="Enviar Email" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" fluid />
            </form>
        </div>
    </div>
</template>
<!-- <template>
    <GuestLayout>

        <div class="mb-4 text-sm text-gray-600">
            Esqueceu sua senha? Sem problema. Basta nos informar seu endereço de email e nós lhe enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.
        </div>

        <div
            v-if="status"
            class="mb-4 text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template> -->

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>