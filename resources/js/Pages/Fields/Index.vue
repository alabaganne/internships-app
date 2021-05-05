<template>
	<main-layout title="Fields" subtitle="View">
		<template v-slot:header-right>
			<inertia-link :href="route('fields.create')" class="btn btn-lg btn-primary">Add Field of Studies -></inertia-link>
		</template>
		<div v-if="fields.data.length > 0">
			<app-table :fields="['Name', 'Number of Internships', 'Number of Students', 'Actions']">
				<tr v-for="field in fields.data" :key="field.id">
					<td>
						<div class="flex items-center">
							<icon name="light-bulb" class="text-gray-400" />
							<div class="ml-4">
								<div class="font-medium">
									{{ field.name }}
								</div>
							</div>
						</div>
					</td>
					<td>{{ field.internships_count }}</td>
					<td>{{ field.students_count }}</td>
					<td class="text-right">
						<inertia-link :href="route('fields.edit', field.id)" class="btn btn-sm btn-dark">Edit -></inertia-link>
					</td>
				</tr>
			</app-table>
			<pagination class="mt-4" :links="fields.links" :meta="fields" />
		</div>
		<card class="p-6" v-else>
			No fields found.
		</card>
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import Pagination from "@/Components/Pagination";

export default {
	components: {
		MainLayout,
		Pagination,
	},
	props: {
		fields: Object
	}
}
</script>
