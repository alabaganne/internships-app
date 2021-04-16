<template>
	<form class="max-w-4xl mx-auto">
		<card title="Introduce yourself" subtitle="What makes you a strong candidate for this internship?">
			<div class="p-6 grid gap-y-6">
				<slot />
			</div>
			<template v-slot:footer>
				<div class="flex justify-end">
					<div>
						<button type="button" @click="reset" class="btn btn-dark">Reset</button>
						<button type="submit" class="ml-1 btn btn-primary">Submit</button>
					</div>
				</div>
			</template>
		</card>
	</form>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "@/Components/Card";

export default {
	components: {
		BreezeAuthenticatedLayout,
		Card,
	},
	props: {
		form: {
			type: Object,
			required: true
		},
		originalData: Object,
		routeName: { // example: internships
			type: String,
			required: true
		}
	},
	computed: {
		editing() {
			return this.route().current(`${this.routeName}.edit`);
		}
	},
	methods: {
		submit() {
			let submitUrl = this.editing ? this.route(`${this.routeName}.update`) : this.route(`${this.routeName}.store`);
			let submitMethod = this.editing ? 'put' : 'post';

			this.form[submitMethod](submitUrl);
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