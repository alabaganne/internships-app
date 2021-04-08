<template>
	<Modal title="Add Internship" subtitle="Fill out the fields below and submit to create a new field of studies.">
		<template v-slot:trigger>
			<AddButton>Add Field of Studies</AddButton>
		</template>
		<div class="p-6">
			<form action="#">
				<div>
					<breeze-label class="required" for="name" value="Name" />
					<breeze-input class="mt-1 shadow-none" id="name" type="text" v-model="form.name" required />
				</div>
				<div class="mt-3">
					<breeze-label for="description" value="Description" />
					<textarea class="mt-1 shadow-none" id="description" rows="6" v-model="form.description" required />
				</div>
			</form>
		</div>
		<template v-slot:action-button>
			<button @click="submit" class="btn btn-primary">Create</button>
		</template>
	</Modal>
</template>

<script>
import Modal from "@/Components/Modal";
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeCheckbox from "@/Components/Checkbox";
import AddButton from "@/Components/Buttons/Add.vue"

export default {
	components: {
		Modal,
		BreezeLabel,
		BreezeInput,
		BreezeCheckbox,
		AddButton
	},
	data() {
		return {
			form: this.$inertia.form({
				name: "",
				description: ""
			})
		}
	},
	methods: {
		submit() {
			console.log('submit');
		}
	}
}
</script>