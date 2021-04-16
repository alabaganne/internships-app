<template>
  <breeze-authenticated-layout>
		<div class="max-w-2xl mx-auto mt-6">
			<form spellcheck="false" @submit.prevent="onSubmit">
				<div class="shadow bg-white overflow-hidden rounded-lg">
					<div class="p-6 border-b">
						<div class="text-xl font-medium">Student Information</div>
						<p class="mt-0.5 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, exercitationem explicabo.</p>
					</div>
					<div class="px-4 py-5 sm:p-6">
						<breeze-validation-errors class="mb-6" />
						<div class="grid grid-cols-6 gap-x-4 gap-y-6">

							<div class="col-span-6 sm:col-span-6">
								<label for="name" class="required">Full name</label>
								<input v-model="form.name" type="text" name="name" id="name" class="mt-1" />
							</div>

							<div class="col-span-5">
								<label for="email" class="required">Email address</label>
								<input v-model="form.email" name="email" id="email" type="email" class="mt-1" />
							</div>

							<div class="col-span-4">
								<label for="phone_number">Phone number</label>
								<input v-model="form.phone_number" name="phone_number" id="phone_number" type="text" class="mt-1" />
							</div>

							<div class="col-span-6 sm:col-span-3">
								<label for="field" class="required">Field of studies</label>
								<select v-model="form.field_id" name="field" id="field" class="mt-1">
									<option></option>
									<option v-for="field in fields" :key="field.id" :value="field.id">{{ field.name }}</option>
								</select>
							</div>
							
							<div class="col-span-6 sm:col-span-3">
								<label for="city">City</label>
								<select v-model="form.city_id" name="city" id="city" class="mt-1">
									<option></option>
									<option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
								</select>
							</div>

							<div class="col-span-6">
								<label for="id_card_number">About</label>
								<textarea class="mt-1" rows="10" v-model="form.about"></textarea>
							</div>

						</div>
					</div>
					<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
						<reset-button :form="form" :originalData="student" />
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
		student: Object,
		fields: Array,
		cities: Array
	},
	data() {
		return {
			form: this.$inertia.form({
				name: "",
				email: "",
				phone_number: "",
				field_id: null,
				city_id: null,
				about: "",
			})
		}
	},
	computed: {
		editing() {
			return this.route().current('students.edit');
		}
	},
	mounted() {
		if(this.student) {
			Object.assign(this.form, this.student);
		}
	},
	methods: {
		onSubmit() {
			let submitUrl = this.editing ? route('students.update', this.student.id) : route('students.store');
			let method = this.editing ? 'put' : 'post';

			this.$inertia[method](submitUrl, this.form);
		}
	}
}
</script>