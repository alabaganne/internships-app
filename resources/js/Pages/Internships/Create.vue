<template>
	<Modal ref="modal" title="Add Internship" subtitle="Fill out the fields below and submit to create a new internhsip." widthClasses="sm:max-w-3xl">
		<template v-slot:trigger>
			<AddButton>Add Internship</AddButton>
		</template>
		<div class="p-6">
			<form autocomplete="off" class="grid grid-cols-2 gap-4" action="#">
				<div>
					<breeze-label class="required" for="title" value="Title" />
					<breeze-input class="mt-1 shadow-none" id="title" type="text" v-model="form.title" required />
				</div>
				<div>
					<breeze-label class="required" for="field" value="Field of Studies" />
					<select class="mt-1 shadow-none" id="field" v-model="form.field_id">
						<option value="" selected></option>
						<option v-for="field in fields" :key="field.id" :value="field.id">
							{{ field.name }}
						</option>
					</select>
				</div>
				<div>
					<breeze-label for="supervisor" value="Company Supervisor" />
					<select class="mt-1 shadow-none" id="supervisor" v-model="form.company_supervisor_id">
						<option value="" selected></option>
						<option value="1">Ala Baganne</option>
					</select>
				</div>
				<div>
					<breeze-label class="required" for="closing_at" value="Closing At" />
					<breeze-input class="mt-1 shadow-none" type="date" id="closing_at" v-model="form.closing_at" />
				</div>
				<div class="col-span-2">
					<breeze-label class="required" for="description" value="Description" />
					<textarea class="mt-1 shadow-none" id="description" placeholder="About the internship" rows="6" v-model="form.description" required />
				</div>
				<!-- TODO: skills, attachments -->
				<div class="col-span-2">
					<div class="flex items-center">
						<breeze-checkbox id="remote" v-model:checked="form.remote" />
						<breeze-label for="remote" class="ml-2 text-sm">
							<span class="text-gray-600">Remote?</span>
						</breeze-label>
					</div>
        </div>
			</form>
		</div>
		<template v-slot:action-button>
			<button type="button" @click="submit" class="btn btn-primary">Create</button>
		</template>
	</Modal>
</template>

<script>
import Modal from "@/Components/Modal";
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeCheckbox from "@/Components/Checkbox";
import AddButton from "@/Components/Buttons/Add";

export default {
	components: {
		Modal,
		BreezeLabel,
		BreezeInput,
		BreezeCheckbox,
		AddButton
	},
	props: {
		fields: Array,
	},
	data() {
		return {
			form: this.$inertia.form({
				title: "",
				description: "",
				field_id: null,
				closing_at: "",
				company_supervisor_id: "",
				remote: false
			})
		}
	},
	methods: {
		submit() {
			this.$inertia.post(this.route('internships.store'), this.form, {
				onFinish: () => this.$refs['modal'].open = false
			});
		}
	}
}
</script>