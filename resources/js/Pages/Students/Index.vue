<template>
    <breeze-authenticated-layout title="Students" subtitle="Profiles">
        <div class="grid c-grid-col-sm gap-4">
            <Card
                v-for="item in 12"
                :key="item"
                name="Jane Cooper"
                field="Computer science student"
            >
                <div class="px-6 py-10 flex-center flex-col">
                    <img
                        class="h-28 w-28 rounded-full object-cover"
                        src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Wade Cooper"
                    >
                    <div class="mt-6 text-lg font-medium">Wade Cooper</div>
                    <div class="text-sm text-gray-500">Computer science student</div>
                </div>
                <template v-slot:footer>
                    <div class="flex divide-x">
                        <inertia-link href="#" class="person-card-btn">View Profile -></inertia-link>
                        <inertia-link href="#" class="person-card-btn">Contact -></inertia-link>
                    </div>
                </template>
            </Card>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Card from "../../Components/Card";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Card
    },
};
</script>
