<template>
	<transition name="slide-fade">
		<card
			v-if="toast && show"
			class="absolute right-12 top-24 z-50 py-4 px-6 flex items-center"
		>
			<icon
				:name="toast.action === 'store' ? 'save-as' : toast.action === 'update' ? 'pencil-alt' : 'trash'"
				:class="{
					'text-green-500': toast.action === 'store',
					'text-blue-500': toast.action === 'update',
					'text-red-500': toast.action === 'destroy',
				}" />
			<div class="ml-2.5 text-sm text-gray-500 font-medium">
				{{ toast.message }}
			</div>
			<button
				type="button"
				@click="close"
				class="ml-6 text-gray-800 hover:bg-gray-100 p-1 rounded-lg transition-colors duration-200"
			>
				<icon name="x" class="h-5 w-5" />
			</button>
		</card>
	</transition>
</template>

<script>
import Card from "@/Components/Card";

export default {
	props: ['toast'],
	components: { Card },
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
			}, 3500);
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