<template>
  <Layout>
    <Head title="Editar perro" />
    <div class="py-8 w-10/12 ">
      <form @submit.prevent="submit" :schema="form">
    <section
        class="flex flex-col  bg-white/70 sm:flex-row  py-7 rounded-lg justify-between items-center"
      >
      <div
          class="flex w-72	text-2xl text-neutral-800/80	flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <p
          v-text="`Editar Perro`"
          class="uppercase  font-semibold sm:w-auto text-center xsm:text-left"
        />
      </div>
        <div
          class="flex w-1/5 flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <button
            title="Guardar datos rellenados en el formulario"
            class="flex items-center rounded-xl text-green-600  font-semibold  hover:bg-gray-400/20 p-2 sm:p-2"
          >
            Guardar

            <img
              src="/img/icons/save.png"
              alt="Icono guardar datos"
              class="h-[40px]"
            />
          </button>
         
          <Link
            href="/perros"
            title="Volver atrás"
            class="flex gap-2 items-center rounded-xl text-white font-semibold bg-red-600 hover:bg-gray-800/50 p-2 sm:p-3"
          >
            Volver

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
              for="tamano"
              v-text="`Tamaño *`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl w-full p-1.5"
            >
            <select
            @change="greet(searchParams.tamano)"
            v-model="searchParams.tamano"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-1"
        >
          <option
            hidden
            selected
            v-text="`Seleccionar empresa`"
          />
          
          <option 
            v-for="tamano in tamano"
            :value="tamano.id"
            v-text="`${tamano.name}`"
          />
        </select>
              

              <label

              />
            </div>
          </span>

          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
            <label
              for="numero"
              v-text="`Número ID perro *`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
              <input
              v-model="perro.numero"
              type="text"
              autocomplete="off"
              name="numero"
              id="numero"
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />

              <label

              />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
            <label
              for="Fecha"
              v-text="`Fecha Entrada*`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
              <input
              v-model="form.fechafactura"
              type="date"
              autocomplete="off"
              name="fechafactura"
              id="fechafactura"
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />

              <label

              />
            </div>
          </span>
        </div>
<div class="flex flex-col sm:flex-row">
          <span
            class="flex flex-col gap-1 justify-center w-4/5 p-3 rounded-lg"
          >
            <label
              for="dueno"
              v-text="`Dueño`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
            <select
            v-model="form.dueno"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-1"
        >
          <option
            hidden
            selected
            v-text="`Seleccionar dueño`"
          />
          
          <option 
            v-for="user in user"
            :value="user.id"
            v-text="`${user.name}  |  ${user.email}`"
          />
        </select>


              <label

              />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-2/5 p-3 rounded-lg"
          >
            <label
              for="color"
              v-text="`Color perro`"
              class="uppercase font-extrabold text-xs"
            />
             <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
              <input
              v-model="form.color"
              type="text"
              autocomplete="off"
              name="color"
              id="color"
              required
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />
              <label

              />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-2/5 p-3 rounded-lg"
          >
            <label
              for="raza"
              v-text="`Raza`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
            <select
            v-model="form.raza"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-1"
        >
          <option
            hidden
            selected
            v-text="`Seleccionar raza`"
          />
          
          <option 
            v-for="raza in raza"
            :value="raza.id"
            v-text="`${raza.name}`"
          />
        </select>

              <label

              />
            </div>
          </span>
        </div> 


        <div 
        class="flex flex-col sm:flex-row">
          
          <span
            :class="{ 'flex flex-col gap-1 justify-center w-3/12 p-3 rounded-lg': searchParams.tipo_factura == '2', 'flex flex-col gap-1 justify-center w-full p-3 rounded-lg': searchParams.tipo_factura != '2' }"
          >
            <label
              for="Importe 0%"
              v-text="`Importe `"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
              <input
              v-model="form.imp0"
              @keyup="onPress('imp0')"
              type="text"
              autocomplete="off"
              name="imp0"
              id="imp0"
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />
              <label
              />
            </div>
          </span>
          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
            <label
              for="Bonificaciòn"
              v-text="`Bonificaciòn`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
              <input
              v-model="form.bonificacion"
              @keyup="onPress('bonificacion')"
              type="text"
              autocomplete="off"
              name="bonificacion"
              id="bonificacion"
              class="text-sm rounded-xl w-full p-2.5 border-gray-300"
              />
              
              <label

              />
            </div>
          </span>
        </div>

        <div class="flex flex-col sm:flex-row">
          <span
            class="flex flex-col gap-1 justify-center w-2/5 p-3 rounded-lg"
          >
           

            <div
              class="flex items-center gap-1 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-1.5"
            >
            <p class=" rounded-xl w-3/5 p-5 text-xl	numero font-black border-gray-300">TOTAL: €{{ total1}}</p>
            </div>
          </span>
         </div>

        <div class="flex flex-col sm:flex-row">
          <span
            class="flex flex-col gap-1 justify-center w-full p-3 rounded-lg"
          >
            <div class="flex gap-2 items-center">
              <label
                for="image"
                v-text="`perro *`"
                class="uppercase font-extrabold text-xs"
              />
            </div>

            <input
              type="file"
              accept="image/*"
              @input="onUserUploadedFile($event.target.files[0])"
              name="image"
              id="image"
              class="w-full md:w-fit border-gray-500 h-fit rounded-lg bg-white cursor-pointer border-2 focus:ring-4 focus:ring-blue-300"
            />

            <img
              ref="productImageEl"
              alt="Imagen ticket"
              title="Imagen de la plantilla"
              class="w-[150px] border rounded-lg mt-2"
              :src="`/storage/perros/${perro.numero}_perro.png`"
              id="imagenes"
              :data-id="`${perro.numero}`"
            />
          </span>
         
        </div>
      </section>
    </form>
    </div>
  </Layout>
