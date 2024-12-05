<template>
    <Head title="Entrar" />
    <div class="w-full min-h-screen flex flex-col items-center pt-12 pb-9 px-4">
        <img class="max-w-20 h-auto rounded-full" src="https://placehold.co/600?text=Logo" alt="">
        <div class="flex flex-col items-center py-8">
            <h1>Bem vindo!</h1>
            <small>Entre para anunciar seus produtos e serviços!</small>
        </div>
        <form class="flex flex-col grow gap-y-3 w-full max-w-96" @submit.prevent="submit">
            <div class="flex flex-col gap-y-1">
                <label for="email">Email</label>
                <InputText v-model="form.email" id="email" type="email" autocomplete="username" required fluid />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="password">Senha</label>
                <InputText v-model="form.password" id="password" type="password" autocomplete="password" required fluid />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="flex gap-x-2 my-3">
                <Checkbox v-model="form.remember" value="remember" binary />
                <label for="remenber">Lembrar deste dispostivo</label>
            </div>
            <Button @click="submit" label="Entrar" fluid />
        </form>

        <div class="w-full flex flex-col items-center max-w-96">
            <label class="my-5" for="terms">Esqueceu a senha? <Link :href="route('password.request')" class="text-sky-600">redefinir senha</Link></label>

            <Divider align="center" type="solid">
                <small>Ou</small>
            </Divider>
            <Button @click="" label="Entrar com o Google" severity="danger" icon="pi pi-google" fluid />
        </div>
        <div class="w-full flex flex-col items-center max-w-96 max-h-64">
            <label class="pt-10 text-center" for="terms">Não possui conta? <Link :href="route('register')" class="text-sky-600">criar conta</Link></label>
            <label class="pt-10 text-center" for="terms">Ao entrar, você está concordando com nossos <Link href="#" class="text-sky-600">Termo de Uso</Link> e <Link href="#" class="text-sky-600">Política de Privacidade</Link></label>
        </div>
    </div>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import Divider from 'primevue/divider';
import Checkbox from 'primevue/checkbox';


defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

