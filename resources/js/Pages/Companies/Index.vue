<template>
	<breeze-authenticated-layout title="Companies" subtitle="View">
		<template v-slot:header-right>
			<button class="btn btn-lg btn-primary">Add Company</button>
		</template>
		<AppTable :fields="['Name', 'Telephone', 'Website', 'Registered at', 'Actions']">
			<tr v-for="item in 10" :key="item">
				<td>
					<div class="flex items-center">
						<svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
						</svg>
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								Realinflo
							</div>
							<div class="text-sm text-gray-500">
								contact@realinflo.com
							</div>
						</div>
					</div>
				</td>
				<td>50 101 959</td>
				<td>
					<a href="#" target="_blank" class="link">Visit website -></a>
				</td>
				<td>January 11, 2020</td>
				<td class="text-right">
					<inertia-link href="#" class="link">View -></inertia-link>
				</td>
			</tr>
		</AppTable>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Table from "@/Components/Table";
export default {
	components: {
		BreezeAuthenticatedLayout,
		AppTable: Table
	}
}
</script>