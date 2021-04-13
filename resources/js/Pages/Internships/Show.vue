<template>
	<breeze-authenticated-layout title="Internship" subtitle="Details">
		<template v-slot:header-right>
			<button class="btn btn-secondary">
				Applications ->
			</button>
			<inertia-link :href="route('internships.edit', internship.id)" class="btn btn-dark">
				Edit ->
			</inertia-link>
			<DeleteModal
				title="Delete Internship"
				paragraph="Are you sure you want to delete this internship? This action cannot be undone."
				:url="route('internships.destroy', internship.id)"
			>
				<button class="btn btn-danger">Delete</button>
			</DeleteModal>
		</template>
		<card>
			<div class="flex divide-x">
				<div class="flex-1">
					<div class="p-6">
						<internship-header :internship="internship" />
					</div>
					<div class="p-6 border-t prose-lg">
						<p>{{ internship.description }}</p>
					</div>
					<div class="p-6 border-t">
						<div class="font-semibold">Attachments</div>
						<div class="mt-3 space-y-2">
							<div v-for="attachment in ['image.jpg', 'more_details.pdf', 'executable_program.exe', 'logo.png']" :key="attachment" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
								</svg>
								<span class="link">{{ attachment }}</span>
							</div>
						</div>
					</div>
					<div class="p-6 border-t">
						<div class="font-semibold">Required Skills</div>
						<skills class="mt-3" />
					</div>
				</div>
				<div class="w-80 2xl:w-96 flex-shrink-0">
					<div class="p-6">
						<button class="btn btn-lg btn-primary w-full justify-center">Submit application</button>
						<button class="mt-2 btn btn-lg btn-secondary w-full justify-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
							</svg>
							Add to favorites
						</button>
					</div>
					<div class="p-6 border-t">
						<div class="font-semibold">Supervisor</div>
						<div class="mt-4 space-y-3">
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
								{{ internship.company_supervisor.name }}
							</div>
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
								</svg>
								{{ internship.company_supervisor.email }}
							</div>
							<div v-if="internship.company_supervisor.phone_number" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /> 
								</svg>
								{{ internship.company_supervisor.phone_number }}
							</div>
							<div v-if="internship.company_supervisor.linkedin_profile_url" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
								</svg>
								<a :href="internship.company_supervisor.linkedin_profile_url" target="_blank" class="link text-base">Linkedin profile -></a>
							</div>
						</div>
					</div>
					<div class="p-6 border-t border-b">
						<div class="font-semibold">Company</div>
						<div class="mt-4 space-y-3">
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
								{{ internship.company.name }}
							</div>
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
								</svg>
								{{ internship.company.email }}
							</div>
							<div v-if="internship.company.phone_number" class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /> 
								</svg>
								{{ internship.company.phone_number }}
							</div>
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
								</svg>
								<a :href="internship.company.website" target="_blank" class="link text-base">Visit website -></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</card>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "@/Components/Card";
import DeleteModal from "@/Components/DeleteModal";
import InternshipHeader from "./Shared/Header"
import skills from "@/Components/ShowSkills"

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
		DeleteModal,
		InternshipHeader,
		skills,
	},
	props: {
		internship: Object
	},
}
</script>