<template>
    <breeze-authenticated-layout title="Students" subtitle="Profiles">
        <div class="grid c-grid-col-sm gap-4">
            <card
                v-for="student in students.data"
                :key="student.id"
            >
                <div class="px-6 py-10 flex-center flex-col">
                    <img
                        class="h-28 w-28 rounded-full object-cover"
                        src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                        :alt="student.name"
                    >
                    <div class="mt-6 text-lg font-medium">{{ student.name }}</div>
                    <div class="text-sm text-gray-500">{{ student.field }} student</div>
                </div>
                <template v-slot:footer>
                    <div class="flex divide-x">
                        <inertia-link :href="route('students.show', student.id)" class="person-card-btn">View Profile -></inertia-link>
                        <inertia-link href="#" class="person-card-btn">Contact -></inertia-link>
                    </div>
                </template>
            </card>
        </div>
        <pagination :data="students" class="mt-3" />
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "@/Components/Card";
import Pagination from '@/Components/Pagination';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Card,
        Pagination
    },
    props: {
        students: {
            type: Object,
            required: true
        }
    }
};
</script>
