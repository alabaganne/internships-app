<template>
	<div class="space-y-2">
		<div v-for="skill in ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS']" :key="skill" class="tag tag-primary rounded-full mr-2">
			{{ skill }}
		</div>
	</div>
</template>
