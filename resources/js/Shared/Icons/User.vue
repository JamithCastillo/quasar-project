<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="icon icon-tabler icon-tabler-user-circle"
    :width="width"
    :height="height"
    viewBox="0 0 24 24"
    stroke-width="2"
    stroke="currentColor"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
  >
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <circle cx="12" cy="12" r="9"></circle>
    <circle cx="12" cy="10" r="3"></circle>
    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
  </svg>
</template>

<script setup>
const props = defineProps({
  width: Number,
  height: Number,
})

const width = props.width ? props.width : 24
const height = props.height ? props.height : 24
</script>