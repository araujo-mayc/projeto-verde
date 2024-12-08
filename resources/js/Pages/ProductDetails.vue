<template>
    <div class="w-full max-w-screen-md min-h-screen flex flex-col">
      <img class="block xl:block w-full min-h-44 bg-orange-100 rounded-md" :src="product?.images" alt=""></img>

    <div class="flex flex-col pt-2 pb-6 px-4">
      <small class="w-full text-end">Publicado em: {{ new Date(product?.created_at).toLocaleString('pt-BR', { day: '2-digit', month: 'numeric' }) }} às {{ new Date(product?.created_at).toLocaleString('pt-BR', { hour: '2-digit', minute: '2-digit' }) }}</small>
      <div class="flex flex-col gap-y-2">
        <h2 class="font-bold truncate">{{ product?.title }}</h2>
        <span class="font-bold text-[var(--p-primary-500)] text-2xl">R$ {{ parseFloat(product?.prices).toLocaleString('pt-BR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}</span>
        <Divider />
        <section name="description" class="description">
          <h2 class="mb-3">Descrição</h2>
          <p class="description-text" :class="{ expanded: expanded }">{{ product?.description }}</p>
          <div class="w-full flex justify-center">
            <Button :label="expanded ? 'Ver menos' : 'Ver mais'" icon="pi pi-angle-down" @click="expanded = !expanded" text fluid />
          </div>
        </section>
        <section name="details" class="flex flex-col py-3">
          <div class="w-full grid grid-cols-2 gap-y-7">
            <div class="flex gap-x-3">
              <span class="material-icons size-6">bookmark</span>
              <div class="flex flex-col">
                <span class="text-[var(--neutral-500] text-sm font-normal">CATEGORIA</span>
                <span class="text-[var(--neutral-900] font-normal"> {{ product?.category }}</span>
              </div>
            </div>
            <div class="flex gap-x-3">
              <span class="material-icons size-6">calendar_month</span>
              <div class="flex flex-col">
                <span class="text-[var(--neutral-500] text-sm font-normal">PUBLICADO</span>
                <span class="text-[var(--neutral-900)] font-normal">
                  {{ product?.created_at ? timeAgo(product.created_at) : '' }}
                </span>
              </div>
            </div>
            <div class="flex gap-x-3">
              <span class="material-icons size-6">grid_3x3</span>
              <div class="flex flex-col">
                <span class="text-[var(--neutral-500] text-sm font-normal">ESTOQUE</span>
                <span class="text-[var(--neutral-900] font-normal"> {{product?.quantity}} {{ product?.quantity === 1 ? 'unidade' : 'unidades' }}</span>
              </div>
            </div>
            <div class="flex gap-x-3">
              <span class="material-icons size-6">label</span>
              <div class="flex flex-col">
                <span class="text-[var(--neutral-500] text-sm font-normal">CONDIÇÃO</span>
                <span class="text-[var(--neutral-900] font-normal"> {{ product?.type }}</span>
              </div>
            </div>
          </div>

          <div class="w-full pt-7">
            <div class="flex gap-x-3">
              <span class="material-icons size-6">place</span>
              <div class="flex flex-col">
                <span class="text-[var(--neutral-500] text-sm font-normal">LOCALIZAÇÃO</span>
                <span class="text-[var(--neutral-900] font-normal"> {{ product.locate }}</span>
              </div>
            </div>
          </div>
        </section>

        <section name="seller">
          <h2 class="mb-3">Vendedor</h2>
          <div class="w-full flex flex-col items-center gap-y-1">
            <label class="text-[var(--neutral-900] font-semibold">{{ sellerInfo?.name }}</label>
            <Chip :label="`${parseFloat(sellerInfo?.average_rating).toFixed(1)} (${sellerInfo?.rating_count})`" icon="pi pi-star-fill" style="background-color: transparent" />
            <Avatar label="P" class="" size="xlarge" shape="circle" />
            <div class="flex gap-x-2">
              <label for="">Verificado com:</label>
              <Tag icon="pi pi-phone" :severity="sellerInfo?.phone_verified ? 'primary' : 'secondary'" rounded />
              <Tag icon="pi pi-envelope" :severity="sellerInfo?.email_verified ? 'primary' : 'secondary'" rounded />
              
            </div>
            <label for="">No APP desde  {{ new Date(sellerInfo?.created_at).toLocaleString('pt-BR', { month: 'long', year: 'numeric' }) }}</label>
            <small>{{ timeAgoLastActivity(sellerInfo?.last_activity) }}</small>
          </div>
          <Button class="mt-1" size="small" icon="pi pi-shop" label="Ver todos os anúncios" text fluid />
        </section>
        <Button class="mt-3" icon="pi pi-whatsapp" label="Entrar em contato" />
        <Divider/>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, ref } from 'vue';
import { Divider } from 'primevue';
import Chip from 'primevue/chip';
import Avatar from 'primevue/avatar';
import Button from 'primevue/button';
import Tag from 'primevue/tag';

defineProps({
  product: {
    type: Object,
    required: true
  },
  sellerInfo: {
    type: Object,
    required: true
  }
});

const expanded = ref(false);


function timeAgo(dateString) {
  const now = new Date();
  const past = new Date(dateString);
  const diffInSeconds = Math.floor((now - past) / 1000);

  const intervals = [
    { label: 'ano', seconds: 31536000 },
    { label: 'mês', seconds: 2592000 },
    { label: 'dia', seconds: 86400 },
    { label: 'hora', seconds: 3600 },
    { label: 'minuto', seconds: 60 },
    { label: 'segundo', seconds: 1 },
  ];

  for (const interval of intervals) {
    const count = Math.floor(diffInSeconds / interval.seconds);
    if (count > 0) {
      return `Há ${count} ${interval.label}${count > 1 ? 's' : ''} atrás`;
    }
  }
  return 'Agora mesmo';
}

function timeAgoLastActivity(timestamp) {
  const now = new Date().getTime() / 1000;
  const diffInSeconds = now - timestamp;

  const intervals = [
    { label: 'ano', seconds: 31536000 },
    { label: 'mês', seconds: 2592000 },
    { label: 'dia', seconds: 86400 },
    { label: 'hora', seconds: 3600 },
    { label: 'minuto', seconds: 60 },
    { label: 'segundo', seconds: 1 },
  ];

  for (const interval of intervals) {
    const count = Math.floor(diffInSeconds / interval.seconds);
    if (count > 0) {
      return `Último acesso há ${count} ${interval.label}${count > 1 ? 's' : ''} atrás`;
    }
  }
  return 'Acesso recente';
}

</script>

<style scoped>
.description-text {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  line-clamp: 4; 
  -webkit-box-orient: vertical;
  box-orient: vertical;
}

.expanded {
  -webkit-line-clamp: unset;
  line-clamp: unset;
}
</style>