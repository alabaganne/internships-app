<template>
	<breeze-authenticated-layout title="Application" subtitle="Details" maxWidthClass="max-w-4xl">
		<template v-slot:header-right>
			<inertia-link :href="route('applications.edit', application)" class="btn btn-dark">Edit -></inertia-link>
			<delete-modal
				title="Delete Application"
				message="Are you sure you want to cancel this application? This action cannot be undone."
				:url="route('applications.destroy', application)"
			>
				<button type="button" class="btn btn-danger">Delete</button>
			</delete-modal>
		</template>
		<card title="Applicant Information" subtitle="Personal details and application.">
			<template v-slot:header-right>
				<div
					v-text="application.status"
					class="tag capitalize"
					:class="{
						'': application.status === 'pending',
						'tag-success': application.status === 'accepted',
						'tag-danger': application.status === 'rejected',
					}"
				>
				</div>
			</template>
			<div class="border-gray-200">
				<dl class="divide-y">
					<div v-if="application.student" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Full name
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ application.student.name }}
						</dd>
					</div>
					<div v-if="application.student" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Email address
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ application.student.email }}
						</dd>
					</div>
					<inertia-link
						:href="route('internships.show', { 'internship': application.internship })"
						class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50 hover:bg-gray-100 transition-colors duration-100"
					>
						<dt class="text-sm font-medium text-gray-500">
							Application for
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ application.internship.title }}
						</dd>
					</inertia-link>
					<div v-if="user.userable_type.includes('Student')" class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Field of studies
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ application.internship.field }}
						</dd>
					</div>
					<div v-if="application.message" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Message
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ application.message }}
						</dd>
					</div>
					<div v-if="application.cover_letter" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Cover Letter
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ application.cover_letter }}
						</dd>
					</div>
					<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Attachments
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							<ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
								<li
									v-for="attachment in ['resume_back_end_developer.pdf', 'coverletter_back_end_developer.pdf']"
									:key="attachment"
									class="pl-3 pr-4 py-3 flex items-center justify-between text-sm"
								>
									<div class="w-0 flex-1 flex items-center">
										<svg class="flex-shrink-0 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/paper-clip" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
										</svg>
										<span class="ml-2 flex-1 w-0 truncate">
											{{ attachment }}
										</span>
									</div>
									<div class="ml-4 flex-shrink-0">
										<a href="#" class="font-medium text-blue-600 hover:text-blue-500">
											Download
										</a>
									</div>
								</li>
							</ul>
						</dd>
					</div>
				</dl>
			</div>
		</card>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import DeleteModal from "@/Components/Modals/Delete";
import Card from "@/Components/Card";

export default {
	components: {
		BreezeAuthenticatedLayout,
		DeleteModal,
		Card
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
	}
}
</script>