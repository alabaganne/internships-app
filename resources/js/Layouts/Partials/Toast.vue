<template>
	<transition name="slide-fade">
		<card
			v-if="show && toast"
			class="fixed right-8 top-24 z-50 pl-4 pr-3 py-2.5 flex items-center max-w-lg"
		>
			<div class="h-11 w-11 flex-center rounded-full" :class="{
				'bg-green-100': toast.action === 'store',
				'bg-blue-100': toast.action === 'update',
				'bg-red-100': toast.action === 'destroy' || toast.action === 'notification',
			}">
				<icon v-if="toast.action === 'store'" name="save-as" class="text-green-600" />
				<icon v-else-if="toast.action === 'update'" name="pencil-alt" class="text-blue-600" />
				<icon v-if="toast.action === 'destroy'" name="trash" class="text-red-600" />
				<icon v-if="toast.action === 'notification'" name="bell" class="text-red-600" />
			</div>
			<div class="ml-4 text-sm font-semibold text-gray-800">
				{{ toast.message }}
			</div>
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
	},
	data() {
		return {
			show: false,
		}
	},
	watch: {
		toast: function() {
			this.show = true;

			setTimeout(() => {
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

<style>
.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.2s ease-in;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}
</style>
