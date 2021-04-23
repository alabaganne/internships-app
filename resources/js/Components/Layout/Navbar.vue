<template>
    <nav class="bg-white h-20 flex justify-between items-center px-4 md:px-6 shadow-sm">
        <div class="flex items-center">
            <button class="nav-icon-link xl:hidden" @click="toggleSidebar">
                <!-- Heroicon name: solid/menu -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
            <form class="ml-4 xl:ml-0 hidden lg:block" action="#" autocomplete="off">
                <label for="navbar-search" class="flex items-center w-full">
                    <button>
                        <!-- Heroicon name: solid/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <input placeholder="Search for an internships" class="ml-2 placeholder-gray-400 focus:placeholder-transparent focus:ring-0 border-none shadow-none text-base" />
                </label>
            </form>
        </div>
        <div class="flex items-center space-x-2">
            <inertia-link
                v-if="$page.props.auth.user.userable_type.includes('Student')"
                :href="route('likes.index')"
                class="p-2 text-gray-600 hover:bg-gray-100 rounded-full transition-colors duration-100 block"
                :class="{ 'text-red-600 hover:bg-red-50': $page.props.likes_count > 0 }"
            >
                <!-- Heroicon name: solid/heart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </inertia-link>
            <slide-over title="Messages">
                <template v-slot:trigger>
                    <button class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100">
                        <!-- Heroicon name: solid/chat-alt-2 -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                        </svg>
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
            <slide-over title="Notifications">
                <template v-slot:trigger>
                    <button class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-100">
                        <!-- Heroicon name: solid/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                </template>
                <template v-slot:content>
                    <div class="border-b border-gray-200">
                        <inertia-link v-for="(notification, index) in 5" :key="notification" class="border-t border-gray-200 hover:bg-gray-50 p-4 flex" href="#">
                            <div 
                                class="h-16 w-16 flex-shrink-0 flex-center rounded-full"
                                :class="index > 2 ?
                                    'bg-gray-200 text-gray-800':
                                    'bg-blue-100 text-blue-600'"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <div class="font-medium">Webspect</div>
                                <p class="text-gray-500 text-sm mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <span class="mt-1 text-xs text-blue-400 font-medium">4 hours ago</span>
                            </div>
                        </inertia-link>
                    </div>
                    <div class="mt-4 text-center">
                        <inertia-link href="#" class="link">View all -></inertia-link>
                    </div>
                </template>
            </slide-over>
            <breeze-dropdown width="w-80">
                <template v-slot:trigger>
                    <button class="px-2 flex items-center text-sm">
                        <img
                            class="h-9 w-9 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt=""
                        />
                    </button>
                </template>
                <template v-slot:content>
                    <div class="flex items-center px-5 py-4">
                        <div class="flex-shrink-0">
                            <img
                                class="h-12 w-12 rounded-full"
                                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
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
                    <breeze-dropdown-link href="#">My Profile</breeze-dropdown-link>
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
    },
    methods: {
        ...mapActions(["toggleSidebar"]),
    },
};
</script>

<style scoped>
    ::placeholder {
        transition: .25s;
        font-weight: 400;
    }
</style>