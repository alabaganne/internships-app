<template>
    <nav class="bg-white h-20 flex justify-between items-center px-4 md:px-6 shadow-sm">
        <div class="flex items-center">
            <button class="nav-icon-link xl:hidden" @click="toggleSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <form class="ml-4 xl:ml-0 hidden lg:block" action="#" autocomplete="off">
                <label for="navbar-search" class="flex items-center w-full">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <input id="navbar-search" placeholder="Search internships" class="focus:placeholder-transparent focus:ring-0 border-none shadow-none text-base" />
                </label>
            </form>
        </div>
        <div class="flex items-center space-x-2">
            <inertia-link href="#">
                <!-- Likes -->
                <button class="nav-icon-link">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            </inertia-link>
            <SlideOver title="Messages">
                <template v-slot:trigger>
                    <button class="nav-icon-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </button>
                </template>
                <template v-slot:content>
                    <div class="border-b border-gray-200">
                        <inertia-link v-for="item in 5" :key="item" class="border-t border-gray-200 hover:bg-gray-50 p-4 flex items-center" href="#">
                            <img 
                                class="h-20 w-20 rounded-full"
                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Devon Webb"
                            >
                            <div class="ml-5">
                                <div class="font-medium">Devon Webb</div>
                                <p class="text-gray-500 text-sm mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <span class="mt-2 text-xs text-blue-400 font-medium">56 minutes ago</span>
                            </div>
                        </inertia-link>
                    </div>
                    <div class="mt-4 text-center">
                        <inertia-link href="#" class="link">View all -></inertia-link>
                    </div>
                </template>
            </SlideOver>
            <SlideOver title="Notifications">
                <template v-slot:trigger>
                    <!-- apply those styles only when there's a new notification/message: bg-gray-600 text-white -->
                    <button class="nav-icon-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </template>
                <template v-slot:content>
                    <div class="border-b border-gray-200">
                        <inertia-link v-for="item in 5" :key="item" class="border-t border-gray-200 hover:bg-gray-50 p-4 flex" href="#">
                            <div 
                                class="h-16 w-16 flex-shrink-0 flex-center rounded-full"
                                :class="item % 2 === 0 ?
                                    'bg-gray-200 text-gray-800':
                                    'bg-green-100 text-green-800'"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <div class="font-medium">Webspect</div>
                                <p class="text-gray-500 text-sm mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <span class="mt-2 text-xs text-blue-400 font-medium">56 minutes ago</span>
                            </div>
                        </inertia-link>
                    </div>
                    <div class="mt-4 text-center">
                        <inertia-link href="#" class="link">View all -></inertia-link>
                    </div>
                </template>
            </SlideOver>
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
                            <div class="text-base font-medium">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium leading-none text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>
                    </div>
                    <breeze-dropdown-link href="#">My Profile</breeze-dropdown-link>
                    <breeze-dropdown-link href="#">Settings</breeze-dropdown-link>
                    <breeze-dropdown-link :href="route('logout')" as="button" method="POST">Logout</breeze-dropdown-link>
                </template>
            </breeze-dropdown>
        </div>
    </nav>
</template>

<script>
import BreezeDropdown from "@/Components/Dropdown";
import BreezeDropdownLink from "@/Components/DropdownLink";
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
