<template>
	<breeze-authenticated-layout title="Company Supervisors" subtitle="Manage">
		<div>Content</div>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import AppTable from "@/Components/Table";

export default {
	components: {
		BreezeAuthenticatedLayout,
		AppTable
	}
}
</script>