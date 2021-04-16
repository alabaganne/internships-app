<template>
  <div class="py-3 flex items-center justify-between">
    <div class="flex-1 flex justify-between sm:hidden">
      <a v-if="data.links.prev" :href="data.links.prev" class="mr-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
        Previous
      </a>
      <a v-if="data.links.next" :href="data.links.next" class="ml-auto relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
        Next
      </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium">{{ data.meta.from }}</span>
          to
          <span class="font-medium">{{ data.meta.to }}</span>
          of
          <span class="font-medium">{{ data.meta.total }}</span>
          results
        </p>
      </div>
      <div>
        <nav class="relative z-0 inline-flex rounded-md shadow-sm border border-gray-300 divide-x divide-gray-300 overflow-hidden -space-x-px" aria-label="Pagination">
          <template v-for="(link, i) in data.meta.links" :key="i">
            <span v-if="link.active || !link.url" class="relative inline-flex items-center px-4 py-2 bg-gray-100 text-sm font-medium text-gray-700" v-html="link.label" />
            <inertia-link v-else :href="link.url" class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50" v-html="link.label" />
          </template>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      type: Object,
      required: true
    }
  }
}
</script>