<template>
	<main-layout title="Applications" subtitle="Internship" maxWidthClass="max-w-6xl">
		<div>
			<card :title="internship.title" subtitle="Internship applications">
				<div v-if="applications.data.length > 0" class="divide-y">
					<template v-for="application in applications.data" :key="application.id">
						<application-card :application="application" />
					</template>
				</div>
				<div v-else class="p-6">No records found.</div>
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
		applications: {
			type: Object,
			required: true
		},
		internship: {
			type: Object,
			required: true
		}
	}
}
</script>
