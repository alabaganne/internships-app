<template>
	<slide-over ref="slideOver" title="Messages">
		<template v-slot:trigger>
			<button class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100">
				<icon name="chat-alt-2" solid />
			</button>
		</template>
		<template v-slot:content>
			<div class="border-b border-gray-200 divide-y">
				<inertia-link
					v-for="message in currentUser.messages"
					:key="message.id"
					class="hover:bg-gray-50 p-4 flex items-start"
					:href="route('messages.index')"
					:data="{ id: message.user_id }"
					@click="toggleSlideOver"
				>
					<img
						class="h-16 w-16 rounded-full"
						src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
						alt="Devon Webb"
					>
					<div class="ml-5">
						<div class="font-semibold">{{ message.name }}</div>
						<p class="text-gray-500 text-sm mt-1">{{ truncate(message.text, 75) }}</p>
						<span class="mt-1 text-xs text-blue-500 font-medium">{{ message.created_at }}</span>
					</div>
				</inertia-link>
			</div>
			<div v-if="currentUser.messages.length === 0" class="p-4 text-center">No messages found.</div>
			<div class="mt-4 text-center">
				<inertia-link
					v-if="currentUser.messages.length >= 8"
					@click="toggleSlideOver"
					:href="route('messages.index')"
					class="link text-sm font-medium pb-6"
				>View all -></inertia-link>
			</div>
		</template>
	</slide-over>
</template>

<script>
import SlideOver from '@/Components/SlideOver';

export default {
	components: { SlideOver },
	methods: {
		toggleSlideOver() {
			this.$refs.slideOver.toggle();
		},
	}
}
</script>
