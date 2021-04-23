<template>
	<breeze-authenticated-layout title="Likes" subtitle="Internships" maxWidthClass="max-w-6xl">
		<div v-if="localInternships.length > 0" class="space-y-4">
			<template v-for="internship in localInternships" :key="internship.id">
				<internship-card :internship="internship" @dislike="onDislike(internship.id)" />
			</template>
		</div>
		<card v-else class="p-6">
			You do not have any liked internship.
		</card>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import InternshipCard from "@/Components/Internship/Card";
import Card from "@/Components/Card";

export default {
	components: {
		BreezeAuthenticatedLayout,
		InternshipCard,
		Card
	},
	props: {
		internships: {
			type: Array,
			required: true
		}
	},
	data() {
		return {
			localInternships: [],
		}
	},
	mounted() {
		this.localInternships = [...this.internships];
	},
	methods: {
		onDislike(id) {
			this.localInternships = this.localInternships.filter(internship => internship.id !== id)
		}
	}
}
</script>