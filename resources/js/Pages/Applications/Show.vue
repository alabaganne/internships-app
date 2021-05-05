<template>
	<main-layout maxWidthClass="max-w-5xl">
		<div class="flex justify-between items-center">
			<div class="flex items-center">
				<img
					class="h-20 w-20 rounded-full object-cover"
					src="https://images.unsplash.com/photo-1528763380143-65b3ac89a3ff?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&q=80"
					alt=""
				>
				<div class="ml-4">
					<div class="text-2xl font-extrabold">{{ application.student.name }}</div>
					<div class="text-sm font-medium text-gray-500">Applied for <inertia-link :href="route('internships.show', application.internship)" class="link">{{ application.internship.title }}</inertia-link> on {{ application.created_at }}</div>
				</div>
			</div>
			<template v-if="user.userable_type === 'company'">
				<div v-if="application.status === null" class="flex items-center">
					<button type="button" @click="reply(false)" class="btn btn-dark">Disqualify</button>
					<button type="button" @click="reply(true)" class="ml-1 btn btn-primary">Interview</button> <!-- Schedule an interview -->
				</div>
				<div v-else class="text-xs uppercase text-gray-400 font-medium">
					Already replied
				</div>
			</template>
			<div v-else-if="application.status === null" class="flex">
				<inertia-link class="btn btn-dark" :href="route('applications.edit', application)">Edit -></inertia-link>
				<delete-modal
					title="Delete Application"
					message="Are you sure you want to delete this application? All the data related to it will be permanently removed."
					:url="route('applications.destroy', application)"
				>
					<button type="button" class="ml-1 btn btn-danger">Delete</button>
				</delete-modal>
			</div>
		</div>
		<div class="mt-8">
			<card title="Applicant information" subtitle="Personal details and application">
				<div class="p-6 grid grid-cols-4 gap-6 text-sm">
					<div class="col-span-2">
						<div class="text-gray-500 font-medium">Application for</div>
						<div class="mt-0.5">{{ application.internship.title }}</div>
					</div>
					<div class="col-span-2">
						<div class="text-gray-500 font-medium">Email address</div>
						<div class="mt-0.5">{{ application.student.email }}</div>
					</div>
					<div class="col-span-2">
						<div class="text-gray-500 font-medium">Phone</div>
						<div class="mt-0.5">{{ application.student.phone_number }}</div>
					</div>
					<div class="col-span-2">
						<div class="text-gray-500 font-medium">Status</div>
						<div class="mt-0.5">
							{{ application.status === null ? "This application is pending." : application.status === true ? "You'll receive a phone call soon." : "This application has been rejected." }}
						</div>
					</div>
					<div class="col-span-4">
						<div class="text-gray-500 font-medium">Cover letter</div>
						<div class="mt-0.5">{{ application.cover_letter }}</div>
					</div>
					<div v-if="application.message" class="col-span-4">
						<div class="text-gray-500 font-medium">Message</div>
						<div class="mt-0.5">{{ application.message }}</div>
					</div>
					<div class="col-span-4">
						<div class="text-gray-500 font-medium">Attachments</div>
						<ul class="mt-2 border border-gray-200 rounded-md divide-y divide-gray-200">
							<li v-for="attachment in ['resume_back_end_developer.pdf', 'coverletter_back_end_developer.pdf']" :key="attachment" class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
								<div class="w-0 flex-1 flex items-center">
									<!-- Heroicon name: solid/paper-clip -->
									<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
									</svg>
									<span class="ml-2 flex-1 w-0 truncate">
										{{ attachment }}
									</span>
								</div>
								<div class="ml-4 flex-shrink-0">
									<a href="#" class="link text-sm font-medium">
										Download
									</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</card>
		</div>
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import DeleteModal from "@/Components/Modals/Delete";

export default {
	components: {
		MainLayout,
		DeleteModal,
	},
	props: {
		application: {
			type: Object,
			required: true
		}
	},
	computed: {
		user() {
			return this.$page.props.auth.user;
		}
	},
	methods: {
		reply(data) {
			this.$inertia.post(
				route('applications.reply', this.application),
				{ status: data }
			);
		}
	}
}
</script>
