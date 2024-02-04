<template>
  <footer class="flex flex-col gap-12 p-4  w-full items-center justify-center    bg-white">
    <a
      v-if="$page.component.toLowerCase().includes('dashboard')"
      href="#"
      target="_blank"
      style="background-color:#0C3866 ;"
      class="flex items-center gap-3 text-white  hover:bg-sky-800 p-3 rounded-lg"
    >
      <SendIcon :size="30" />

      <p
        v-text="`VISITA NUETRA PAGINA WEB`"
        class="text-lg "
      />
    </a>

    <a
      href="#"
      v-text="$page.component != `Index`
        ? `© 2024 Jamith Alexey Castillo Cano. `
        : ``
      "
      class="uppercase italic text-center sm:text-left  hover:underline"
    />
  </footer>
</template>

<script setup>
import SendIcon from '@/Shared/Icons/Send.vue'
</script>