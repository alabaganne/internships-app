<template>
	<main-layout title="University Supervisors" subtitle="Contact">
		<template v-slot:header-right>
			<inertia-link :href="route('university_supervisors.create')" class="btn btn-lg btn-primary">Add University Supervisor -></inertia-link>
		</template>
		<div v-if="university_supervisors.data.length > 0">
			<div class="grid c-grid-col-sm gap-4">
				<card v-for="supervisor in university_supervisors.data" :key="supervisor.id">
					<div class="pt-10 pb-6 flex-center flex-col">
						<img
							class="h-28 w-28 rounded-full object-cover"
							src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
							:alt="supervisor.name"
						>
						<div class="mt-6 text-lg font-medium">{{ supervisor.name }}</div>
						<div class="text-sm text-gray-500">{{ supervisor.field.name }} Teacher</div>
						<div class="mt-4 flex items-center space-x-1">
							<inertia-link
								v-if="currentUser.is_admin"
								:href="route('university_supervisors.edit', supervisor)"
								class="btn btn-sm btn-dark"
							>
								Edit ->
							</inertia-link>
						</div>
					</div>
					<div class="border-t flex divide-x">
						<!-- <inertia-link class="flex-1 px-2 py-4 text-sm font-medium hover:bg-gray-50 flex-center" href="#">
							<icon name="user-circle" solid class="h-5 w-5 mr-1 text-gray-400" />
							Students
						</inertia-link> -->
						<button @click="selectedUser = supervisor" class="flex-1 px-2 py-4 text-sm font-medium hover:bg-gray-50 flex-center">
							<icon name="mail" solid class="h-5 w-5 mr-1 text-gray-400" />
							Contact
						</button>
					</div>
				</card>
			</div>
			<pagination class="mt-4" :links="university_supervisors.links" :meta="university_supervisors" />
		</div>
		<card v-else class="p-6">
			There's no university supervisors in the database.
		</card>
		<contact-modal :user="selectedUser" @close="selectedUser = null" />
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import Pagination from "@/Components/Pagination";
import ContactModal from "@/Components/Modal/Contact";

export default {
	components: {
		MainLayout,
		Pagination,
		ContactModal,
	},
	props: {
		university_supervisors: {
			type: Object,
			required: true,
		}
	},
	data() {
		return {
			selectedUser: null,
		}
	}
};
</script>
