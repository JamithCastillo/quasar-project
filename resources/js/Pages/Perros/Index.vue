<template>
  <Layout>
    <Head title="Peros" />
    
    <div class="py-8 w-10/12 ">
        <section
        class="flex flex-col  bg-white/70 sm:flex-row  py-7 rounded-lg justify-between items-center"
      >
      <div
          class="flex w-72	text-2xl text-neutral-800/80	flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <p
          v-text="`Perros`"
          class="uppercase  font-semibold sm:w-auto text-center xsm:text-left"
        />
        <button
            @click="EyeTable(categoria)"
            preserve-scroll
            title="Filtrar"
            class="flex  items-center rounded-xl text-white font-semibold bg-cyan-500/10 hover:bg-gray-800/50 p-2 sm:p-2"
          >
            <img
              src="/img/icons/filter.png"
              alt="Icono volver atrás"
              class="h-[39px]"
            />
          </button>
      </div>
        <div
          class="flex w-1/5 flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <Link
          :href="route('perros.create')" 
            title="Crear un nuevo perro"
            class="flex items-center rounded-xl text-black  font-semibold  hover:bg-gray-400/20 p-2 sm:p-2"
          > Nueva
            <img
              src="/img/icons/create.png"
              alt="Icono editar"
              class="h-[67px]"
            />
          </Link>

          <Link
            href="/dashboard"
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
    <div class="bg-white grid v-screen 	 justify-items-center relative  shadow-md rounded-lg xl:h-[80] md:h-[80]  ">
      
      <div class="pricing-wrapper grid sm:grid-cols-4   w-full gap-3 text-lg rounded-lg font-extrabold p-7 ">
		<!-- Titulo -->
		<div
  
    class="pricing-table  rounded-lg sm:w-[220px] "
    v-for="value in grupo" >
			<h3
      :class="getRandomBackgroundColor()" 
      class="pricing-title rounded-lg text-white uppercase p-4 ">{{value.nombre}}</h3>
			<div class="price rounded-lg p-3">{{value.total_monto}}€</div>
			<!-- Lista de Caracteristicas / Propiedades -->	
		</div>
		
		
	</div>    
      <div class=" bg-white/50  rounded-lg place-items-center justify-center py-14 items-start w-11/12   ">
          <DataTable  :data="perros.data"  :columns="columns1" :columnDefs="columnDefsConfig"
     class="border-1 border-gray-900 display  bg-white/40" style="width:100%"
     :options="{responsive:true,autoWidth:false,dom:'Bfrtip', order: [['0', 'asc']],select: true, buttons:buttons1, language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-CO.json', // Ajusta la ruta al archivo descargado
      }}">
     <thead class="">
            <tr class="bg-gray-800 text-white">
              <th class="px-2 py-4">Codigo Perro</th>
              <th class="px-2 py-4">Tamaño</th>
              <th class="px-2 py-4">Dueño</th>
              <th class="px-2 py-4">Raza</th>
              <th class="px-2 py-4">Color</th>
              <th class="px-2 py-4">Fecha</th>
              <th class="px-10 py-4">Acciones</th>
            </tr>
          </thead>
   
    </DataTable>
         
    </div>
    </div>
    <br>
    </div>
    <div
      ref="modalEl"
      class="hidden overflow-y-auto fixed  w-full h-auto inset-0  justify-center "
      style="background: #00000087"
    >
      <div
      class="relative p-4 w-full max-w-2xl h-auto flex flex-col  items-center  gap-2"
      >
      <section
        class="flex flex-col gap-5  bg-white rounded-lg pt-5 px-5  "
      >
      <span class="flex justify-end">
            <button
              @click="hideModal()"
              title="Cerrar mensaje"
              class="rounded-xl bg-red-600 hover:bg-red-500 p-1 text-white text-sm focus:ring-4 focus:ring-red-300"
            >
              <CancelIcon />
            </button>
          </span>
         
          
       
       
        <p class="flex flex-col uppercase bg-gray-200 rounded-xl shadow-md p-2 font-black  ">Perro</p>
          <div 
          class="flex flex-col p-5 gap-6 shadow-sky-700/30 shadow-md rounded-xl sm:flex-row  ">
        <span
        class="flex flex-col gap-1  justify-center w-full p-3 "
          >
            <label
              for="tamano"
              v-text="`Tamaño`"
              class="uppercase font-extrabold text-xs"
            />

            <div
            class="flex items-center gap-1 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-4"
            >
            <select
              v-model="searchParams.tamano"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-1"
              required
              >
              <option
          class="text-gray-500 italic"
            selected
            value=""
            v-text="`Seleccionar`"
          />
          
              <option 
                v-for="tamano in tamano"
                :value="tamano.id"
                v-text="`${tamano.name}`"
              />
            </select>

              <label/>
            </div>
          </span>
          <span
            class="flex flex-col gap-1  justify-center w-full p-3 rounded-lg"
          >
            <label
              for="raza"
              v-text="`Raza`"
              class="uppercase font-extrabold text-xs"
            />

            <div
              class="flex items-center gap-1 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 w-full p-4"
            >
       <select
          v-model="searchParams.raza"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-1"
          required
          >
          <option
          class="text-gray-500 italic"
            selected
            value=""
            v-text="`Seleccionar`"
          />
          
          <option 
            v-for="raza in raza"
            :value="raza.id"
            v-text="`${raza.name}`"
          />
        </select>
              <label/>

            </div>
          </span>    
             
        </div>
        <span class="flex justify-end p-4">
            <button
            @click="submit()"
              title="Guardar datos rellenados en el formulario"
            class="flex uppercase bg-sky-600 items-center rounded-xl text-white  hover:text-black font-semibold  hover:bg-gray-400/20 p-3 sm:p-3"
             >
              Buscar
            </button>
          </span>
        <span class="flex gap-4">
           
          </span>
      </section>
      </div>
    </div>
  </Layout>
