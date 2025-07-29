<template>
  <button
    :class="[
      'px-4 py-2 rounded font-semibold transition',
      variant === 'primary' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-black',
    ]"
    v-bind="$attrs"
  >
    <slot />
  </button>
</template>

<script setup>
defineProps({
  variant: {
    type: String,
    default: 'primary',
  })
</script>
