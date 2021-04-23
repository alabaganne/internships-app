<template>
	<div class="space-y-2">
		<div v-for="skill in ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS']" :key="skill" class="mr-2 tag bg-blue-100 text-blue-600 rounded-full">
			{{ skill }}
		</div>
	</div>
</template>