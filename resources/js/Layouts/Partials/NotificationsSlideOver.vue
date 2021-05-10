<template>
	<slide-over ref="slideOver" v-if="currentUser.notifications !== null" title="Notifications">
		<template v-slot:trigger>
			<button class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100"
			>
				<!-- :class="{ 'text-red-600 hover:bg-red-50': currentUser.notifications.unread_count > 0 }" -->
				<icon name="bell" solid />
			</button>
		</template>
		<template v-slot:content>
			<div :key="routeUrl()" v-if="currentUser.notifications.data.length > 0">
				<inertia-link
					v-for="(notification) in currentUser.notifications.data"
					:key="notification.id"
					:href="notification.data.action"
					@click="markAsRead(notification)"
					class="p-4 border-b border-gray-200 hover:bg-gray-50 cursor-pointer flex"
				>
					<div
						class="h-16 w-16 flex-shrink-0 flex-center rounded-full"
						:class="notification.read_at === null ?
							'bg-red-100-disabled text-red-600-disabled':
							'bg-gray-200 text-gray-800'
						"
					>
						<icon name="bell" solid />
					</div>
					<div class="ml-5">
						<div class="font-medium text-gray-900">{{ notification.data.title }}</div>
						<p class="text-gray-500 text-sm mt-1" v-html="notification.data.body" />
						<span class="mt-1 text-xs text-blue-500 font-medium">{{ notification.created_at }}</span>
					</div>
				</inertia-link>
			</div>
			<div v-else class="p-4 text-center">No notifications found.</div>
		</template>
	</slide-over>
</template>

<script>
import SlideOver from '@/Components/SlideOver';

export default {
	components: { SlideOver },
	methods: {
		markAsRead(notification) {
			if(! notification.read_at) {
				axios.post(route('notifications.store', notification.id), {}).catch(err => console.log(err));
			}

			this.$refs.slideOver.toggle();
		},
	}
}
</script>
