<script setup lang="ts">
const router = useRouter();

const title = ref('');
const body = ref('');

const createPost = async () => {
  if (!title.value || !body.value) {
    alert('タイトルと本文を入力してください');
    return;
  }

  await $fetch('http://127.0.0.1:8000/api/posts', {
    method: 'POST',
    body: {
      title: title.value,
      body: body.value,
    },
  });

  router.push('/');
};
</script>

<template>
  <div class="container">
    <div class="card">
      <h1 class="title">投稿作成</h1>

      <label class="label">タイトル</label>
      <input v-model="title" class="input" placeholder="タイトルを入力" />

      <label class="label">本文</label>
      <textarea v-model="body" class="textarea" placeholder="本文を入力" />

      <button class="button" @click="createPost">投稿する</button>

      <NuxtLink to="/" class="back"> ← 一覧へ戻る </NuxtLink>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 600px;
  margin: 60px auto;
  padding: 0 16px;
  font-family: sans-serif;
}

/* カード */
.card {
  border: 1px solid #e5e7eb;
  border-radius: 12px;
  padding: 24px;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
}

/* タイトル */
.title {
  font-size: 22px;
  margin-bottom: 20px;
}

/* ラベル */
.label {
  display: block;
  margin-top: 14px;
  margin-bottom: 6px;
  font-size: 14px;
  color: #374151;
}

/* input */
.input {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  outline: none;
  transition: 0.2s;
}

.input:focus {
  border-color: #2563eb;
  box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
}

/* textarea */
.textarea {
  width: 100%;
  height: 140px;
  padding: 10px 12px;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  resize: vertical;
  outline: none;
  transition: 0.2s;
}

.textarea:focus {
  border-color: #2563eb;
  box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
}

/* ボタン */
.button {
  margin-top: 20px;
  width: 100%;
  padding: 12px;
  background: #2563eb;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 15px;
  cursor: pointer;
  transition: 0.2s;
}

.button:hover {
  background: #1d4ed8;
}

/* 戻るリンク */
.back {
  display: block;
  margin-top: 14px;
  text-align: center;
  color: #6b7280;
  text-decoration: none;
  font-size: 14px;
}

.back:hover {
  text-decoration: underline;
}
</style>
