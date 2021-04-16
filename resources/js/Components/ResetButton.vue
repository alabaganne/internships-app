<template>
	<button type="button" @click="reset" class="btn btn-dark">Reset</button>
</template>

<script>
export default {
	props: {
		form: {
			type: Object,
			required: true
		},
		originalData: {
			type: Object,
			required: false
		}
	},
	methods: {
		reset() {
			if(this.originalData) {
				Object.assign(this.form, this.originalData);
			} else {
				this.form.reset();
			}
		},
	}
}
</script>