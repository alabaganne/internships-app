<template>
	<breeze-authenticated-layout>
		<div class="max-w-xl mx-auto pt-8">
			<card
				title="Field"
				:subtitle="editing ? 'You missed something? No problem, edit it here.' : 'Fill out the form below to create a new field of studies.'"
				dark
			>
				<div class="p-6">
					<breeze-validation-errors class="mb-4" />
					<form @submit.prevent="onSubmit">
						<div class="grid grid-cols-3 gap-4">
							<div class="col-span-2">
								<breeze-label class="required" for="name" value="Name" />
								<breeze-input class="mt-1" type="text" id="name" v-model="form.name" :class="{ 'input-error': errors.name }" />
							</div>
							<div class="col-span-3">
								<breeze-label for="description" value="Description" />
								<textarea class="mt-1 resize-none" id="description" rows="9" v-model="form.description" :class="{ 'input-error': errors.description }" />
							</div>
						</div>
						<div class="mt-4 flex items-center justify-between">
							<div class="flex items-center">
								<inertia-link :href="editing ? route('fields.index', field.id) : route('fields.index')" class="link-gray arrow-left px-2">Go back</inertia-link>
							</div>
							<div class="flex">
								<reset-button class="ml-1" :form="form" :originalData="field" />
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
import BreezeValidationErrors from "@/Components/ValidationErrors";
import ResetButton from "@/Components/ResetButton";

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
		BreezeLabel,
		BreezeInput,
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