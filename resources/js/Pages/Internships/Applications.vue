<template>
	<breeze-authenticated-layout title="Applications" subtitle="Internship" maxWidthClass="max-w-7xl">
		<card>
			<div v-if="applications.data.length > 0" class="divide-y">
				<template v-for="application in applications.data" :key="application.id">
					<application-card :application="application" />
				</template>
			</div>
			<card v-else class="p-6">
				This internship does not have any application.
			</card>
		</card>
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
		applications: Object
	}
}
</script>