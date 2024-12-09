<template>
    <div class="w-full min-h-screen flex-col items-center justify-center bg-[var(--neutral-200)]">
        <header class="flex justify-between py-4 px-6 bg-white shadow-md">
            <div class="flex items-center">
                <img class="size-12 mx-2 rounded-full" src="https://placehold.co/600?text=Logo" alt="" />
                <h2 class="font-bold">Feirine</h2>
            </div>
            <div class="flex gap-x-7">
                <Button label="Iniciar sessão" @click="handleRouteButton('login')" class="!bg-sky-100" text />
                <Button label="Criar conta" @click="handleRouteButton('register')" />
                <Button label="Ajuda" severity="secondary" text />
            </div>
        </header>
        <main class="bg-white">
            <div class="min-h-[500px] bg-gradient-to-br from-sky-600 to-sky-400 py-5 px-8 md:px-16">
                <div class="grid grid-cols-1 md:grid-cols-2 max-w-screen-lg mx-auto gap-10 items-center pt-10 md:pt-20">
                    <div class="flex flex-col items-center md:items-start max-w-md mx-auto lg:mx-0">
                        <h2 class="text-white font-bold text-4xl text-center lg:text-left mb-3">Descubra, Conecte e Negocie.</h2>
                        <small class="text-white text-justify mb-7">Com o Feirine você conecta-se facilmente com os pequenos negócios e serviços da sua região. Encontre tudo o que precisa bem pertinho de você.</small>
                        <Button label="Selecionar Cidade" severity="secondary" />
                    </div>
                    <div class="flex justify-center">
                        <img class="w-auto max-h-[385px]" src="/images/picture_home_page_web.png" alt="">
                    </div>
                </div>
            </div>
            <div class="min-h-[500px] flex flex-col p-6 items-center justify-center">
                <h2 class="font-bold text-3xl text-center">Perguntas Frequentes</h2>
                <DataTable v-model:expandedRows="expandedRows" :value="faqList" tableStyle="min-width: 42rem" dataKey="id" stripedRows >
                    <Column field="title" class="font-semibold" ></Column>
                    <template #expansion="slotProps">
                        <h5 class="py-2 max-w-2xl">{{ slotProps.data.description }}</h5>
                    </template>
                    <Column expander style="width: 5rem" />
                </DataTable>
            </div>
        </main>
        <footer class="bg-white">
            <Divider />
            <div class="flex items-center justify-between p-4">
                <small>Copyright © 2024 Feirine</small>
                <div>
                    <i class="pi pi-instagram"></i>
                </div>
            </div>

        </footer>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import Divider from 'primevue/divider';
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { ref } from 'vue';

const faqList = ref([
    { title: 'O que é o Feirine?', description: 'O Feirine é um aplicativo que conecta pessoas aos pequenos negócios e serviços locais da sua região, promovendo a economia local e facilitando o contato direto com vendedores e prestadores de serviços.', id: 1 },
    { title: 'Quem pode usar o Feirine?', description: 'Qualquer pessoa pode usar o Feirine! Seja para divulgar produtos ou serviços, ou para encontrar ofertas e profissionais na sua região. É ideal para pequenos empreendedores, autônomos e consumidores locais.', id: 2 },
    { title: 'O Feirine cobra alguma taxa pelos anúncios?', description: 'O Feirine permite criar anúncios gratuitos por um período limitado. Para manter seu anúncio por mais tempo ou obter destaque, oferecemos planos pagos acessíveis.', id: 3 },
    { title: 'Quais tipos de produtos ou serviços posso anunciar?', description: 'Você pode anunciar quase tudo! Desde alimentos, roupas, e artesanatos até serviços como manutenção, aulas e consultorias. Confira as categorias disponíveis no app.', id: 5 },
    { title: 'É seguro usar o Feirine?', description: 'Fazemos o possível para garantir um ambiente seguro, mas recomendamos sempre verificar as informações dos anunciantes e negociar com cuidado.', id: 4 },
    ]);
const expandedRows = ref({});

function handleRouteButton(route) {
    router.visit(route);
}

</script>