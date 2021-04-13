<template>
	<breeze-authenticated-layout title="Companies" subtitle="View">
		<template v-slot:header-right>
			<inertia-link :href="route('companies.create')" class="btn btn-lg btn-primary">Add Company -></inertia-link>
		</template>
		<app-table :fields="['Name', 'Telephone', 'Website', 'Registered at', 'Actions']">
			<tr v-for="company in companies.data" :key="company.id">
				<td>
					<div class="flex items-center">
						<svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
						</svg>
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{ company.name }}
							</div>
							<div class="text-sm text-gray-500">
								{{ company.email }}
							</div>
						</div>
					</div>
				</td>
				<td>{{ company.phone_number }}</td>
				<td>
					<a :href="company.website" target="_blank" class="link">Visit website -></a>
				</td>
				<td>{{ company.created_at }}</td>
				<td class="text-right">
					<inertia-link href="#" class="link">View -></inertia-link>
				</td>
			</tr>
		</app-table>
		<pagination class="mt-3" :data="companies" />
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import AppTable from "@/Components/Table";
import Pagination from "@/Components/Pagination";
export default {
	components: {
		BreezeAuthenticatedLayout,
		AppTable,
		Pagination
	},
	props: {
		companies: Object
	}
}
</script>