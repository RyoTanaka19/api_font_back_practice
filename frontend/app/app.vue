<script setup lang="ts">
const title = ref('');
const body = ref('');

const { data, refresh } = await useFetch('http://127.0.0.1:8000/api/posts');

const createPost = async () => {
  await $fetch('http://127.0.0.1:8000/api/posts', {
    method: 'POST',
    body: {
      title: title.value,
      body: body.value,
    },
  });

  title.value = '';
  body.value = '';

  await refresh();
};
</script>

<template>
  <div class="container">
    <h1>投稿一覧</h1>

    <input v-model="title" placeholder="タイトル" />

    <br /><br />

    <textarea v-model="body" placeholder="本文" />

    <br /><br />

    <button @click="createPost">投稿する</button>

    <hr />

    <div v-for="post in data?.data" :key="post.id" class="card">
      <h2>{{ post.title }}</h2>
      <p>{{ post.body }}</p>
    </div>
  </div>
</template>

<style scoped>
.container {
  width: 600px;
  margin: auto;
}

input {
  width: 100%;
  padding: 10px;
}

textarea {
  width: 100%;
  height: 120px;
  padding: 10px;
}

button {
  padding: 10px 20px;
}

.card {
  border: 1px solid #ddd;
  padding: 20px;
  margin-top: 20px;
}
</style>
