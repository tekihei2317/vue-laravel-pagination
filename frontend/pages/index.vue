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
    <custom-pagination
      :links="taskPaginator.meta.links"
      :on-click-link="onClickLink"
      class="task-pagination"
    />
  </div>
</template>

<style>
.task-pagination {
  margin-top: 16px;
}
</style>
