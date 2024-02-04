<template>
  <Layout>
    <Head title="Crear raza" />
    <div class="py-8 w-10/12 ">
   <form @submit.prevent="submit">
    <section
        class="flex flex-col  bg-white/70 sm:flex-row  py-7 rounded-lg justify-between items-center"
      >
      <div
          class="flex w-72	text-2xl text-neutral-800/80	flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <p
          v-text="`Crear Raza`"
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
            href="/razas"
            title="Volver atrás"
            class="flex  items-center rounded-xl text-white font-semibold bg-red-600 hover:bg-gray-800/50 p-2 sm:p-2"
          >
            

            <img
              src="/img/icons/back.png"
              alt="Icono volver atrás"
              class="h-[30px]"
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
              v-text="`Raza`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
              <input
              type="text"
              v-model="categoria.name"
              autocomplete="off"
              name="name"
              id="name"
              required
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />

              <label

              />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-2 rounded-lg"
          >
            <label
              for="description"
              v-text="`Descripción`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-fullt p-1.5"
            >
              <input
              type="text"
              v-model="categoria.description"
              autocomplete="off"
              name="description"
              id="description"
              required
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />

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

<script setup>
import { ref, onMounted } from 'vue'
import { Head,useForm, Link } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue"
import Swal from 'sweetalert2';

const categoria = ref({})
const form = useForm({
  categoria: categoria.value,
})

const submit = () => {
  if (form.processing) return 

  form.categoria = categoria.value;

  form.post('/razas', { preserveScroll: true })
}

const deleteGasto = (id) =>{
  const alerta = Swal.mixin({
    buttonsStyling:true
  });

  Swal.fire({
  title: 'Eliminar?',
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText:'No'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
}
</script>

