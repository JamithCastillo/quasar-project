<template>
  <Layout>
    <Head title="Administradores" />
    
    <div class="py-8 w-10/12 ">
        <section
        class="flex flex-col  bg-white/70 sm:flex-row  py-7 rounded-lg justify-between items-center"
      >
      <div
          class="flex w-72	text-2xl text-neutral-800/80	flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
        <p
          v-text="`Administradores`"
          class="uppercase  font-semibold sm:w-auto text-center xsm:text-left"
        />
      </div>
        <div
          class="flex w-1/5 flex-wrap xsm:flex-nowrap gap-4  justify-center items-center"
        >
          <Link
          :href="route('administradores.create')"  
            title="Crear un nuevo gasto"
            class="flex items-center rounded-xl text-black  font-semibold  hover:bg-gray-400/20 p-2 sm:p-2"
          >
            Nueva

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
              class="h-[27px]"
            />
          </Link>
        </div>

      </section>
      
    <br>
      <div class="bg-white grid v-screen 	 justify-items-center relative  shadow-md rounded-lg xl:h-[80] md:h-[80]  sm:h-[680px]   ">
          <div class=" bg-white/50  rounded-lg place-items-center justify-center py-14 items-start w-11/12   ">
          <DataTable :data="administradores.data" :columns="columns1" 
     class="border-1 border-gray-900 display bg-white/50"
     :options="{responsive:true,autoWidth:false,dom:'Bfrtip',select: true, buttons:buttons1, language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-CO.json', // Ajusta la ruta al archivo descargado
      }}">
     <thead class="">
            <tr class="bg-gray-800 text-white">
              <th scope="col" class="px-10 py-2" v-text="`Email`" />              
              <th class="px-10 py-4">Nombre</th>
              <th class="px-4 py-4">Compañia</th>
              <th class="px-10 py-4">Acciones</th>
            </tr>
          </thead>
    </DataTable>       
    </div>
    </div>
    <br>
    </div>
  </Layout>
</template>
<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from "vue"
import $ from "jquery";
import Layout from "@/Layouts/Layout.vue"
import Swal from 'sweetalert2';
import DataTable from 'datatables.net-vue3';
import "datatables.net-dt/css/jquery.dataTables.css";
import "datatables.net-buttons";
import ButtonsHtml5 from "datatables.net-buttons/js/buttons.html5";
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css'
import pdfmake from "pdfmake/build/pdfmake";
import * as pdfFonts from "pdfmake/build/vfs_fonts";
pdfmake.vfs = pdfFonts.pdfMake.vfs;

DataTable.use(ButtonsHtml5);


const props = defineProps({
  paginationObject: Object,
})
const administradores = ref(props.paginationObject)

const columns1 = ref([]);
const columns2 = ref([]);
const buttons1 = ref([]);

columns1.value = [{data:null,render:function(data,type,row,meta)
  {return (row.email)}},
{data:'name'},
{data:'company'},

  { data: null, orderable: false, render: function (data) { 
    
    return '<button class="rounded-xl text-red-600 font-semibold text-xl	  hover:text-gray-800/50 w-1/4" data-id="' + data.name + '" id="edit"> <i class="fa-solid fa-trash"></i></button>'; }, },
]

$(document).on("click","#edit", function(){

    Swal.fire({
    title: '¿Desea eliminar la categoria '+$(this).data('id')+'? ',
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
        '',
        'success'
      )
    }
  })
  
});

columns2.value = [{data:null,render:function(data,type,row,meta)
{return (meta.row + 1)}},
{data:'id'},
]

buttons1.value = [
  {
  title:'Gastos', extend:'excel',
  text:'<i class="fa-solid fa-file-excel"></i> Excel',
  className:'inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
  },
  {
  title:'Gastos', extend:'pdf',
  text:'<i class="fa-solid fa-file-pdf"></i> PDF',
  className:'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150'
  },
  {
  title:'Gastos', extend:'print',
  text:'<i class="fa-solid fa-file-print"></i> PRINT',
  className:'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'
  },
  {
  title:'Gastos', extend:'copy',
  text:'<i class="fa-solid fa-file-copy"></i> COPY',
  className:'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
  }

]




</script>

