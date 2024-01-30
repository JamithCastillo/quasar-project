<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="max-h-screen  sm:justify-center   flex flex-col  items-center mt-10 sm:mt-0">
   
        <span class="flex flex-col items-center">
        
        <img
          src="/img/logoini.png"
          alt="Logotipo "
          class="w-[250px] ml-1"
        />


      </span>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg "
        >
            <slot />
        </div>
    </div>
</template>
