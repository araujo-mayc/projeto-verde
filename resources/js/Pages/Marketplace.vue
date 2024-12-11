<template>
  <MainLayout :actived-page="'home'">
    <template #main>
      <div class="flex gap-x-3">
        <section name="filters" class="min-w-80 flex flex-col grow bg-white shadow-md px-4 py-3">
          <h2 class="pb-3 font-bold">Anúncios</h2>
          <div class="mt-2">
            <IconField>
              <InputIcon class="pi pi-search" />
              <InputText v-model="filters['global'].value" placeholder="O que está procurando?" fluid />
            </IconField>
          </div>
            
          <Divider />
          <h2 for="locate" class="text-base mb-1">Localização</h2>
          <div class="flex items-center justify-between mt-2">
            <div class="flex gap-x-2">
              <i class="pi pi-map-marker" style="font-size: 1.5rem; color: var(--neutral-500)"></i>
              <label for="city" class="truncate">{{ city.name }} - {{ city.state }}</label>
            </div>
            <Link :href="route('select.city')" class="text-sky-600 underline">Alterar</Link>
          </div>
          <Divider />
          <h2 for="visualize" class="text-base mb-3">Visualizar</h2>
          <div class="flex flex-col w-full gap-y-1">
            <Button :severity="activeItem === 'products' ? 'primary' : 'secondary'" @click="setActiveItem('products')"
              label="Produtos" style="justify-content: flex-start;" />
            <Button :severity="activeItem === 'services' ? 'primary' : 'secondary'" @click="setActiveItem('services')"
            label="Serviços" style="justify-content: flex-start;" />
          </div>
        </section>
        <section name="ads" class="bg-white shadow-md px-4 py-3">
          <DataView :value="adproducts" layout="grid">
            <template #grid="slotProps">
                <div class="grid grid-cols-12 gap-x-1 gap-y-3">
                    <div @click="selectItem(item)" v-for="(item, index) in slotProps.items" :key="index" class="col-span-6 md:col-span-4 xl:col-span-3 p-2">
                        <div class="bg-surface-0 dark:bg-surface-900 flex flex-col">
                          <img class="rounded w-full" src="https://placehold.co/600x400" alt=""/>
                          <div class="pt-3 px-1">
                            <span>R$ {{ parseFloat(item.prices).toLocaleString('pt-BR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}</span>
                            <div>
                                <!-- <span class="font-medium text-surface-500 dark:text-surface-400 text-sm">{{ item.category }}</span> -->
                                <h3 class="mt-1 line-clamp-2 text-ellipsis">{{ item.title }}</h3>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </template>
          </DataView>
        </section>
      </div>
    </template>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import DataView from 'primevue/dataview';
import { FilterMatchMode } from '@primevue/core/api';
import { ref, onMounted } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import useAdProducts from '@/composables/useAdProducts';
import Divider from 'primevue/divider';
import Button from 'primevue/button';

defineProps({
    city: {
        type: Object,
        required: true
    },
});
const { adproducts, fetchAdProducts, loading, error } = new useAdProducts();

const filters = ref({ global: { value: null, matchMode: FilterMatchMode.CONTAINS }});

const activeItem = ref('products');
const setActiveItem = (item) => {
  activeItem.value = item;
};

const selectItem = (item) => {
  router.visit(`/cidades/anuncios/item/${item.id}`);
};


onMounted(() => {
    fetchAdProducts();
});
</script>