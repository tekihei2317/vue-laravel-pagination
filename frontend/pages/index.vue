<script setup>
const page = ref(1)
const { data: taskPaginator, refresh } = await useFetch(() => `/api/tasks?page=${page.value}`, {
  baseURL: 'http://localhost:8000',
})

const onClickLink = (url) => {
  page.value = new URL(url).searchParams.get('page')
  refresh()
}
</script>

<template>
  <div>
    <h2>タスク一覧</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>タスク名</th>
          <th>説明名</th>
          <th>ステータス</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in taskPaginator.data">
          <td>{{ task.id }}</td>
          <td>{{ task.name }}</td>
          <td>{{ task.description }}</td>
          <td>{{ task.status }}</td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <template v-for="link in taskPaginator.meta.links">
        <button
          :disabled="link.url === null"
          class="pagination-link"
          :class="{
            'pagination-link-enabled': link.url !== null,
            'pagination-link-active': link.active,
          }"
          @click="onClickLink(link.url)"
        >
          {{ link.label }}
        </button>
      </template>
    </div>
  </div>
</template>

<style scoped>
.pagination {
  margin-top: 16px;
  display: flex;
  flex-wrap: wrap;
}

.pagination-link {
  margin-right: 4px;
  padding: 12px 16px;
  border: 1px solid gray;
  border-radius: 4px;
  background-color: white;
}

.pagination-link-active {
  border: 1px solid blue;
  color: blue;
}

.pagination-link-enabled:hover {
  cursor: pointer;
  background-color: lightgray;
}
</style>
