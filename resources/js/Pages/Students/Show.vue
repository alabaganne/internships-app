<template>
	<breeze-authenticated-layout title="Student" subtitle="Profile">
		<template v-slot:header-right>
			<inertia-link :href="route('students.edit', student.id)" class="btn btn-dark">
				Edit ->
			</inertia-link>
			<DeleteModal
				title="Delete Student"
				paragraph="Are you sure you want to delete this student? All the data related to him will be permanently deleted. This action cannot be undone."
				:url="route('students.destroy', student.id)"
			>
				<button class="btn btn-danger">Delete</button>
			</DeleteModal>
		</template>
		<card>
			<img
				class="h-56 w-full object-cover"
				src="https://images.unsplash.com/photo-1445112098124-3e76dd67983c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1347&q=80"
				alt="cover photo"
			>
			<div class="max-w-7xl mx-auto px-8 pb-12">
				<!-- header -->
				<div class="flex justify-between items-center">
					<div class="flex items-center transform">
						<img 
							src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" 
							alt="" 
							class="h-44 w-44 rounded-full object-cover -mt-20 border-white"
						>
						<div class="ml-6">
							<div class="text-2xl 2xl:text-3xl font-extrabold">{{ student.name }}</div>
							<div class="text-sm 2xl:text-base text-gray-500 font-medium">{{ student.field }} Student</div>
						</div>
					</div>
					<div class="flex items-center space-x-1">
						<inertia-link href="#" class="btn btn-secondary">
							Contact ->
						</inertia-link>
					</div>
				</div>
				<!-- about -->
				<div class="mt-16">
					<div>
						<div class="text-xl font-bold uppercase text-gray-800">About</div>
						<div class="mt-2 2xl:flex 2xl:space-x-8">
							<div class="prose-lg max-w-none">
								<p class="text-gray-600">{{ student.about }}</p>
							</div>
							<div class="w-64 flex-shrink-0 space-y-3 mt-8 2xl:mt-0">
								<div class="flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
									</svg>
									{{ student.email }}
								</div>
								<div class="flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /> 
									</svg>
									{{ student.phone_number }}
								</div>
								<div class="flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
									</svg>
									<a :href="student.linkedin_profile_url" target="_blank" class="link text-base text-blue-500">Linkedin profile -></a>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-8">
						<div class="text-xl font-bold uppercase text-gray-800">Skills</div>
						<display-skills class="mt-2" />
					</div>
				</div>
			</div>
		</card>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "@/Components/Card";
import DisplaySkills from "@/Components/DisplaySkills";
import DeleteModal from "@/Components/DeleteModal"

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
		DisplaySkills,
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