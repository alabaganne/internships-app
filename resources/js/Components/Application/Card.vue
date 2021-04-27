<template>
	<inertia-link :href="route('applications.show', application)" class="px-6 py-4 flex justify-between items-center group hover:bg-gray-50">
		<div v-if="$page.props.auth.user.userable_type.includes('Company')" class="flex-1 flex items-center">
			<img 
				class="h-14 w-14 rounded-full object-cover"
				src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
				alt=""
			>
			<div class="ml-4">
				<div class="text-blue-500">{{ application.student.name }}</div>
				<div class="mt-1 text-sm text-gray-500 flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
						<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
						<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
					</svg>
					{{ application.student.email }}
				</div>
			</div>
		</div>
		<div v-else class="flex-1">
			<div class="text-blue-500">{{ application.internship.title }}</div>
			<div class="mt-2 text-sm text-gray-500 flex items-center space-x-4">
				<div class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
					</svg>
					{{ application.company.name }}
				</div>
				<div class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
					</svg>
					{{ application.company.city }}
				</div>
			</div>
		</div>
		<div class="flex-1 text-sm">
			<div>Applied on {{ application.created_at }}</div>
			<div class="mt-2 text-gray-500 flex items-center capitalize">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor"
					:class="{
						'text-gray-400': application.status === 'pending',
						'text-green-400': application.status === 'accepted',
						'text-red-400': application.status === 'rejected',
					}"
				>
					<path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
				</svg>
				{{ application.status }}
			</div>
		</div>
		<div class="text-lg transform group-hover:translate-x-1 transition duration-150">
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