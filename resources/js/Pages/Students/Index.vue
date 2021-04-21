<template>
    <breeze-authenticated-layout title="Students" subtitle="Profiles">
        <template v-slot:header-right>
            <inertia-link :href="route('students.create')" class="btn btn-lg btn-primary">Add Student -></inertia-link>
        </template>
        <div class="grid c-grid-col-sm gap-4">
            <card v-for="student in students.data" :key="student.id">
                <div class="px-6 py-10 flex-center flex-col">
                    <img
                        class="h-28 w-28 rounded-full object-cover"
                        src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                        :alt="student.name"
                    >
                    <div class="mt-6 text-lg font-medium">{{ student.name }}</div>
                    <div class="text-sm text-gray-500">{{ student.field }} Student</div>
                </div>
                <div class="border-t flex divide-x">
                    <inertia-link class="flex-1 px-2 py-4 text-sm font-medium hover:bg-gray-50 flex-center" :href="route('students.show', student.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        Profile
                    </inertia-link>
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
        <pagination :data="students" class="mt-4" />
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Pagination from "@/Components/Pagination";
import Card from "@/Components/Card";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Pagination,
        Card
    },
    props: {
        students: {
            type: Object,
            required: true
        }
    }
};
</script>
