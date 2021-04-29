<template>
    <main-layout title="Supervisors" subtitle="Contact">
        <template v-slot:header-right>
            <inertia-link :href="route('university_supervisors.create')" class="btn btn-lg btn-primary">Add University Supervisor -></inertia-link>
        </template>
        <div v-if="university_supervisors.data.length > 0">
            <div class="grid c-grid-col-sm gap-4">
                <card v-for="supervisor in university_supervisors.data" :key="supervisor.id">
                    <div class="pt-10 pb-6 flex-center flex-col">
                        <img
                            class="h-28 w-28 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                            :alt="supervisor.name"
                        >
                        <div class="mt-6 text-lg font-medium">{{ supervisor.name }}</div>
                        <div class="text-sm text-gray-500">{{ supervisor.field }} Teacher</div>
                        <div class="mt-4 flex items-center space-x-1">
                            <inertia-link :href="route('university_supervisors.edit', supervisor)" class="btn btn-sm btn-dark">Edit -></inertia-link>
                        </div>
                    </div>
                    <div class="border-t">
                        <inertia-link class="flex-1 px-2 py-4 text-sm font-medium hover:bg-gray-50 flex-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            Contact
                        </inertia-link>
                    </div>
                </card>
            </div>
            <pagination class="mt-4" :data="university_supervisors" />
        </div>
        <card v-else class="p-6">
            There's no university supervisors in the database.
        </card>
    </main-layout>
</template>

<script>
import MainLayout from "@/Layouts/Main";
import Pagination from '@/Components/Pagination';
import Card from "@/Components/Card";

export default {
    components: {
        MainLayout,
        Pagination,
        Card
    },
    props: {
        university_supervisors: Object
    }
};
</script>