</template>
<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, onMounted, readonly } from "vue"
import { Inertia } from "@inertiajs/inertia"
import $ from "jquery";
import Layout from "@/Layouts/Layout.vue"
import CancelIcon from "@/Shared/Icons/Cancel.vue"
import Swal from 'sweetalert2';
import DataTable from 'datatables.net-vue3';
import "datatables.net-dt/css/jquery.dataTables.css";
import "datatables.net-buttons";
import ButtonsHtml5 from "datatables.net-buttons/js/buttons.html5";
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css'
import JsZip from "jszip";
import pdfmake from "pdfmake/build/pdfmake";
import * as pdfFonts from "pdfmake/build/vfs_fonts";
window.JSZip = JsZip;
pdfmake.vfs = pdfFonts.pdfMake.vfs;

DataTable.use(ButtonsHtml5);

const props = defineProps({
  paginationObject: Object,
  tamano: Array,
  raza: Array,
  grupo: Array,
})
const raza = ref(props.raza) 
const tamano = ref(props.tamano)
const perros = ref(props.paginationObject)
const grupo = ref(props.grupo)
const columns1 = ref([]);
const columnDefsConfig = ref([]);
const buttons1 = ref([]);
const order = ref([]);


columns1.value = [{data: null,
        render: function(data, type, row)
{
  return (row.numero )}},
{data:'tamano'},
{data:'usuario'},
{data:'razaname'},
{data:'color'},
{data:'fechafactura'},
{ data: null, orderable: true, className: 'exclude', render: function (data) { 
    return '<button class="rounded-xl text-red-500 font-semibold text-xl	  hover:text-gray-800/50 w-1/4" data-id="' + data.numero + '" id="edit"> <i class="fa-solid fa-trash"></i></button><button class="rounded-xl text-sky-500 font-semibold text-xl hover:text-gray-800/50 w-1/4" data-id="' + data.numero + '" id="foto"> <i class="fa-solid fa-image"></i></button><button class="rounded-xl text-green-500 font-semibold text-xl hover:text-gray-800/50 w-1/4" data-id="' + data.numero + '" id="verPerro"> <i class="fa-solid fa-pen-to-square"></i></button>'; }, },
{data:'imp0', title:'Importe 0%', visible: false },
{data:'bonificacion', title:'Bonificacion', visible: false },
{data:'dueno', title:'Dueño', visible: false },
]

