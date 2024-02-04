<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue"

const form = useForm({
    name: '',
    email: '',
    movil: '',
    telefono: '',
    company: '',
    password: '',
    password_confirmation: '',
    rol: '3',
});

const submit = () => {
  form.post('/users', { preserveScroll: true ,
    // onFinish: () => form.reset('password', 'password_confirmation')
  })
  
};
</script>

<template>
    <Layout>
    <Head title="Crear Dueño" />
    <div class="py-8 w-10/12 ">
        <form @submit.prevent="submit">
    <section
        class="flex flex-col  bg-white/70 sm:flex-row  py-7 rounded-lg justify-between items-center"
      >
      <div
          class="flex w-80	text-2xl text-neutral-800/80	flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <p
          v-text="`Crear dueño`"
          class="uppercase  font-semibold sm:w-auto text-center xsm:text-left"
        />
      </div>
        <div
          class="flex w-1/5 flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <button  
            title="Guardar datos rellenados en el formulario"
            class="flex items-center rounded-xl text-cyan-600	  font-semibold  hover:bg-gray-400/20 p-2 sm:p-2"
          >
            Guardar

            <img
              src="/img/icons/save.png"
              alt="Icono guardar datos"
              class="h-[40px]"
            />
          </button>
         
          <Link
          :href="route('duenos.index')"
            title="Volver atrás"
            class="flex  items-center rounded-xl text-white font-semibold bg-red-600 hover:bg-gray-800/50 p-2 sm:p-2"
          >

            <img
              src="/img/icons/back.png"
              alt="Icono volver atrás"
              class="h-[27px]"
            />
          </Link>
        </div>

      </section>
      
    <br>
      

      <section
        class="flex flex-col gap-5 h-[500px] sm:h-[680px] bg-white rounded-lg pt-5 px-5 overflow-y-auto overflow-x-hidden"
      >
        
        <div class="flex flex-col sm:flex-row">
          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
          <label
              for="name"
              v-text="`Name`"
              class="uppercase font-extrabold text-xs"
            />
            
            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
            <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block text-sm rounded-xl w-full p-2.5 border-gray-300"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-2 rounded-lg"
          >
            <label
            for="email" 
              v-text="`Email`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-fullt p-1.5"
            >
            <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full text-sm rounded-xl  p-2.5 border-gray-300"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
    
              <label

              />
            </div>
          </span>
          
        </div>
        
        <div class="flex flex-col sm:flex-row">
          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
          <label
              for="movil"
              v-text="`Móvil`"
              class="uppercase font-extrabold text-xs"
            />
            
            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
            <TextInput
                    id="movil"
                    type="text"
                    class="mt-1 block w-full text-sm rounded-xl  p-2.5 border-gray-300"
                    v-model="form.movil"
                    autocomplete="movil"
                />

                <InputError class="mt-2" :message="form.errors.movil" />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-2 rounded-lg"
          >
            <label
            for="telefono" 
              v-text="`Teléfono`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-fullt p-1.5"
            >
            <TextInput
                    id="telefono"
                    type="text"
                    class="mt-1 block w-full text-sm rounded-xl  p-2.5 border-gray-300"
                    v-model="form.telefono"
                    autofocus
                    autocomplete="telefono"
                />

                <InputError class="mt-2" :message="form.errors.telefono" />
    
              <label

              />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-2 rounded-lg"
          >
            <label
            for="company" 
              v-text="`Empresa`"
              class="uppercase font-extrabold text-xs"
            />
            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-fullt p-1.5"
            >
            <TextInput
                    id="company"
                    type="text"
                    class="mt-1 block w-full text-sm rounded-xl  p-2.5 border-gray-300"
                    v-model="form.company"
                    required
                    autocomplete="company"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
    
              <label

              />
            </div>
          </span>
        </div>
        
        <div class="flex flex-col sm:flex-row">
          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
          <label
              for="password"
              v-text="`Contraseña`"
              class="uppercase font-extrabold text-xs"
            />
            
            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
            <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full text-sm rounded-xl  p-2.5 border-gray-300"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-2 rounded-lg"
          >
            <label
            for="password_confirmation" 
              v-text="`Confirmar contraseña`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-fullt p-1.5"
            >
            <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full text-sm rounded-xl  p-2.5 border-gray-300"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
    
              <label

              />
            </div>
          </span>
          
        </div>
       
   
      </section>
    </form>
    </div>
  </Layout>

</template>
