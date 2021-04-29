<template>
	<main-layout title="Company" subtitle="View">
		<div class="2xl:grid 2xl:grid-cols-3 gap-4">
			<div class="">
				<card class="p-6 w-full">
					<div class="text-sm">
						<h1 class="text-3xl font-extrabold">{{ company.name }}</h1>
						<div class="mt-6 space-y-4 text-gray-500 font-medium">
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
								</svg>
								{{ company.city }}
							</div>
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
								</svg>
								{{ company.phone_number }}
							</div>
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
								</svg>
								{{ company.email }}
							</div>
							<div class="flex items-center">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
								</svg>
								<a :href="company.website" target="_blank" class="link">Website -></a>
							</div>
						</div>
					</div>
					<p class="mt-6 text-gray-600 leading-7">{{ company.about }}</p>
					<div class="mt-8 space-x-1">
						<inertia-link :href="route('companies.edit', company)" class="btn btn-dark">
							Edit ->
						</inertia-link>
						<delete-modal
							title="Delete Company"
							message="Are you sure you want to delete this company? All the data related to it will be permanently deleted. This action cannot be undone."
							:url="route('companies.destroy', company)"
						>
							<button class="btn btn-danger">Delete</button>
						</delete-modal>
					</div>
				</card>
			</div>
			<div class="mt-4 2xl:mt-0 col-span-2">
				<div v-if="internships.data.length > 0" class="space-y-4">
					<div v-for="internship in internships.data" :key="internship.id">
						<internship-card :internship="internship" :full="false" />
					</div>
					<pagination :data="internships" />
				</div>
				<card v-else class="p-6 text-gray-600">This company has no internships.</card>
			</div>
		</div>
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import InternshipCard from "@/Components/Internship/Card";
import DeleteModal from "@/Components/Modals/Delete";
import Pagination from "@/Components/Pagination";
import Card from "@/Components/Card"

export default {
	components: {
		MainLayout,
		InternshipCard,
		DeleteModal,
		Pagination,
		Card
	},
	props: {
		company: Object,
		internships: Object,
	}
}
</script>