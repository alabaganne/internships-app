<template>
	<aside id="sidebar" v-show="sidebarActive" class="w-80 bg-gray-800 text-white flex-shrink-0 fixed top-0 min-h-screen lg:relative z-50">
		<div class="h-20 px-7 flex justify-between items-center border-gray-700">
			<span class="text-3xl font-semibold">LOGO</span>
			<button @click="toggleSidebar" class="text-gray-200 p-1 rounded-lg hover:bg-gray-700 lg:hidden">
				<icon name="x" class="h-5 w-5" />
			</button>
		</div>
		<div class="px-2.5 pb-6 space-y-1">
			<template v-for="link in mainLinks" :key="link.name">
				<inertia-link
					v-if="link.show"
					:href="route(link.name)"
					class="px-4 py-3 flex items-center text-white rounded-lg"
					:class="route().current(`${link.name.split('.')[0]}*`) ? 'bg-gray-900' : 'hover:bg-gray-700'"
				>
					<icon :name="link.icon" class="text-gray-400" />
					<span class="ml-4">{{ link.label }}</span>
				</inertia-link>
			</template>
		</div>
		<div class="px-2.5 py-6 border-t border-gray-700 space-y-1">
			<inertia-link
				v-for="link in secondaryLinks"
				:key="link.name"
				:href="route(link.name)"
				class="px-4 py-3 flex items-center text-white hover:bg-gray-700 rounded-lg"
			>
				<icon :name="link.icon" class="text-gray-400" />
				<span class="ml-4">{{ link.label }}</span>
			</inertia-link>
		</div>
	</aside>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
	data() {
		return {
			mainLinks: [
				{
					name: 'dashboard',
					label: 'Dashboard',
					icon: 'collection',
					show: true,
				},
				{
					name: 'applications.index',
					label: 'Applications',
					icon: 'folder',
					show: !this.$page.props.auth.user.userable_type.includes('supervisor')
				},
				{
					name: 'internships.index',
					label: 'Internships',
					icon: 'briefcase',
					show: true,
				},
				{
					name: 'companies.index',
					label: 'Companies',
					icon: 'office-building',
					show: true,
				},
				{
					name: 'students.index',
					label: 'Students',
					icon: 'user-group',
					show: true,
				},
				{
					name: 'university_supervisors.index',
					label: 'University supervisors',
					icon: 'identification',
					show: true,
				},
				{
					name: 'fields.index',
					label: 'Fields of studies',
					icon: 'light-bulb',
					show: true,
				},
			],
			secondaryLinks: [
				{
					name: 'home',
					label: 'Home',
					icon: 'home',
				},
				{
					name: 'about',
					label: 'About',
					icon: 'document-text',
				},
				{
					name: "contact",
					label: "Contact us",
					icon: 'mail',
				},
		],
		};
	},

	computed: {
		...mapGetters(["sidebarActive"]),
	},

	methods: {
		...mapActions(["toggleSidebar"]),
	},

	mounted() {
		if(window.innerWidth < 1024) this.toggleSidebar();
	}
};
</script>
