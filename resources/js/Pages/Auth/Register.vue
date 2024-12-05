<!-- <template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template> -->

<template>
    <Head title="Registrar" />
    <div class="w-full min-h-screen flex flex-col items-center pt-12 pb-9 px-4">
        <img class="max-w-20 h-auto rounded-full" src="https://placehold.co/600?text=Logo" alt="">
        <div class="flex flex-col items-center py-8">
            <h1>Registrar</h1>
        </div>
        <form class="flex grow flex-col gap-y-3 w-full max-w-96" @submit.prevent="submit">
            <div class="flex flex-col gap-y-1">
                <label for="email">Email</label>
                <InputText v-model="form.email" id="email" type="email" autocomplete="username" required fluid/>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="password">Senha</label>
                <InputText v-model="form.password" id="password" type="password" autocomplete="password" required fluid/>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="confirm-password">Confirmar Senha</label>
                <InputText v-model="form.password_confirmation" id="password_confirmation" type="password" autocomplete="password" required fluid/>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <Button @click="submit" label="Cadastrar" fluid />
        </form>

        <div class="w-full flex flex-col items-center max-w-96">
            <Divider align="center" type="solid">
                <small>Ou</small>
            </Divider>
            <Button @click="" label="Registrar com o Google" severity="danger" icon="pi pi-google" fluid />
        </div>
        <div class="w-full flex flex-col items-center max-w-96 max-h-64">
            <label class="pt-10 text-center" for="terms">Já é cadastrado? <Link :href="route('login')" class="text-sky-600">entrar na conta</Link></label>
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

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.name = form.email.split('@')[0] + Math.floor(10000 + Math.random() * 90000).toString().padStart(5, '0'),
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

