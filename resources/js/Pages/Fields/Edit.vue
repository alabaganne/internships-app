<template>
	<breeze-authenticated-layout>
		<div class="max-w-xl mx-auto mt-6">
			<app-form
				title="Field of Studies"
				subtitle="Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, exercitationem explicabo."
				:form="form"
				:originalData="field"
				route-name="fields"
				:route-params="{ field }"
				withDelete
				modelName="Field"
			>
				<div class="grid grid-cols-6 gap-x-4 gap-y-6">
					<div class="col-span-6 sm:col-span-4">
						<label for="name" class="required">Name</label>
						<input v-model="form.name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1.5 form-control" placeholder="e.g. Computer Science" />
					</div>

					<div class="col-span-6">
						<label for="description">Description</label>
						<textarea v-model="form.description" name="description" id="description" rows="8" class="mt-1.5 form-control"></textarea>
					</div>
				</div>
			</app-form>
		</div>
	</breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import AppForm from "@/Components/Form";

export default {
	components: {
		BreezeAuthenticatedLayout,
		AppForm
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
}
</script>