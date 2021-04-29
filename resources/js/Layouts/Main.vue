<template>
	<div class="p-6 xl:p-8 mx-auto" :class="maxWidthClass">
		<header v-if="title" class="mb-8 flex justify-between items-center">
			<div class="uppercase">
				<div class="text-gray-500 text-sm font-medium">{{ subtitle }}</div>
				<div class="text-gray-900 text-3xl font-extrabold">{{ title }}</div>
			</div>
			<div>
				<slot name="header-right" />
			</div>
		</header>
		<slot />
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