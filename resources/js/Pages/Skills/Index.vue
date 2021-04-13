<template>
	<breeze-authenticated-layout title="Skills" subtitle="Manage">
		<div>Skills content here</div>
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