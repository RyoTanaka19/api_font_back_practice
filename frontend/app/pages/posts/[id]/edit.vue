<template>
  <div>
    <h1>編集画面</h1>
    <p>ID: {{ route.params.id }}</p>
  </div>
</template>

<script setup lang="ts">
const route = useRoute();
</script>
