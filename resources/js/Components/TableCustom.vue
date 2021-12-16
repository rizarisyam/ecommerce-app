<template>
  <!-- component -->

  <table class="min-w-max w-full table-auto">
    <thead>
      <slot name="thead" />
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
      <slot name="tbody" />
    </tbody>
  </table>
</template>

<script>
export default {};
</script>
