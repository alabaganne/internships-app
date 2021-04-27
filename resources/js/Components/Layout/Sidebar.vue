<template>
    <aside id="sidebar" v-show="sidebarActive" class="w-80 bg-gray-800 text-white flex-shrink-0 fixed top-0 min-h-screen lg:relative z-50">
        <div class="h-20 px-6 flex justify-between items-center">
            <span class="text-3xl font-semibold">LOGO</span>
            <button @click="toggleSidebar" class="text-gray-400 hover:text-gray-200 lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="px-2 space-y-1">
            <template v-for="link in mainLinks" :key="link.name">
                <inertia-link v-if="link.show" class="sidebar-link" :class="{ active: route().current(`${link.name.split('.')[0]}*`) }" :href="route(link.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor" v-html="link.icon" />
                    <span class="ml-4">{{ link.label }}</span>
                </inertia-link>
            </template>
        </div>
        <div class="border-t border-white border-opacity-10 mt-6 pt-6 px-2 space-y-1">
            <inertia-link v-for="link in secondaryLinks" :key="link.name" class="sidebar-link" :href="route(link.name)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor" v-html="link.icon" />
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
                    name: "dashboard",
                    label: "Dashboard",
                    icon: `<path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />`,
                    show: true,
                },
                {
                    name: "applications.index",
                    label: "Applications",
                    icon: `<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" /> <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />`,
                    show: !this.$page.props.auth.user.userable_type.includes('supervisor')
                },
                {
                    name: "internships.index",
                    label: "Internships",
                    icon: `<path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" /> <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />`,
                    show: true,
                },
                {
                    name: "companies.index",
                    label: "Companies",
                    icon: `<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />`,
                    show: true,
                },
                {
                    name: "students.index",
                    label: "Students",
                    icon: `<path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />`,
                    show: true,
                },
                {
                    name: "university_supervisors.index",
                    label: "University Supervisors",
                    icon: `<path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />`,
                    show: true,
                },
                {
                    name: "fields.index",
                    label: "Fields of Studies",
                    icon: `<path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd" />`,
                    show: true,
                },
            ],
            secondaryLinks: [
                {
                    name: "home",
                    label: "Home",
                    icon: `<path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />`,
                },
                {
                    name: "about",
                    label: "About",
                    icon: `<path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" /> <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />`,
                },
                {
                    name: "contact",
                    label: "Contact us",
                    icon: `<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /> <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />`,
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
