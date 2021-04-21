<template>
    <breeze-authenticated-layout subtitle="Overview" title="Dashboard">
        <div class="grid c-grid-col-sm gap-4">
            <div
                class="bg-white rounded-lg shadow overflow-hidden"
                v-for="card in cards"
                :key="card.label"
            >
                <div class="py-6 flex items-center">
                    <div class="px-8">
                        <svg class="text-blue-400" v-html="card.icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" />
                    </div>
                    <div>
                        <div class="text-gray-500 font-medium text-sm">{{ card.label }}</div>
                        <div class="mt-0.5 text-2xl font-semibold text-gray-700">{{ card.value }}</div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50">
                    <inertia-link :href="card.link" class="link">View all -></inertia-link>
                </div>
            </div>
        </div>
        <div 
            v-if="
                $page.props.auth.user.userable_type.includes('Student')
            "
            class="mt-5 max-w-5xl"
        >
            <card v-if="applications && applications.length > 0" title="Recent Applications" subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry.">
                <div class="divide-y">
                    <application-card v-for="application in applications" :key="application.id" :application="application" />
                </div>
                <template v-slot:footer>
                    <div class="flex justify-end">
                        <inertia-link :href="route('applications.index')" class="btn btn-primary rounded-lg">View all -></inertia-link>
                    </div>
                </template>
            </card>
            <card v-else class="p-6">You didn't apply to any internship!</card>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import ApplicationCard from "@/Components/Application/Card";
import AppTable from "@/Components/Table";
import Card from "@/Components/Card";

export default {
    components: {
        BreezeAuthenticatedLayout,
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
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />`,
                    link: route('internships.index'),
                },
                {
                    label: "University Supervisors",
                    value: this.university_supervisors_count,
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />`,
                    link: route('university_supervisors.index'),
                },
                {
                    label: "Companies",
                    value: this.companies_count,
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />`,
                    link: route('companies.index'),
                },
                {
                    label: "Pending Applications",
                    value: this.applications_count,
                    icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />`,
                    link: "#",
                },
            ],
        };
    },
};
</script>
