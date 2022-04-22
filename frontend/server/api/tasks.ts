type Task = {
  id: string
  name: string
  description: string
  status: string
}

type PaginationLink = {
  url: string | null
  label: string
  active: boolean
}

type TaskPaginator = {
  data: Task[]
  meta: {
    links: PaginationLink
  }
}

export default defineEventHandler(() => {})
