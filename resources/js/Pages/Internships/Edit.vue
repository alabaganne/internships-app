<template>
	<main-layout>
		<div class="max-w-3xl mx-auto mt-6">
			<app-form
				:form="form"
				:originalData="internship"
				route-name="internships"
				:route-params="{ internship }"
				title="Internship Information"
				subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
			>
				<div class="grid gap-x-3 gap-y-6 p-6">
					<div class="col-span-6 sm:col-span-6">
						<label for="title" class="required">Title</label>
						<input v-model="form.title" type="text" name="title" id="title" class="mt-1 form-control" />
					</div>
					<div class="col-span-2">
						<label for="field" class="required">Field of studies</label>
						<select v-model="form.field_id" name="field" id="field" class="mt-1 form-control">
							<option></option>
							<option v-for="field in fields" :key="field.id" :value="field.id">{{ field.name }}</option>
						</select>
					</div>
					<div class="col-span-2">
						<label for="supervisor">Supervisor</label>
						<select v-model="form.company_supervisor_id" name="supervisor" id="supervisor" class="mt-1 form-control">
							<option></option>
							<option v-for="supervisor in company_supervisors" :key="supervisor.id" :value="supervisor.id">{{ supervisor.name }}</option>
						</select>
					</div>
					<div class="col-span-2">
						<label for="closing_at" class="required">Closing date</label>
						<input v-model="form.closing_at" name="closing_at" id="closing_at" type="date" class="mt-1 form-control" />
					</div>
					<div class="col-span-6">
						<label for="description" class="required">Description</label>
						<textarea v-model="form.description" name="description" id="description" rows="12" class="mt-1 form-control"></textarea>
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
						<files-upload class="mt-1" />
						<p class="mt-1 text-gray-500 text-sm font-light">You may attach up to 10 files under the size of <span class="font-semibold">10MB</span> each.</p>
					</div>
				</div>
			</app-form>
		</div>
	</main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import AppForm from "@/Components/Form";
import FilesUpload from "@/Components/FilesUpload";

export default {
	components: {
		MainLayout,
		BreezeValidationErrors,
		AppForm,
		FilesUpload
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
}
</script>