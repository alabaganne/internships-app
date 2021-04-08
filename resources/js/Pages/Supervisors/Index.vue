<template>
    <breeze-authenticated-layout title="Supervisors" subtitle="Contact">
        <div class="grid c-grid-col-sm gap-4">
            <Card
                v-for="item in 12"
                :key="item"
                name="Jane Cooper"
                field="Electronics teacher"
            >
                <div class="px-6 py-10 flex-center flex-col">
                    <img
                        class="h-28 w-28 rounded-full object-cover"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                        alt="Jane Cooper"
                    >
                    <div class="mt-6 text-lg font-medium">Jane Cooper</div>
                    <div class="text-sm text-gray-500">Electronics teacher</div>
                </div>
                <template v-slot:footer>
                    <div class="flex divide-x">
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
        Card,
    },
};
</script>
