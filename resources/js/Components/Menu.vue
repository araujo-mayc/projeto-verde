<template>
      <nav v-if="!hideMenu" class="flex justify-center gap-x-4 z-50">
        <Button 
        :severity="activedPage === 'home' ? 'primary' : 'secondary'" @click="redirectTo('/cidades')"
        size="small" class="!py-1" text>
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
          size="small" class="!py-1" text>
          <div class="flex flex-col">
            <span class="material-icons">account_circle</span>
            <span class="font-base text-xs">Perfil</span>
          </div>
        </Button>
      </nav>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import Button from 'primevue/button';

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