<template>
    <breeze-authenticated-layout title="Internships" subtitle="View">
        <template v-slot:header-right>
            <inertia-link v-if="user.userable_type === 'company'" :href="route('internships.create')" class="btn btn-lg btn-primary">Add Internship -></inertia-link>
        </template>
        <div v-if="internships.meta.total > 0">
            <div class="flex items-start flex-col 2xl:flex-row gap-4">
                <!-- Filters -->
                <div class="flex-shrink-0 w-full 2xl:w-96 order-2 2xl:order-first mt-4 2xl:mt-0">
                    <card title="Filters" subtitle="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
                        <div class="sm:flex flex-wrap">
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full sm:border-b sm:border-r xl:border-b-0 2xl:border-b 2xl:border-r-0">
                                <div class="font-medium text-gray-700">Cities</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="city in cities" :key="city.id" class="flex items-center">
                                        <input type="checkbox" />
                                        <span class="ml-2">{{ city.name }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" />
                                        <span class="ml-2">Remote</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full border-t sm:border-t-0 sm:border-b xl:border-b-0 2xl:border-b xl:border-r 2xl:border-r-0">
                                <div class="font-medium text-gray-700">Fields of Study</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="field in fields" :key="field.id" class="flex items-center">
                                        <input type="checkbox" />
                                        <span class="ml-2">{{ field.name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full border-t sm:border-t-0">
                                <div class="font-medium text-gray-700">Companies</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="company in companies" :key="company.id" class="flex items-center">
                                        <input type="checkbox" :value="false" />
                                        <span class="ml-2">{{ company.name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:border-t w-full w-96"></div>
                        </div>
                    </card>
                </div>
                <!-- Items with Pagination -->
                <div class="space-y-4 w-full">
                    <div v-for="internship in internships.data" :key="internship.id">
                        <internship-card :internship="internship" />
                    </div>
                    <pagination :data="internships" />
                </div>
            </div>
        </div>
        <card v-else class="p-6">No records found.</card>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import InternshipCard from "@/Components/Internship/Card";
import Pagination from "@/Components/Pagination";
import Skills from "@/Components/Skills";
import Card from "@/Components/Card";

export default {
    components: {
        BreezeAuthenticatedLayout,
        InternshipCard,
        Pagination,
        Skills,
        Card
    },
    props: {
        internships: Object,
        cities: Array,
        fields: Array,
        companies: Array
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    },
    methods: {
        like() {
            console.log("like");
        },
    },
};
</script>
