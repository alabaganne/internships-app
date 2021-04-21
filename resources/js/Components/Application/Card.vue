<template>
	<inertia-link :href="route('applications.show', application)" class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors duration-150 group">
		<div class="flex-1">
			<div class="text-lg font-medium">
				{{ application.internship.title }}
			</div>
			<div class="mt-1.5 flex items-center space-x-4 text-sm text-gray-600 font-medium">
				<!-- <div class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
					</svg>
					{{ application.internship.company }}
				</div> -->
				<div class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
					</svg>
					{{ application.internship.remote ? 'Remote' : application.internship.city }}
				</div>
				<!-- <div class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
					</svg>
					{{ application.internship.field }}
				</div> -->
			</div>
		</div>
		<div class="flex-1 text-sm font-medium">
			<div class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
				</svg>
				<span class="ml-1 text-gray-600">Applied on {{ application.created_at }}</span>
			</div>
			<div class="mt-2">
				<span
					v-text="application.status"
					class="tag capitalize"
					:class="{
						'': application.status === 'pending',
						'tag-success': application.status === 'accepted',
						'tag-danger': application.status === 'rejected'
					}"
				/>
			</div>
		</div>
		<div class="font-medium text-lg text-gray-700 transform group-hover:translate-x-1 transition duration-150 w-6 flex-shrink-0">
			->
		</div>
	</inertia-link>
</template>

<script>
export default {
	props: {
		application: {
			type: Object,
			required: true,
		}
	}
}
</script>