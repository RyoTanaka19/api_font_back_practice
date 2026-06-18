<template>
  <div class="container">
    <h1 class="title">投稿詳細</h1>

    <div v-if="pending" class="status">読み込み中...</div>

    <div v-else-if="error" class="status error">データの取得に失敗しました</div>

    <div v-else class="card">
      <h2 class="post-title">{{ post?.title }}</h2>
      <p class="post-body">{{ post?.body }}</p>
    </div>

    <NuxtLink to="/" class="back">← 一覧へ戻る</NuxtLink>
  </div>
</template>

<script setup lang="ts">
const route = useRoute();
const id = String(route.params.id);

const {
  data: post,
  pending,
  error,
} = await useFetch(`http://127.0.0.1:8000/api/posts/${id}`);
</script>

<style scoped>
.container {
  max-width: 700px;
  margin: 60px auto;
  padding: 20px;
  font-family: sans-serif;
}

/* タイトル */
.title {
  font-size: 26px;
  font-weight: bold;
  margin-bottom: 24px;
}

/* ローディング・エラー */
.status {
  text-align: center;
  padding: 40px 0;
  color: #6b7280;
}

.status.error {
  color: red;
}

/* 投稿カード */
.card {
  background: #ffffff;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  padding: 24px;
  margin-bottom: 24px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

.post-title {
  font-size: 22px;
  font-weight: bold;
  margin-bottom: 16px;
  color: #111827;
}

.post-body {
  font-size: 16px;
  line-height: 1.8;
  color: #374151;
  white-space: pre-wrap;
}

/* 戻るリンク */
.back {
  display: inline-block;
  color: #2563eb;
  text-decoration: none;
  font-weight: 500;
}

.back:hover {
  text-decoration: underline;
}
</style>
