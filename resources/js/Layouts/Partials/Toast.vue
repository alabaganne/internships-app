<template>
	<transition name="slide-fade">
		<card
			v-if="toast && show"
			class="fixed right-8 top-24 z-50 pl-5 pr-3 py-4 flex items-center max-w-lg"
		>
			<icon v-if="toast.action === 'store'" name="save-as" class="text-green-500" />
			<icon v-else-if="toast.action === 'update'" name="pencil-alt" class="text-blue-500" />
			<icon v-if="toast.action === 'destroy'" name="trash" class="text-red-500" />
			<icon v-if="toast.action === 'notification'" name="bell" class="text-red-500" />
			<div class="ml-2.5 text-sm font-medium text-gray-600">
				{{ toast.message }}
			</div>
			<button
				type="button"
				@click="close"
				class="ml-4 text-gray-500 hover:bg-gray-100 p-2 rounded-lg transition-colors duration-200"
			>
				<icon name="x" solid class="h-4 w-4" />
			</button>
		</card>
	</transition>
</template>

<script>
export default {
	props: ['toast'],
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
	}
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
