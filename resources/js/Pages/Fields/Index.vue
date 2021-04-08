<template>
	<breeze-authenticated-layout title="Fields" subtitle="View">
		<template v-slot:header-right>
			<CreateModal />
		</template>
		<AppTable :fields="['Name', 'Description', 'Actions']">
			<tr v-for="item in 10" :key="item">
				<td>
					<div class="flex items-center">
						<svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
						</svg>
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								Computer Science
							</div>
						</div>
					</div>
				</td>
				<td class="text-gray-700">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
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
import CreateModal from "./Create";
export default {
	components: {
		BreezeAuthenticatedLayout,
		AppTable: Table,
		CreateModal
	}
}
</script>