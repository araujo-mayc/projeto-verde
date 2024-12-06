<template>
    <div class="w-full max-w-screen-md min-h-screen flex flex-col py-6 px-4 bg-sky-500">
      <h1 class="pb-3">Escolha a cidade</h1>
      <IconField>
        <InputIcon class="pi pi-search" />
        <InputText v-model="search" placeholder="Buscar cidade" fluid />
      </IconField>
    </div>
</template>

<script setup>
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';                   // optional
import { ref } from 'vue'

const search = ref('');
</script>

<style lang="scss" scoped>

</style>