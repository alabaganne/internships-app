<template>
	<div class="space-x-2 space-y-2">
		<div v-for="skill in ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS']" :key="skill" class="tag bg-blue-100 text-blue-600 inline-block">
			{{ skill }}
		</div>
	</div>
</template>