<template>
	<form spellcheck="false" autocomplete="off" @submit.prevent="submit">
		<card :title="title" :subtitle="subtitle">
			<div>
				<breeze-validation-errors class="px-6 pt-4" />
				<slot />
			</div>
			<template v-slot:footer>
				<div class="flex justify-between items-center">
					<div>
						<delete-modal
							v-if="withDelete && editing"
							:title="`Delete ${modelName }`"
							:message="`Are you sure you want to perform this ${modelName.toLowerCase()}? All data related to it will be permanently deleted. This action cannot be undone.`"
							:url="route(`${routeName}.destroy`, routeParams)"
						>
							<button class="btn btn-danger" type="button">Delete</button>
						</delete-modal>
					</div>
					<div>
						<button type="button" @click="reset" class="btn btn-dark rounded">Reset</button>
						<button type="submit" class="ml-1 btn btn-primary rounded">{{ editing ? 'Update' : 'Create' }}</button>
					</div>
				</div>
			</template>
		</card>
	</form>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import DeleteModal from "@/Components/Modal/Delete";

export default {
	components: {
		MainLayout,
		BreezeValidationErrors,
		DeleteModal,
	},
	props: {
		title: String,
		subtitle: String,
		form: {
			type: Object,
			required: true
		},
		originalData: Object,
		routeName: {
			type: String, // example: internships
			required: true
		},
		routeParams: Object,
		withDelete: {
			type: Boolean,
			default: false,
		},
		modelName: String
	},
	computed: {
		editing() {
			return this.route().current(`${this.routeName}.edit`);
		}
	},
	methods: {
		submit() {
			let submitUrl = this.editing ? this.route(`${this.routeName}.update`, { ...this.routeParams }) : this.route(`${this.routeName}.store`, { ...this.routeParams });
			let submitMethod = this.editing ? 'put' : 'post';

			this.form[submitMethod](submitUrl, {
				preserveScroll: true
			});
		},
		reset() {
			if(this.originalData) {
				Object.assign(this.form, this.originalData);
			} else {
				this.form.reset();
			}
		},
	},
	mounted() {
		if(this.editing) {
			Object.assign(this.form, this.originalData)
		}
	}
}
</script>
