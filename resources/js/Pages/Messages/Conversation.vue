<template>
	<div class="flex-1 max-h-full flex flex-col">
		<div class="h-20 px-6 bg-white flex items-center border-b">
			<div class="flex items-center">
				<img
					class="h-12 w-12 object-cover rounded-full"
					src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
					alt=""
				>
				<div class="ml-3">
					<div class="leading-5 text-lg font-medium">Devon Webb</div>
					<div class="text-gray-500 text-sm">devon.webb@gmail.com</div>
				</div>
			</div>
		</div>
		<div class="flex-1 p-6 space-y-4 overflow-auto">
			<div class="flex" v-for="message in 8" :key="message">
				<div class="flex flex-col" :class="{ 'ml-auto text-right': message % 2 === 0 }">
					<div class="px-1 mb-0.5 text-gray-900 text-xs font-medium">
						{{ message % 2 === 0 ? 'You' : 'Devon Webb' }}
					</div>
					<card class="p-4 max-w-lg shadow-none border">
						<div class="text-sm text-left">
							It's not his fault. I know you're going to want to, but you can't blame him.
						</div>
						<div class="mt-1 text-xs text-blue-500 font-medium">Yesterday at 7:24pm</div>
					</card>
				</div>
			</div>
		</div>
		<form @submit.prevent="sendMessage" class="border-t border-gray-100 bg-white mt-auto pl-2 pr-6 py-3 mb-0 flex items-center">
			<textarea
				v-model="message"
				type="text"
				class="text-sm bg-transparent border-none focus:ring-0 w-full resize-none"
				placeholder="Aa"
				rows="1"
			/>
			<button type="submit" class="ml-4 flex-shrink-0 btn btn-primary">Send -></button>
		</form>
	</div>
</template>

<script>
export default {
	data() {
		return {
			message: ''
		}
	},
	methods: {
		sendMessage() {
			if(this.message === '') {
				return;
			}

			console.log(this.message);
			this.message = '';
		}
	}
}
</script>
