
<template>
                <h1 class="font-extrabold flex w-full py-5 text-black text-2xl sm:justify-center  leading-tight justify-between ">PANEL DE CONTROL </h1>

  <nav class="flex w-full justify-center sm:mr-7 m- ">

    <div class="py-14  ">
            <div class="max-w-6xl mx-auto sm:px-8  ">
                <div class="bg-white/40 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-10 text-gray-900  space-y-6">
    <section
        class="flex flex-col sm:flex-row items-center sm:items-start gap-4  w-full sm:w-12/2  sm:px-0 justify-center "
      >
 
        <a
        :href="route('perros.index')" 
          class="flex flex-col w-[300px] h-[173px] items-center gap-3 bg-gray-400/30 rounded-xl hover:bg-sky-600/50 p-3"
        > 
        
        
        <!-- <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Perros
                                </NavLink> -->
          <img
            src="/img/icons/perros.png"
            alt="Perros"
            class="w-[120px]"
          />
    
          <p
            v-text="`Perros`"
            class="font-extrabold uppercase text-center"
          />
        </a>
        <a
        :href="route('duenos.index')" 
          class="flex flex-col w-[300px] h-[173px] items-center gap-3 bg-gray-400/30 rounded-xl hover:bg-sky-600/50 p-3"
        >
          <img
            src="/img/icons/dueño.png"
            alt="Comerciales"
            class="w-[120px]"
          />
    
          <p
            v-text="`Dueños`"
            class="font-extrabold uppercase text-center"
          />
        </a>
    
      
      </section>
      <section
        class="flex flex-col sm:flex-row items-center sm:items-start gap-4  w-full sm:w-6/5 px-4 sm:px-0 justify-center"
      >
        <a
          :href="route('razas.index')" 
          class="flex flex-col w-[300px] h-[173px] items-center gap-3 bg-gray-400/30 rounded-xl hover:bg-sky-600/50 p-3"
        >
          <img
            src="/img/icons/razas.png"
            alt="Categorías"
            class="w-[120px]"
          />
    
          <p
            v-text="`Razas`"
            class="font-extrabold uppercase text-center"
          />
        </a>
      <a
        :href="route('administradores.index')" 
          class="flex flex-col w-[300px] h-[173px] items-center gap-3 bg-gray-400/30 rounded-xl hover:bg-sky-600/50 p-3"
        >
          <img
            src="/img/icons/administradores.png"
            alt="Administradores"
            class="w-[120px]"
          />
    
          <p
            v-text="`Administradores`"
            class="font-extrabold uppercase text-center"
          />
        </a>
       
      </section>
    </div>
                </div>
            </div>
        </div>
   

  </nav>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { Link } from "@inertiajs/vue3"
// import UserDropdown from "@/Shared/UserDropdown.vue"
</script>
