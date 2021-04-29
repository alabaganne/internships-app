<template>
	<main-layout title="Applications" subtitle="View" maxWidthClass="max-w-6xl">
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
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import ApplicationCard from "@/Components/Application/Card";
import Pagination from '@/Components/Pagination';
import Card from "@/Components/Card";

export default {
	components: {
		MainLayout,
		ApplicationCard,
		Pagination,
		Card,
	},
	props: {
		applications: Object,
	}
}
</script>