<template>
	<main-layout title="Company" subtitle="View">
		<template v-slot:header-right>
			<inertia-link href="#" class="btn btn-lg btn-primary">Add Internship -></inertia-link>
			<inertia-link href="#" class="ml-2 btn btn-lg btn-primary">Add Supervisor -></inertia-link>
		</template>
		<div class="2xl:grid 2xl:grid-cols-3 gap-6">
			<div class="col-span-1">
				<card class="p-6">
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
								<a :href="company.website" target="_blank" class="link">Visit website</a>
							</div>
						</div>
					</div>
					<p class="mt-6 text-gray-700 text-lg leading-8">{{ company.about }}</p>
					<div class="mt-8 flex justify-between">
						<button @click="selectedUser = company" class="btn btn-secondary">
							Send Message
						</button>
						<div class="flex">
							<inertia-link :href="route('companies.edit', company)" class="btn btn-dark">
								Edit
							</inertia-link>
							<delete-modal
								title="Delete Company"
								message="Are you sure you want to delete this company? All the data related to it will be permanently deleted. This action cannot be undone."
								:url="route('companies.destroy', company)"
							>
								<button class="ml-1.5 btn btn-danger">Delete</button>
							</delete-modal>
						</div>
					</div>
				</card>
			</div>
			<div class="col-span-2 relative">
				<transition name="slide-fade" mode="out-in">
					<div v-if="showInternships">
						<button @click="showInternships = !showInternships" class="p-1 font-semibold uppercase text-sm flex items-center mb-4 transform hover:translate-x-1.5 transition-transform duration-300 ease-out">
							<icon name="user-group" class="h-5 w-5 text-blue-500 mr-1" /> Show Company Supervisors ->
						</button>
							<div v-if="company.internships.data.length > 0">
								<div class="space-y-6">
									<div v-for="internship in company.internships.data" :key="internship.id">
										<internship-card :internship="internship" :full="false" />
									</div>
								</div>
								<pagination :links="company.internships.meta.links" :meta="company.internships.meta" class="mt-4" />
							</div>
							<card v-else class="p-6">No internships found.</card>
					</div>
					<div v-else class="absolute w-full">
						<button @click="showInternships = !showInternships" class="p-1 font-semibold uppercase text-sm flex items-center mb-4 transform hover:translate-x-1.5 transition-transform duration-300 ease-out">
							<icon name="briefcase" class="h-5 w-5 text-blue-500 mr-1" /> Show Internships ->
						</button>
						<app-table v-if="company.supervisors.length > 0" :fields="['Name', 'Phone number', 'Actions']">
							<tr v-for="supervisor in company.supervisors" :key="supervisor.id" class="text-sm font-medium text-gray-600">
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="flex-shrink-0 h-10 w-10">
											<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
										</div>
										<div class="ml-4">
											<div class="text-gray-900">
												{{ supervisor.name }}
											</div>
											<div class="font-normal text-gray-500">
												{{ supervisor.email }}
											</div>
										</div>
									</div>
								</td>
								<td>{{ supervisor.phone_number }}</td>
								<td class="text-right space-x-1">
									<button @click="selectedUser = supervisor" class="btn btn-sm btn-secondary">Send Message</button>
									<inertia-link :href="route('companies.company_supervisors.edit', { company: company.id, company_supervisor: supervisor.id })" class="btn btn-sm btn-dark">Edit</inertia-link>
								</td>
							</tr>
						</app-table>
						<card v-else>
							<div class="p-6">No records found.</div>
						</card>
					</div>
				</transition>
			</div>
		</div>
		<contact-modal :user="selectedUser" @close="selectedUser = null" />
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import InternshipCard from "@/Components/Internship/Card";
import DeleteModal from "@/Components/Modal/Delete";
import ContactModal from "@/Components/Modal/Contact";
import Pagination from "@/Components/Pagination";

export default {
	components: {
		MainLayout,
		InternshipCard,
		DeleteModal,
		ContactModal,
		Pagination
	},
	props: {
		company: Object,
	},
	data() {
		return {
			selectedUser: null,
			showInternships: true,
		}
	}
}
</script>
