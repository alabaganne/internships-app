<template>
	<div>
		<modal title="Send Message" ref="modal" @close="close">
			<template v-slot:content>
				<form class="p-6 grid gap-6">
					<div class="col-span-4">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="mt-1 form-control text-gray-400" :value="user?.email" disabled>
					</div>
					<div class="col-span-6">
						<label for="message" class="required">Message</label>
						<textarea class="mt-1 form-control" rows="10" v-model="message" placeholder="Aa" />
					</div>
				</form>
			</template>
			<template v-slot:action-button>
				<button class="btn btn-primary" @click="sendMessage">Send -></button>
			</template>
		</modal>
	</div>
</template>

<script>
import Modal from "./Default";

export default {
	components: {
		Modal
	},
	props: {
		user: {
			type: Object,
			required: false
		},
	},
	watch: {
		user: {
			handler: function() {
				if(this.user === null)
					return;

				this.toggle();
			},
			deep: true
		} 
	},
	data() {
		return {
			message: '',
		}
	},
	methods: {
		sendMessage() {
			this.$inertia.post(route('messages.store'), {
				to_id: this.user.user_id,
				text: this.message
			})
		},
		toggle() {
			this.$refs.modal.toggle();
		},
		close() {
			this.$emit('close');
			this.message = '';
		}
	}
}
</script>