<template>

  <AuthenticatedLayout>   
  <!-- <div class="flex flex-col items-center  "> -->
  <div class="flex flex-col   items-center  ">
    

    <slot />

     <Footer /> 
  </div></AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
 import Footer from '@/Shared/Footer.vue'
</script>