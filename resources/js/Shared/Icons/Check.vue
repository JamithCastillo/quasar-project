<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="icon icon-tabler icon-tabler-check"
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
    <path d="M5 12l5 5l10 -10"></path>
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