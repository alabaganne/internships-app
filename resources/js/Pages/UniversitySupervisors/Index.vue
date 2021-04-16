<template>
    <breeze-authenticated-layout title="Supervisors" subtitle="Contact">
        <template v-slot:header-right>
            <inertia-link :href="route('university_supervisors.create')" class="btn btn-lg btn-primary">Add University Supervisor -></inertia-link>
        </template>
        <div class="grid c-grid-col-sm gap-4">
            <div
                v-for="supervisor in university_supervisors.data"
                :key="supervisor.id"
                class="bg-white rounded-lg shadow"
            >
                <div class="px-6 py-10 flex-center flex-col">
                    <img
                        class="h-28 w-28 rounded-full object-cover"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                        :alt="supervisor.name"
                    >
                    <div class="mt-6 text-lg font-medium">{{ supervisor.name }}</div>
                    <div class="text-sm text-gray-500">{{ supervisor.field }} teacher</div>
                </div>
                <div class="border-t bg-gray-50 bg-opacity-50">
                    <div class="flex divide-x">
                        <inertia-link href="#" class="person-card-btn">Contact -></inertia-link>
                    </div>
                </div>
            </div>
        </div>
        <pagination class="mt-3" :data="university_supervisors" />
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Pagination from '@/Components/Pagination';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Pagination,
    },
    props: {
        university_supervisors: Object
    }
};
</script>