</template>

<script setup>
import { ref,onMounted, readonly } from 'vue'
import { Head,useForm, Link } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue"
import Swal from 'sweetalert2';
import $ from "jquery";

const props = defineProps({
  perros:{type:Object},
  tamano: Array,
  raza: Array,
  user: Array,
  proveedor: Array
});

const productImageEl = ref()

const perro = ref(props.perros)
const numeroInput = ref()
const total = ref({})
const total1 = ref()
const urlParams = new URLSearchParams(window.location.search)
const searchParams = ref({
  tamano:  props.perros['tamano'],
})

const form = useForm({
  numero: perro.value.numero,
  tipo_factura: perro.value.tipo_factura,
  fechafactura: perro.value.fechafactura,
  importotal: '',
  imp0: perro.value.imp0,
  bonificacion: perro.value.bonificacion,
  dueno: perro.value.dueno,
  color: perro.value.color,
  raza: perro.value.raza,
  image:'',
})

const submit = () => {
  if (form.processing) return 
  if(total1.value == '' ){
    Swal.fire({
    icon: "error",
    title: "Error...",
    text: "Tiene que agregar un valor al importe",
  });
  return
  }


  form.tamano = searchParams.value.tamano;
  form.importotal = total1.value ;

  form.post(`/perros/${perro.value.numero}`, { preserveScroll: true })
}


const onUserUploadedFile = (file) => {
  form.image = file
  getBase64(file).then((result) => (productImageEl.value.src = result))

  // show uploaded image
  productImageEl.value.classList.remove("hidden")
}

const getBase64 = (file) => {
  return new Promise((resolve, reject) => {
    let reader = new FileReader()
    reader.onload = () => {
      resolve(reader.result)
    }
    reader.onerror = reject
    reader.readAsDataURL(file)
  })
}

$(document).on("click","#imagenes", function(){
  const filePath = '/storage/perros/'+$(this).data('id')+'_perro.png';

  fetch(filePath, { method: 'HEAD' })
    .then(response => {
        if (response.ok) {
          Swal.fire({
          title: 'Perro #'+$(this).data('id')+'',
          width: 600,
          padding: "3em",
          color: "#black",
          confirmButtonColor: '#3085d6',
          imageUrl: "/storage/perros/"+$(this).data('id')+"_perro.png",
          imageWidth: 600,
          imageHeight: 300,
          imageAlt: "Custom image",
          backdrop: `
          rgba(0, 0, 0, 0.57)
            left top
            no-repeat
          `
        });
        } 
    })
   
  
});


const onPress = (e) => {

      $('.numero').on('keyup', function (e) {
        $(this).val($(this).val().replace(/[^\d.]/g, ''));
      });


  if(e == 'imp0'){
    if(!form.imp0){
      delete total.value[0];
    }else{
 total.value[0] = [form.imp0]
    } 
  }

  if(e == 'bonificacion'){
    if(!form.bonificacion){
      delete total.value[1];
    }else{
 total.value[1] = [form.bonificacion]
    } 
  }


let suma = 0;

for (let propiedad in total.value) {
  if (total.value.hasOwnProperty(propiedad)) {
    let valor = total.value[propiedad];
    if (!isNaN(valor)) {
      suma += parseFloat(valor);
    }
  }
}
total1.value = parseFloat(suma).toFixed(2)


};


onMounted(() => {
  
  

    if(!form.imp0){
      delete total.value[0];
    }else{
 total.value[0] = [form.imp0]
    } 

    if(!form.bonificacion){
      delete total.value[1];
    }else{
 total.value[1] = [form.bonificacion]
    } 

    

let suma = 0;

for (let propiedad in total.value) {
  if (total.value.hasOwnProperty(propiedad)) {
    let valor = total.value[propiedad];
    if (!isNaN(valor)) {
      suma += parseFloat(valor);
    }
  }
}
total1.value = parseFloat(suma).toFixed(2)

})

</script>



