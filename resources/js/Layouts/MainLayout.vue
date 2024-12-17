<template>
  <div class="w-full min-h-screen flex flex-col justify-between bg-[var(--neutral-200)]">
    <header v-if="!ismobile" class="flex justify-between py-2 px-6 bg-white shadow-md">
      <div class="flex items-center">
          <img class="size-12 mx-2 rounded-full" src="https://placehold.co/600?text=Logo" alt="" />
          <h2 class="font-bold text-sky-500">Feirine</h2>
      </div>
      <Menu />
    </header>
    <section v-else name="menu" class="w-full px-2 py-1 fixed bottom-0 bg-gray-100" >
      <Menu />
    </section>
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
import Menu from '@/Components/Menu.vue';
import Divider from 'primevue/divider';
const ismobile = ref(false);

const handleResize = () => {
  if (window.innerWidth <= 640) {
    ismobile.value = true;
  } else {
    ismobile.value = false;
  }
};

window.addEventListener('resize', handleResize);
handleResize();
</script>

