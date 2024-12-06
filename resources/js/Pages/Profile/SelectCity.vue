<template>
    <div class="w-full max-w-screen-md min-h-screen flex flex-col py-6 px-4">
      <h2 class="pb-3">Escolha a cidade</h2>
      <DataTable :value="cities" :loading="loading" :filters="filters"
        v-model:selection="selectedCity" selectionMode="single" dataKey="id"
        size="large" stripedRows >
        <template #header>
                <div class="w-full">
                  <IconField>
                    <InputIcon class="pi pi-search" />
                    <InputText v-model="filters['global'].value" placeholder="Buscar cidade" fluid />
                  </IconField>
                </div>
            </template>
            <template #empty> Nenhuma cidade encontrada. </template>
            <template #loading> Carregando cidades. Por favor, aguarde. </template>
        <Column field="name">
        <template #body="slotProps">
            {{ slotProps.data.name }} - {{ slotProps.data.state }}
        </template>
    </Column>
      </DataTable>
    </div>
</template>

<script setup>
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { ref, onMounted, watch } from 'vue';
import useCities from '@/composables/useCities';
import { FilterMatchMode } from '@primevue/core/api';

const selectedCity = ref(null);
const filters = ref({ global: { value: null, matchMode: FilterMatchMode.CONTAINS }});

const { cities, fetchCities, loading, error } = new useCities();

watch(selectedCity, (newValue) => {
  if (newValue == null) return
   // Carregar os anúncios da cidade escolhida
});

onMounted(() => {
    fetchCities();
    
});
</script>

<style scoped>

:deep(.p-datatable-header-cell) {
  background-color: transparent;
}
:deep(.p-datatable-table-container) {
  border-radius: 10px;
}
</style>