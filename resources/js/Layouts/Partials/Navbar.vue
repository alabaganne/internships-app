<template>
    <nav class="bg-white text-gray-700 h-20 flex justify-between items-center px-4 md:px-6 shadow-sm">
        <div class="flex items-center">
            <button class="nav-icon-link xl:hidden" @click="toggleSidebar">
                <icon name="menu" solid />
            </button>
            <form class="ml-4 xl:ml-0 hidden lg:block" action="#" autocomplete="off">
                <label for="navbar-search" class="flex items-center w-full">
                    <button>
                        <icon name="search" solid />
                    </button>
                    <input placeholder="Search for internships" class="ml-2 placeholder-gray-500 focus:ring-0 border-none shadow-none text-base" />
                </label>
            </form>
        </div>
        <div class="flex items-center space-x-2">
            <inertia-link
                v-if="user.userable_type === 'student'"
                :href="route('likes.index')"
                class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100 block"
                :class="{ 'text-red-600 hover:bg-red-50': $page.props.likes_count > 0 }"
            >
                <icon name="heart" solid />
            </inertia-link>
            <slide-over title="Messages">
                <template v-slot:trigger>
                    <button class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100">
                        <icon name="chat-alt-2" solid />
                    </button>
                </template>
                <template v-slot:content>
                    <div class="border-b border-gray-200">
                        <inertia-link v-for="message in 5" :key="message" class="border-t border-gray-200 hover:bg-gray-50 p-4 flex items-start" href="#">
                            <img 
                                class="h-16 w-16 rounded-full"
                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Devon Webb"
                            >
                            <div class="ml-5">
                                <div class="font-medium">Devon Webb</div>
                                <p class="text-gray-500 text-sm mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <span class="mt-1 text-xs text-blue-400 font-medium">56 minutes ago</span>
                            </div>
                        </inertia-link>
                    </div>
                    <div class="mt-4 text-center">
                        <inertia-link href="#" class="link">View all -></inertia-link>
                    </div>
                </template>
            </slide-over>
            <slide-over ref="notificationsSlideOver" v-if="$page.props.notifications" title="Unread notifications">
                <template v-slot:trigger>
                    <button class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100">
                        <icon name="bell" solid />
                    </button>
                </template>
                <template v-slot:content>
                    <div v-if="$page.props.notifications.length > 0">
                        <inertia-link 
                            v-for="(notification, index) in $page.props.notifications"
                            :key="notification.id"
                            :href="notification.data.action"
                            @click="toggleNotificationsSlideOver"
                            class="p-4 border-b border-gray-100 hover:bg-gray-50 flex"
                        >
                            <div 
                                class="h-16 w-16 flex-shrink-0 flex-center rounded-full"
                                :class="index % 2 === 0 ?
                                    'bg-blue-100 text-blue-600':
                                    'bg-gray-200 text-gray-800'
                                "
                            >
                                <icon name="bell" solid />
                            </div>
                            <div class="ml-5">
                                <div class="font-medium">{{ notification.data.title }}</div>
                                <p class="text-gray-500 text-sm mt-1" v-html="notification.data.body" />
                                <span class="mt-1 text-xs text-blue-400 font-medium">{{ notification.created_at }}</span>
                            </div>
                        </inertia-link>
                    </div>
                    <div v-else class="p-6 text-center text-gray-500">You have no unread notifications.</div>
                </template>
            </slide-over>
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
                            <div class="font-medium">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm leading-none text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>
                    </div>
                    <breeze-dropdown-link :href="route('profile.edit')">My Profile</breeze-dropdown-link>
                    <breeze-dropdown-link :href="route('logout')" as="button" method="POST">Logout</breeze-dropdown-link>
                </template>
            </breeze-dropdown>
        </div>
    </nav>
</template>

<script>
import BreezeDropdown from "@/Components/Breeze/Dropdown";
import BreezeDropdownLink from "@/Components/Breeze/DropdownLink";
import SlideOver from "@/Components/SlideOver";

import { mapActions, mapGetters } from "vuex";

export default {
    components: {
        BreezeDropdown,
        BreezeDropdownLink,
        SlideOver,
    },
    computed: {
        ...mapGetters(["sidebarActive"]),
        user() {
            return this.$page.props.auth.user;
        }
    },
    methods: {
        ...mapActions(["toggleSidebar"]),
        toggleNotificationsSlideOver() {
            this.$refs.notificationsSlideOver.toggle();
        }
    },
};
</script>

<style scoped>
    ::placeholder {
        transition: .25s;
        font-weight: 400;
    }
    :focus::placeholder {
        color: transparent;
    }
</style>