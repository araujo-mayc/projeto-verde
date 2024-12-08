<template>
    <div class="w-full max-w-screen-md min-h-screen flex flex-col py-6 px-4">
      <h2 class="pb-3">Anúncios</h2>
      <div class="mt-2">
        <IconField>
          <InputIcon class="pi pi-search" />
          <InputText v-model="filters['global'].value" placeholder="O que está procurando?" fluid />
        </IconField>
      </div>
      <div class="flex items-center justify-between mt-2">
        <div class="flex gap-x-2">
          <i class="pi pi-map-marker" style="font-size: 1.5rem; color: var(--neutral-500)"></i>
          <label for="city">{{ city.name }} - {{ city.state }}</label>
        </div>
        <Link :href="route('select.city')" class="text-sky-600 underline">Alterar</Link>
      </div>
      <div class="w-full flex justify-center py-5">
        <SelectButton v-model="selectedType" :options="options" optionLabel="name" size="large" :allow-empty="false" fluid />
      </div>

      <section>
        <DataView :value="adproducts" layout="grid">
    <template #grid="slotProps">
        <div class="grid grid-cols-12 gap-4">
            <div @click="selectItem(item)" v-for="(item, index) in slotProps.items" :key="index" class="col-span-6 md:col-span-4 xl:col-span-6 p-2">
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

<script setup>
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import SelectButton from 'primevue/selectbutton';
import DataView from 'primevue/dataview';
import { FilterMatchMode } from '@primevue/core/api';
import { ref, onMounted } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import useAdProducts from '@/composables/useAdProducts';

defineProps({
    city: {
        type: Object,
        required: true
    },
});
const { adproducts, fetchAdProducts, loading, error } = new useAdProducts();

const filters = ref({ global: { value: null, matchMode: FilterMatchMode.CONTAINS }});
const options = ref([
  {name:'Produtos', value:'products'},
  {name:'Serviços', value:'services'}
]);
const selectedType = ref(options.value[0]);

const selectItem = (item) => {
  router.visit(`/cidades/anuncios/item/${item.id}`);
};


onMounted(() => {
    fetchAdProducts();
    // console.log(adproducts);
    
});
</script>

<style scoped>

</style>