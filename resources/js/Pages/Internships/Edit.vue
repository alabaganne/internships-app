<template>
	<breeze-authenticated-layout>
		<div class="max-w-2xl mx-auto pt-8">
			<card
				title="Internship"
				:subtitle="editing ? 'Edit internship details!' : 'Fill out the form below to create a new internship.'"
				dark
			>
				<div class="p-6">
					<breeze-validation-errors class="mb-4" />
					<form @submit.prevent="onSubmit">
						<div class="grid grid-cols-2 gap-4">
							<div class="col-span-2">
								<breeze-label class="required" for="title" value="Title" />
								<breeze-input class="mt-1" type="text" id="title" v-model="form.title" :class="{ 'input-error': errors.title }" />
							</div>
							<div>
								<breeze-label class="required" for="field" value="Field of studies" />
								<select class="mt-1" id="field" v-model="form.field_id" :class="{ 'input-error': errors.field_id }">
									<option value="" default></option>
									<option v-for="field in fields" :key="field.id" :value="field.id">{{ field.name }}</option> 
								</select>
							</div>
							<div>
								<breeze-label for="company_supervisor" value="Supervisor" />
								<select class="mt-1" id="company_supervisor" v-model="form.company_supervisor_id">
									<option value="" default></option>
									<option v-for="supervisor in company_supervisors" :key="supervisor.id" :value="supervisor.id">{{ supervisor.name }}</option> 
								</select>
							</div>
							<div>
								<breeze-label class="required" for="closing_at" value="Closing at" />
								<breeze-input class="mt-1" type="date" id="closing_at" v-model="form.closing_at" :class="{ 'input-error': errors.closing_at }" /> 
							</div>
							<div class="col-span-2">
								<breeze-label class="required" for="description" value="Description" />
								<textarea class="mt-1 resize-none" id="description" rows="9" v-model="form.description" :class="{ 'input-error': errors.description }" />
							</div>
							<div class="col-span-2">
								<div class="flex items-center">
									<breeze-checkbox id="remote" v-model="form.remote" />
									<breeze-label class="ml-2" for="remote">Remote?</breeze-label>
								</div>
							</div>
						</div>
						<div class="mt-4 flex items-center justify-between">
							<inertia-link :href="editing ? route('internships.show', internship.id) : route('internships.index')" class="link-gray arrow-left px-2">Go back</inertia-link>
							<div class="flex">
								<reset-button :form="form" :originalData="internship" />
								<button type="submit" class="ml-1 btn btn-dark">{{ editing ? 'Update' : 'Create' }}</button>
							</div>
						</div>
					</form>
				</div>
			</card>
		</div>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "@/Components/Card";
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeCheckbox from "@/Components/Checkbox";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import ResetButton from '@/Components/ResetButton';

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
		BreezeLabel,
		BreezeInput,
		BreezeCheckbox,
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
				remore: false,
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
			Object.assign(this.form, this.internship)
		}
	},
	methods: {
		onSubmit() {
			let submitUrl = this.editing ? route('internships.update', this.internship.id) : route('internships.store');
			let method = this.editing ? 'put' : 'post';
			this.$inertia[method](submitUrl, this.form);
		}
	}
}
</script>