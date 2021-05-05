<template>
	<main-layout title="Company" subtitle="View">
		<div class="2xl:grid 2xl:grid-cols-3 gap-4">
			<div class="">
				<card class="p-6 w-full">
					<div>
						<h1 class="text-3xl font-extrabold">{{ company.name }}</h1>
						<div class="mt-6 space-y-4">
							<div class="flex items-center">
								<icon name="location-marker" class="h-5 w-5 text-blue-400 mr-1.5" />
								{{ company.city.name }}
							</div>
							<div class="flex items-center">
								<icon name="phone" class="h-5 w-5 text-blue-400 mr-1.5" />
								{{ company.phone_number }}
							</div>
							<div class="flex items-center">
								<icon name="mail" class="h-5 w-5 text-blue-400 mr-1.5" />
								{{ company.email }}
							</div>
							<div class="flex items-center">
								<icon name="cursor-click" class="h-5 w-5 text-blue-400 mr-1.5" />
								<a :href="company.website" target="_blank" class="link">Visit website -></a>
							</div>
						</div>
					</div>
					<p class="mt-6 text-gray-700 text-lg leading-8">{{ company.about }}</p>
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
				<div v-if="company.internships.data.length > 0" class="space-y-4">
					<div v-for="internship in company.internships.data" :key="internship.id">
						<internship-card :internship="internship" :full="false" />
					</div>
					<pagination :links="company.internships.meta.links" :meta="company.internships" />
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

export default {
	components: {
		MainLayout,
		InternshipCard,
		DeleteModal,
		Pagination,
	},
	props: {
		company: Object,
	}
}
</script>
