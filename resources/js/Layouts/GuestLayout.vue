<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template >
    <div 
    class="min-h-screen  flex flex-col justify-center  items-center "
    style="background-color:#E5F2F9 ;"
    >
   
      <div class=" bg-white h-svh inline-grid grid flex flex-cols sm:max-w-md   py-10 rounded-lg w-full	">
        <div
            class="w-full   px-6    overflow-hidden "
        > 
        <p  class="text-cyan-900 font-extrabold	text-lg	 text-center">
      Already have an account?
    </p>
  </div>
        <!-- <img
          src="/img/logoini.png"
          alt="Logotipo "
          class="w-[250px] ml-1"
        /> -->


      
         <div
            class="w-full sm:max-w-xl mt-6 px-6  py-10  overflow-hidden "
        > 
            <slot />
          </div>
       
        </div>
    </div>
</template>
