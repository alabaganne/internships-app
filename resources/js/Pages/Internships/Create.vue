<template>
	<breeze-authenticated-layout>
		<div class="max-w-2xl mx-auto">
			<card title="Add Internship" subtitle="Fill out the form below to create a new internship.">
				<div class="p-6">
					<breeze-validation-errors class="mb-4" />
					<form @submit.prevent="submit">
						<div class="grid grid-cols-2 gap-4">
							<div>
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
							<inertia-link :href="route('internships.index')" class="link px-2">&#8592; Go back</inertia-link>
							<button type="submit" class="btn btn-primary">Submit</button>
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

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
		BreezeLabel,
		BreezeInput,
		BreezeCheckbox,
		BreezeValidationErrors
	},
	props: {
		fields: Array,
		company_supervisors: Array,
	},
	data() {
		return {
			form: this.$inertia.form({
				title: "",
				description: "",
				remore: false,
				attachments: "",
				closing_date: "",
				field_id: null,
				company_supervisor_id: null,
			})
		}
	},
	computed: {
		errors() {
			return this.$page.props.errors
		}
	},
	methods: {
		submit() {
			this.$inertia.post(route('internships.store'), this.form);
		}
	}
}
</script>