columnDefsConfig.value = [
    {
        targets: [2], // El número de la columna que deseas ocultar
        className: 'exclude', // Agrega una clase CSS para excluir en la exportación
    },
    // Agrega otras configuraciones de columnDefs si es necesario
]


$(document).on("click","#edit", function(){
  
    Swal.fire({
    title: 'Desea eliminar el perro #'+$(this).data('id')+'? ',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText:'No'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Eliminado!',
        'Su perro ha sido eliminado.',
        'success'
      )
       window.location.href = "perros/"+$(this).data('id')+"";
    }
  })
});

$(document).on("click","#foto", function(){
  Swal.fire({
  title: 'Foto perro #'+$(this).data('id')+'',
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
});
const backgroundColors = ['bg-red-500', 'bg-green-500', 'bg-blue-500', 'bg-yellow-500'];

const getRandomBackgroundColor = () => {
  return backgroundColors[Math.floor(Math.random() * backgroundColors.length)];
};

$(document).on("click","#verPerro", function(){
  window.location.href = "perros/"+$(this).data('id')+"/edit";
});


buttons1.value = [
  {
  title:'Perros', extend:'excel',
  text:'<i class="fa-solid fa-file-excel"></i> Excel',
  className:'inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150',
  exportOptions: {
                columns: function (index, data, node) {
                    return (index !== 6 );
                }
            }
        
  },
  {
  title:'Perros', extend:'pdf',
  text:'<i class="fa-solid fa-file-pdf"></i> PDF',
  className:'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150',
  orientation: 'landscape',
  exportOptions: {
                columns: function (index, data, node) {
                    return (index !== 6 );
                }
            }
  },
  {
  title:'Perros', extend:'print',
  text:'<i class="fa-solid fa-file-print"></i> PRINT',
  className:'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
  exportOptions: {
                columns: function (index, data, node) {
                    return (index !== 6 );
                }
            }
  },
  {
  title:'Perros', extend:'copy',
  text:'<i class="fa-solid fa-file-copy"></i> COPY',
  className:'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150',
  exportOptions: {
                columns: function (index, data, node) {
                    return (index !== 6 );
                }
            }
  }

]
//Buscador de historial
const urlParams = new URLSearchParams(window.location.search)
const searchParams = ref({
  tamano: urlParams.get("tamano") || "",
  raza: urlParams.get("raza") || "",
})




const submit = () => {

  let filteredSearchParams = Object.fromEntries(
    Object.entries(searchParams.value).filter(([_, v]) => v != "")
  )
  // add more attributes

  Inertia.get("/perros", filteredSearchParams, { preserveScroll: true })
}

//Buscador de tasas fin
const modalEl = ref(null)

const showModal = () => {
  modalEl.value.classList.remove("hidden")
  modalEl.value.classList.add("flex")
}

const hideModal = () => {
  modalEl.value.classList.add("hidden")
  modalEl.value.classList.remove("flex")
}

const EyeTable = (data) => {
  showModal()
}
</script>

<style>

/** ========================
 * Contenedor
 ============================*/

.pricing-table {
	text-align: center;
	-webkit-box-shadow: 0 0 15px rgba(0,0,0,0.4);
	box-shadow: 0 0 15px rgba(0,0,0,0.4);
	-webkit-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}

.pricing-table:hover {
	-webkit-transform: scale(1.06);
	-ms-transform: scale(1.06);
	-o-transform: scale(1.06);
	transform: scale(1.06);
}

</style>
