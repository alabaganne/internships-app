<template>
	<breeze-authenticated-layout title="Companies" subtitle="View">
		<template v-slot:header-right>
			<inertia-link :href="route('companies.create')" class="btn btn-lg btn-primary">Add Company -></inertia-link>
		</template>
		<app-table :fields="['Name', 'Email', 'Telephone', 'Registration Day', 'Actions']">
			<tr v-for="company in companies.data" :key="company.id">
				<td>{{ company.name }}</td>
				<td>{{ company.email }}</td>
				<td>{{ company.phone_number }}</td>
				<td>{{ company.created_at }}</td>
				<td class="text-right">
					<div class="flex items-center justify-end space-x-1">
						<inertia-link :href="route('companies.show', company)" class="btn btn-sm btn-primary">View -></inertia-link>
						<inertia-link :href="route('companies.edit', company)" class="btn btn-sm btn-dark">Edit -></inertia-link>
					</div>
				</td>
			</tr>
		</app-table>
		<pagination class="mt-4" :data="companies" />
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Pagination from "@/Components/Pagination";
import AppTable from "@/Components/Table";

export default {
	components: {
		BreezeAuthenticatedLayout,
		Pagination,
		AppTable,
	},
	props: {
		companies: Object
	}
}
</script>