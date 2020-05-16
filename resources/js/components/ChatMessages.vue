<template>
  <ul class="border-t border-r border-l border-gray-300 bg-white shadow-sm">
    <li v-for="message in messages" :key="message.id" class="flex text-sm text-gray-900 leading-5 px-2 py-1">
      <div class="font-medium">
          {{ message.user.name }}:
      </div>
      <div class="ml-1">
        {{ message.message }}
      </div>
    </li>
  </ul>
</template>

<script>
  export default {
    props: ['messages'],
  }
</script>

<style scoped>

</style>
