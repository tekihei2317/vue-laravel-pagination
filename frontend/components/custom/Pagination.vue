<script lang="ts" setup>
type PaginationLink = {
  url: string | null
  label: string
  active: boolean
}

type Props = {
  links: PaginationLink[]
  onClickLink: (url: string) => void
}

const { links, onClickLink } = defineProps<Props>()
</script>

<template>
  <div class="pagination">
    <template v-for="link in links">
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
</template>

<style scoped>
.pagination {
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
