<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="icon icon-tabler icon-tabler-cloud-download"
    :width="size"
    :height="size"
    viewBox="0 0 24 24"
    stroke-width="2"
    stroke="currentColor"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
  >
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <path
      d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4"
    ></path>
    <path d="M12 13l0 9"></path>
    <path d="M9 19l3 3l3 -3"></path>
  </svg>
</template>

<script setup>
const props = defineProps({
  size: Number,
})

const size = props.size ? props.size : 24
</script>
