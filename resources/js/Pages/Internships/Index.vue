<template>
	<main-layout title="Internships" subtitle="View">
		<template v-slot:header-right>
			<inertia-link
				v-if="currentUser.userable_type === 'company'"
				:href="route('internships.create')"
				class="btn btn-lg btn-primary"
			>
				Add Internship ->
			</inertia-link>
		</template>
		<div class="flex flex-col 2xl:flex-row gap-x-6">
			<filters
				v-bind="{
					fields,
					cities,
					companies,
					filters,
				}"
			/>
			<div class="flex-1">
				<div class="flex flex-col gap-y-6">
					<template v-for="internship in internships.data" :key="internship.id">
						<internship-card :internship="internship" />
					</template>
					<pagination v-if="internships.data.length > 0" :meta="internships.meta" :links="internships.meta.links" :routeParams="filters" />
					<card v-else class="p-6">No internships found.</card>
				</div>
			</div>
		</div>
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import InternshipCard from "@/Components/Internship/Card";
import Pagination from "@/Components/Pagination";
import Filters from "./Filters";

export default {
	components: {
		MainLayout,
		InternshipCard,
		Pagination,
		Filters
	},
	props: {
		internships: Object,
		fields: Array,
		cities: Array,
		companies: Array,
		filters: Object,
	},
}
</script>
