<template>
	<breeze-authenticated-layout>
		<div class="bg-white rounded-lg shadow overflow-hidden max-w-7xl mx-auto mt-4">
			<img
				class="h-60 w-full object-cover"
				src="https://images.unsplash.com/photo-1588392382834-a891154bca4d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1355&q=80"
				alt="cover photo"
			>
			<div class="px-8 pb-12">
				<!-- header -->
				<div class="flex justify-between items-center">
					<div class="flex items-center transform">
						<div class="h-44 w-44 -mt-20 border-4 border-white rounded-full overflow-hidden">
							<img 
								src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" 
								alt="" 
								class="w-full"
							>
						</div>
						<div class="ml-6">
							<div class="text-2xl 2xl:text-3xl font-extrabold">{{ student.name }}</div>
							<div class="text-sm 2xl:text-base text-gray-500 font-medium">{{ student.field }} Student</div>
						</div>
					</div>
					<div class="flex items-center space-x-1">
						<inertia-link href="#" class="btn btn-secondary">
							Contact ->
						</inertia-link>
						<inertia-link :href="route('students.edit', student.id)" class="btn btn-dark">
							Edit ->
						</inertia-link>
						<delete-modal
							title="Delete Student"
							message="Are you sure you want to delete this student? All the data related to him will be permanently deleted. This action cannot be undone."
							:url="route('students.destroy', student.id)"
						>
							<button class="btn btn-danger">Delete</button>
						</delete-modal>
					</div>
				</div>
				<!-- about -->
				<div class="mt-16 grid grid-cols-7 gap-8">
					<div class="col-span-5">
						<div class="text-xl font-bold text-gray-800">About</div>
						<p class="mt-3 text-lg text-gray-600 leading-8" v-html="student.about" />
					</div>
					<div class="col-span-2">
						<div class="text-xl font-bold text-gray-800">Contact details</div>
						<div class="mt-3 space-y-3">
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
								</svg>
								{{ student.email }}
							</div>
							<div v-if="student.phone_number" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /> 
								</svg>
								{{ student.phone_number }}
							</div>
							<div v-if="student.city" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
								</svg>
								{{ student.city }}
							</div>
							<div v-if="student.linkedin_profile_url" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
								</svg>
								<a :href="student.linkedin_profile_url" target="_blank" class="link text-base text-blue-500">Linkedin profile -></a>
							</div>
						</div>
					</div>
					<div class="col-span-auto col-span-7">
						<div class="text-xl font-bold text-gray-800">Skills and expertise</div>
						<skills class="mt-2" />
					</div>
				</div>
			</div>
		</div>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Skills from "@/Components/Skills";
import DeleteModal from "@/Components/Modals/Delete"

export default {
	components: {
		BreezeAuthenticatedLayout,
		Skills,
		DeleteModal
	},
	props: {
		student: {
			type: Object,
			required: true
		}
	}
}
</script>