<template>
	<nav class="bg-white text-gray-700 h-20 flex justify-between items-center px-4 md:px-6 border-b">
		<button @click="toggleSidebar" class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100">
			<icon name="menu" solid />
		</button>
		<div class="flex items-center space-x-2">
			<inertia-link
				v-if="user.userable_type === 'student'"
				:href="route('likes.index')"
				class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100 block"
				:class="{ 'text-red-600 hover:bg-red-50': user.likes_count > 0 }"
			>
				<icon name="heart" solid />
			</inertia-link>

			<messages-slide-over />

			<notifications-slide-over :key="url()" />

			<breeze-dropdown width="w-80">
				<template v-slot:trigger>
					<button class="px-2 flex items-center text-sm">
						<img
							class="h-9 w-9 rounded-full object-cover"
							src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
							alt=""
						/>
					</button>
				</template>
				<template v-slot:content>
						<div class="flex items-center px-5 py-4">
							<div class="flex-shrink-0">
								<img
									class="h-12 w-12 rounded-full"
									src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
									alt=""
								/>
							</div>
							<div class="ml-3">
								<div class="font-medium">{{ user.name }}</div>
								<div class="text-sm leading-none text-gray-500">{{ user.email }}</div>
							</div>
						</div>
						<breeze-dropdown-link v-if="user.is_admin" href="#">Manage users</breeze-dropdown-link>
						<breeze-dropdown-link :href="route('profile.edit')">My account</breeze-dropdown-link>
						<breeze-dropdown-link :href="route('logout')" as="button" method="POST">Logout</breeze-dropdown-link>
				</template>
			</breeze-dropdown>
		</div>
	</nav>
</template>

<script>
import BreezeDropdown from "@/Components/Breeze/Dropdown";
import BreezeDropdownLink from "@/Components/Breeze/DropdownLink";
import NotificationsSlideOver from "./NotificationsSlideOver";
import MessagesSlideOver from "./MessagesSlideOver";

import { mapActions, mapGetters } from "vuex";

export default {
    components: {
        BreezeDropdown,
        BreezeDropdownLink,
        NotificationsSlideOver,
		MessagesSlideOver
    },
    computed: {
        ...mapGetters(["sidebarActive"]),
        user() {
            return this.$page.props.auth.user;
        }
    },
    methods: {
        ...mapActions(["toggleSidebar"]),
    },
};
</script>
