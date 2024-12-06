

<template>
    <Head title="Esqueci a Senha" />
    <div class="w-full min-h-screen flex flex-col items-center pt-12 pb-9 px-4">
        <img class="max-w-20 h-auto rounded-full" src="https://placehold.co/600?text=Logo" alt="">
        <div class="max-w-96 flex flex-col p-6 gap-y-5 shadow-xl rounded-lg">
            <div class="flex flex-col gap-y-3 text-center">
                <h2 class="font-bold">Esqueceu a Senha ?</h2>
                <small class="text-justify text-[var(--neutral-700)]">Sem problema! Basta nos informar seu endereço de 
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
                <Button class="my-5" @click="submit" label="Enviar Email" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" fluid />
                <Link :href="route('login')" class="text-sky-600">voltar</Link>
            </form>
        </div>
    </div>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

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