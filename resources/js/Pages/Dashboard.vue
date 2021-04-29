<template>
    <main-layout subtitle="Overview" title="Dashboard">
        <div class="grid c-grid-col-sm gap-4">
            <template
                v-for="card in cards"
                :key="card.label"
            >
                <div v-if="card.show" class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="py-6 flex items-center">
                        <div class="px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400" viewBox="0 0 20 20" fill="currentColor" v-html="card.icon" />
                        </div>
                        <div>
                            <div class="text-gray-500 text-sm uppercase">{{ card.label }}</div>
                            <div class="mt-0.5 text-3xl font-extrabold">{{ card.value }}</div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        <inertia-link :href="card.link" class="link">View all -></inertia-link>
                    </div>
                </div>
            </template>
        </div>
        <div 
            v-if="!$page.props.auth.user.userable_type.includes('supervisor')"
            class="mt-5 max-w-5xl"
        >
            <card v-if="applications" title="Recent Applications" subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry.">
                <div v-if="applications.length > 0" class="divide-y">
                    <application-card v-for="application in applications" :key="application.id" :application="application" />
                </div>
                <template v-if="applications.length >= 4" v-slot:footer>
                    <div class="flex justify-end">
                        <inertia-link :href="route('applications.index')" class="btn btn-primary rounded-lg">View all -></inertia-link>
                    </div>
                </template>
                <div v-if="applications.length === 0" class="p-6">No records found.</div>
            </card>
        </div>
    </main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import ApplicationCard from "@/Components/Application/Card";
import AppTable from "@/Components/Table";
import Card from "@/Components/Card";

export default {
    components: {
        MainLayout,
        ApplicationCard,
        AppTable,
        Card
    },
    props: {
        internships_count: Number,
        university_supervisors_count: Number,
        companies_count: Number,
        applications_count: Number,
        applications: Array,
    },
    data() {
        return {
            cards: [
                {
                    label: "Open Internships",
                    value: this.internships_count,
                    icon: `<path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" /><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />`,
                    link: route('internships.index'),
                    show: true,
                },
                {
                    label: "University Supervisors",
                    value: this.university_supervisors_count,
                    icon: `<path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />`,
                    link: route('university_supervisors.index'),
                    show: true,
                },
                {
                    label: "Companies",
                    value: this.companies_count,
                    icon: `<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />`,
                    link: route('companies.index'),
                    show: true,
                },
                {
                    label: "Pending Applications",
                    value: this.applications_count,
                    icon: `<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" /> <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />`,
                    link: "#",
                    show: this.$page.props.auth.user.userable_type === 'student' || this.$page.props.auth.user.userable_type === 'company' 
                },
            ],
        };
    },
};
</script>
