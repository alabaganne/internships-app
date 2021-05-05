<template>
	<div class="p-6 xl:pt-8 mx-auto flex flex-1 flex-col w-full" :class="maxWidthClass">
			<header v-if="title" class="mb-7 flex justify-between items-center">
			<div class="uppercase">
				<div class="text-gray-500 text-sm font-medium">{{ subtitle }}</div>
				<div class="text-gray-900 text-3xl font-extrabold">{{ title }}</div>
			</div>
			<div>
				<slot name="header-right" />
			</div>
		</header>
		<main class="flex-1">
			<slot :key="url()" />
		</main>
		<footer class="mt-8 text-gray-500 text-sm text-center">
			-> Designed and developped by <a href="https://www.linkedin.com/in/alabaganne/" target="_blank" class="link hover:underline">Ala Baganne</a>
		</footer>
	</div>
</template>

<script>
export default {
	props: {
		title: String,
		subtitle: {
			type: String,
			default: "Page"
		},
		maxWidthClass: {
			type: String,
		}
	}
}
</script>
