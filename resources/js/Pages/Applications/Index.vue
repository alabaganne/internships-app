<template>
	<breeze-authenticated-layout title="Applications" subtitle="View" maxWidthClass="max-w-6xl">
		<card v-if="applications.data.length > 0" class="divide-y">
			<template v-for="application in applications.data" :key="application.id">
				<application-card :application="application" />
			</template>
			<template v-slot:footer>
				<pagination :data="applications" />
			</template>
		</card>
		<card v-else class="p-6">
			No records found.
		</card>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import ApplicationCard from "@/Components/Application/Card";
import Pagination from '@/Components/Pagination';
import Card from "@/Components/Card";

export default {
	components: {
		BreezeAuthenticatedLayout,
		ApplicationCard,
		Pagination,
		Card,
	},
	props: {
		applications: Object,
	}
}
</script>