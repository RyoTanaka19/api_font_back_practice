<script setup lang="ts">
const { data, refresh } = await useFetch('http://127.0.0.1:8000/api/posts');

const deletePost = async (id: number) => {
  if (!confirm('この投稿を削除しますか？')) return;

  await $fetch(`http://127.0.0.1:8000/api/posts/${id}`, {
    method: 'DELETE',
  });

  await refresh();
};
</script>

<template>
  <div class="container">
    <header class="header">
      <h1>投稿一覧</h1>
      <NuxtLink to="/posts/create" class="create-button">
        ＋ 投稿する
      </NuxtLink>
    </header>

    <div v-if="data?.data?.length === 0" class="empty">投稿がありません</div>

    <div v-for="post in data?.data" :key="post.id" class="card">
      <NuxtLink :to="`/posts/${post.id}`" class="title">
        {{ post.title }}
      </NuxtLink>

      <p class="body">
        {{ post.body }}
      </p>

      <div class="actions">
        <button class="delete-button" @click="deletePost(post.id)">削除</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 700px;
  margin: 40px auto;
  padding: 0 16px;
  font-family: sans-serif;
}

/* ヘッダー */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.header h1 {
  font-size: 24px;
}

/* 新規投稿ボタン */
.create-button {
  background: #2563eb;
  color: white;
  padding: 8px 14px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
}

.create-button:hover {
  background: #1d4ed8;
}

/* カード */
.card {
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  padding: 16px;
  margin-bottom: 12px;
  background: #fff;
  transition: 0.2s;
}

.card:hover {
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

/* タイトル */
.title {
  font-size: 18px;
  font-weight: bold;
  color: #2563eb;
  text-decoration: none;
}

.title:hover {
  text-decoration: underline;
}

/* 本文 */
.body {
  margin-top: 8px;
  color: #4b5563;
  line-height: 1.5;
}

/* ボタンエリア */
.actions {
  margin-top: 12px;
  display: flex;
  justify-content: flex-end;
}

/* 削除ボタン */
.delete-button {
  background: #ef4444;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 13px;
}

.delete-button:hover {
  background: #dc2626;
}

/* 空状態 */
.empty {
  text-align: center;
  color: #9ca3af;
  padding: 40px 0;
}
</style>
