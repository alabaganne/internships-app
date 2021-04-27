<template>
	<breeze-authenticated-layout>
		<div class="max-w-xl mx-auto mt-6">
			<app-form
				title="Field of Studies"
				subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
				:form="form"
				:originalData="field"
				route-name="fields"
				:route-params="{ field }"
				withDelete
				modelName="Field"
			>
				<div class="p-6">
					<label for="name" class="required">Name</label>
					<input v-model="form.name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1 form-control" placeholder="e.g. Computer Science" />
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
			})
		}
	},
}
</script>