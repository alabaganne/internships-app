<template>
	<breeze-authenticated-layout title="Applications" subtitle="Internship" maxWidthClass="max-w-6xl">
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
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import ApplicationCard from "@/Components/Application/Card";
import Card from "@/Components/Card";

export default {
	components: {
		BreezeAuthenticatedLayout,
		ApplicationCard,
		Card
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