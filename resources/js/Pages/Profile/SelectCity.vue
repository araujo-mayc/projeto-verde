<template>
    <div class="w-full max-w-screen-md min-h-screen flex flex-col py-6 px-4">
      <h2 class="pb-3">Escolha a cidade</h2>
      <IconField>
        <InputIcon class="pi pi-search" />
        <InputText v-model="search" placeholder="Buscar cidade" fluid />
      </IconField>

      <DataTable :value="cities" size="large"
        v-model:selection="selectedCity" selectionMode="single" dataKey="id"
        stripedRows >
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
import { ref, onMounted } from 'vue';
import useCities from '@/composables/useCities';

const search = ref('');
const selectedCity = ref(null);

const { cities, fetchCities, loading, error } = new useCities();

const handleCityChange = () => {
    console.log('Selected City ID:', selectedCity.value);
};

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