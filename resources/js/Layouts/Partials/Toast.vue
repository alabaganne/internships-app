<template>
	<transition name="slide-fade">
		<card
			v-if="show && toast && !popstate"
			class="fixed right-8 top-24 z-50 pl-4 pr-3 py-2.5 flex items-center max-w-lg"
		>
			<div class="h-11 w-11 flex-center rounded-full" :class="{
				'bg-green-100': toast.type === 'store',
				'bg-blue-100': toast.type === 'update' || toast.type === 'message',
				'bg-red-100': toast.type === 'destroy',
				'bg-yellow-100': toast.type === 'notification',
			}">
				<icon v-if="toast.type === 'store'" name="save-as" class="text-green-600 h-5 w-5" />
				<icon v-else-if="toast.type === 'update'" name="document-duplicate" class="text-blue-600 h-5 w-5" />
				<icon v-if="toast.type === 'destroy'" name="trash" class="text-red-600 h-5 w-5" />
				<icon v-if="toast.type === 'notification'" name="bell" class="text-yellow-600 h-5 w-5" />
				<icon v-if="toast.type === 'message'" name="inbox-in" class="text-blue-600 h-5 w-5" />
			</div>
			<div class="ml-3 text-sm font-semibold text-gray-800" v-html="toast.message" />
			<button
				type="button"
				@click="close"
				class="ml-4 text-gray-500 hover:bg-gray-100 hover:text-gray-800 p-2 rounded-lg transition-colors duration-200"
			>
				<icon name="x" solid class="h-5 w-5" />
			</button>
		</card>
	</transition>
</template>

<script>
export default {
	props: {
		toast: Object,
		popstate: Boolean,
	},
	data() {
		return {
			show: false,
			timeout: null,
		}
	},
	watch: {
		toast: function() {
			this.show = true;

			if(this.timeout) {
				clearTimeout(this.timeout)
			}

			this.timeout = setTimeout(() => {
				this.show = false;
			}, 5000);
		}
	},
	methods: {
		close() {
			this.show = false;
		}
	},
}
</script>
