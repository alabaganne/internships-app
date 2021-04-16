<template>
	<breeze-authenticated-layout>
		<div class="max-w-3xl mx-auto mt-6">
			<form spellcheck="false" @submit.prevent="onSubmit">
				<div class="shadow bg-white overflow-hidden rounded-lg">
					<div class="p-6 border-b">
						<div class="text-xl font-medium">Internship Information</div>
						<p class="mt-0.5 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, exercitationem explicabo.</p>
					</div>
					<div class="px-4 py-5 sm:p-6">
						<breeze-validation-errors class="mb-6" />
						<div class="grid gap-x-4 gap-y-6">
							<div class="col-span-6 sm:col-span-6">
								<label for="title" class="required">Title</label>
								<input v-model="form.title" type="text" name="title" id="title" class="mt-1.5" />
							</div>

							<div class="col-span-2">
								<label for="field" class="required">Field of studies</label>
								<select v-model="form.field_id" name="field" id="field" class="mt-1.5">
									<option></option>
									<option v-for="field in fields" :key="field.id" :value="field.id">{{ field.name }}</option>
								</select>
							</div>
							
							<div class="col-span-2">
								<label for="supervisor">Supervisor</label>
								<select v-model="form.company_supervisor_id" name="supervisor" id="supervisor" class="mt-1.5">
									<option></option>
									<option v-for="supervisor in company_supervisors" :key="supervisor.id" :value="supervisor.id">{{ supervisor.name }}</option>
								</select>
							</div>

							<div class="col-span-2">
								<label for="closing_at" class="required">Closing date</label>
								<input v-model="form.closing_at" name="closing_at" id="closing_at" type="date" class="mt-1.5" />
							</div>

							<div class="col-span-6">
								<label for="description" class="required">Description</label>
								<textarea v-model="form.description" name="description" id="description" rows="12" class="mt-1.5"></textarea>
							</div>

							<div class="col-span-6">
								<div class="flex items-start">
									<div class="flex items-center h-5">
										<input id="remote" name="remote" type="checkbox" v-model="form.remote" />
									</div>
									<div class="ml-3 text-sm">
										<label for="remote" class="font-medium text-gray-700">Remote</label>
										<p class="text-gray-500">Interns will be doing most of the internship work from home.</p>
									</div>
								</div>
							</div>

							<div class="col-span-6">
								<label class="block text-sm font-medium text-gray-700">
									Attachments
								</label>
								<div class="mt-1.5 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
									<div class="space-y-1 text-center">
										<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
											<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<div class="flex text-sm text-gray-600">
											<label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
												<span>Upload a file</span>
												<input id="file-upload" name="file-upload" type="file" class="sr-only" />
											</label>
											<p class="pl-1">or drag and drop</p>
										</div>
										<p class="text-xs text-gray-500">
											PNG, JPG, PDF up to 10MB
										</p>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
						<reset-button :form="form" :originalData="internship" />
						<button type="submit" class="ml-1.5 btn btn-primary">
							{{ editing ? 'Update' : 'Create' }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import ResetButton from '@/Components/ResetButton';

export default {
	components: {
		BreezeAuthenticatedLayout,
		BreezeValidationErrors,
		ResetButton
	},
	props: {
		fields: {
			type: Array,
			required: true
		},
		company_supervisors: {
			type: Array,
			required: true
		},
		internship: {
			type: Object,
			required: false
		}
	},
	data() {
		return {
			form: this.$inertia.form({
				title: "",
				description: "",
				remote: false,
				attachments: "",
				closing_at: "",
				field_id: null,
				company_supervisor_id: null,
			})
		}
	},
	computed: {
		errors() {
			return this.$page.props.errors;
		},
		editing() {
			return this.route().current('internships.edit');
		}
	},
	mounted() {
		if(this.internship) {
			this.internship.remote = !!this.internship.remote;
			Object.assign(this.form, this.internship)
		}
	},
	methods: {
		onSubmit() {
			console.log('submit');
			let submitUrl = this.editing ? route('internships.update', this.internship.id) : route('internships.store');
			let method = this.editing ? 'put' : 'post';
			this.$inertia[method](submitUrl, this.form);
		}
	}
}
</script>