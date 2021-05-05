<template>
	<main-layout subtitle="Overview" title="Dashboard">
		<div class="grid c-grid-col-sm gap-4">
			<template v-for="card in cards" :key="card.label">
				<card v-if="card.show">
					<div class="py-6 flex items-center">
						<div class="px-8">
							<icon :name="card.icon" class="h-7 w-7 text-blue-500" />
						</div>
						<div>
							<div class="text-gray-500 text-sm uppercase">{{ card.label }}</div>
							<div class="mt-0.5 text-3xl font-extrabold">{{ card.value }}</div>
						</div>
					</div>
					<template v-slot:footer class="px-6 py-4 bg-gray-50">
						<inertia-link :href="card.link" class="link text-sm">View all -></inertia-link>
					</template>
				</card>
			</template>
		</div>
		<div v-if="!$page.props.auth.user.userable_type.includes('supervisor')" class="mt-5 max-w-5xl">
			<card v-if="applications" title="Recent Applications" subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry.">
				<div v-if="applications.length > 0" class="divide-y">
					<application-card v-for="application in applications" :key="application.id" :application="application" />
				</div>
				<template v-if="applications.length  >= 4" v-slot:footer>
					<div class="flex justify-end">
						<inertia-link :href="route('applications.index')" class="btn btn-primary rounded-lg">View all -></inertia-link>
					</div>
				</template>
				<div v-if="applications.length === 0" class="p-6">No records found.</div>
			</card>
		</div>
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import ApplicationCard from "@/Components/Application/Card";

export default {
	components: {
		MainLayout,
		ApplicationCard,
	},
	props: {
		internships_count: Number,
		university_supervisors_count: Number,
		companies_count: Number,
		applications_count: Number,
		applications: Array,
	},
	data() {
		return {
			cards: [
				{
					label: 'Open Internships',
					value: this.internships_count,
					icon: 'briefcase',
					link: route('internships.index'),
					show: true,
				},
				{
					label: 'University Supervisors',
					value: this.university_supervisors_count,
					icon: 'identification',
					link: route('university_supervisors.index'),
					show: true,
				},
				{
					label: 'Companies',
					value: this.companies_count,
					icon: 'office-building',
					link: route('companies.index'),
					show: true,
				},
				{
					label: 'Pending Applications',
					value: this.applications_count,
					icon: 'folder',
					link: route('applications.index'),
					show: this.$page.props.auth.user.userable_type === 'student' || this.$page.props.auth.user.userable_type === 'company'
				},
			],
		};
	},
};
</script>
