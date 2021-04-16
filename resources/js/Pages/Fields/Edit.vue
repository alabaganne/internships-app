<template>
	<breeze-authenticated-layout>
		<div class="max-w-xl mx-auto mt-6">
			<form spellcheck="false" @submit.prevent="onSubmit">
				<div class="shadow overflow-hidden bg-white sm:rounded-md">
					<div class="p-6 border-b">
						<div class="text-xl font-medium">Field of studies</div>
						<p class="mt-0.5 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, exercitationem explicabo.</p>
					</div>
					<div class="px-4 py-5 sm:p-6">
						<breeze-validation-errors class="mb-6" />
						<div class="grid grid-cols-6 gap-x-4 gap-y-6">
							<div class="col-span-6 sm:col-span-4">
								<label for="name" class="required">Name</label>
								<input v-model="form.name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1.5" placeholder="e.g. Computer Science" />
							</div>

							<div class="col-span-6">
								<label for="description">Description</label>
								<textarea v-model="form.description" name="description" id="description" rows="8" class="mt-1.5"></textarea>
							</div>
						</div>
					</div>
					<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
						<reset-button :form="form" :originalData="field" />
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
import ResetButton from "@/Components/ResetButton";

export default {
	components: {
		BreezeAuthenticatedLayout,
		BreezeValidationErrors,
		ResetButton
	},
	props: {
		field: {
			type: Object,
			required: false
		}
	},
	data() {
		return {
			form: this.$inertia.form({
				name: "",
				description: ""
			})
		}
	},
	computed: {
		errors() {
			return this.$page.props.errors;
		},
		editing() {
			return this.route().current('fields.edit');
		}
	},
	mounted() {
		if(this.field) {
			Object.assign(this.form, this.field);
		}
	},
	methods: {
		onSubmit() {
			let submitUrl = this.editing ? route('fields.update', this.field.id) : route('fields.store');
			let method = this.editing ? 'put' : 'post';

			this.$inertia[method](submitUrl, this.form);
		},
	}
}
</script>