<template>
  <div class="w-full min-h-screen flex flex-col justify-between bg-[var(--neutral-200)]">
  <header class="flex justify-between py-2 px-6 bg-white shadow-md">
    <div class="flex items-center">
        <img class="size-12 mx-2 rounded-full" src="https://placehold.co/600?text=Logo" alt="" />
        <h2 class="font-bold text-sky-500">Feirine</h2>
    </div>
    <div v-if="!hideMenu" class="flex justify-center gap-x-5 ">
      <Button 
      :severity="activedPage === 'home' ? 'primary' : 'secondary'" @click="redirectTo('/cidades')"
      size="small" class="!p-1" text>
        <div class="flex flex-col">
          <span class="material-icons">dashboard</span>
          <span class="font-base text-xs">Anúncios</span>
        </div>
      </Button>
      <Button 
      :severity="activedPage === 'my_ads' ? 'primary' : 'secondary'" @click="redirectTo('/perfil/meus-anuncios')"
      size="small" class="!p-1" text>
        <div class="flex flex-col">
          <span class="material-icons">folder</span>
          <span class="font-base text-xs">Meus Anúncios</span>
        </div>
      </Button>
      <Button 
        :severity="activedPage === 'notifications' ? 'primary' : 'secondary'" @click="redirectTo('notifications')" 
        size="small" class="!p-1" text >
        <div class="flex flex-col">
          <span class="material-icons">notifications</span>
          <span class="font-base text-xs">Notificações</span>
        </div>
      </Button>
      <Button 
        :severity="activedPage === 'profile' ? 'primary' : 'secondary'" @click="redirectTo('profile')"
        size="small" class="!p-1" text>
        <div class="flex flex-col">
          <span class="material-icons">account_circle</span>
          <span class="font-base text-xs">Perfil</span>
        </div>
      </Button>
    </div>
  </header>
  <main class="flex grow justify-center bg-[var(--neutral-200)] mt-2">
      <slot name="main" />
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
import { ref } from 'vue';
import Button from 'primevue/button';
import Divider from 'primevue/divider';
import { router } from '@inertiajs/vue3';

defineProps({
  hideMenu: {
    type: Boolean,
    required: false,
    default: false
  },
  activedPage: {
    type: String,
    required: false,
    default: 'home'
  }
});





const redirectTo = (route) => {
  if (route) {
    router.visit(route, {
      method: 'get',
    });
  }
};
</script>
