<template>
	<div class="bg-white rounded-lg shadow overflow-hidden">
		<div v-if="title" class="p-6 border-b">
				<div class="text-xl font-medium">{{ title }}</div>
				<p v-if="subtitle" class="mt-0.5 text-sm text-gray-500">{{ subtitle }}</p>
		</div>
		<slot />
		<div v-if="$slots['footer']" class="border-t px-6 py-4">
			<slot name="footer" />
		</div>
	</div>
</template>

<script>
export default {
	props: {
		title: String,
		subtitle: String,
	}
}
</script>