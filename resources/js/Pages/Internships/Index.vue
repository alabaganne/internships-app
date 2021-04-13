<template>
    <breeze-authenticated-layout title="Internships" subtitle="View">
        <template v-slot:header-right>
            <inertia-link :href="route('internships.create')" class="btn btn-lg btn-primary">Add Internship -></inertia-link>
        </template>
        <div v-if="internships.meta.total > 0">
            <div class="flex items-start flex-col 2xl:flex-row gap-4">
                <!-- Filters -->
                <div class="flex-shrink-0 w-full 2xl:w-96 order-2 2xl:order-first mt-4 2xl:mt-0">
                    <card title="Filters" subtitle="Filter internships by City, Field of Studies or Company.">
                        <div class="sm:flex flex-wrap">
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full sm:border-b sm:border-r xl:border-b-0 2xl:border-b 2xl:border-r-0">
                                <div class="font-medium text-gray-700">Cities</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="city in cities" :key="city.id" class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">{{ city.name }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">Remote</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full border-t sm:border-t-0 sm:border-b xl:border-b-0 2xl:border-b xl:border-r 2xl:border-r-0">
                                <div class="font-medium text-gray-700">Fields of Study</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="field in fields" :key="field.id" class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">{{ field.name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full border-t sm:border-t-0">
                                <div class="font-medium text-gray-700">Companies</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="company in companies" :key="company.id" class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">{{ company.name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:border-t w-full w-96"></div>
                        </div>
                    </card>
                </div>
                <!-- Items -->
                <div>
                    <div class="space-y-4 w-full">
                        <inertia-link v-for="internship in internships.data" :key="internship.id" :href="route('internships.show', internship.id)" class="block group">
                            <card class="group-hover:bg-gray-50">
                                <div class="p-6 lg:p-8">
                                    <div class="flex justify-between">
                                        <internship-header :internship="internship" truncate />
                                        <div class="flex-shrink-0">
                                            <button @click.prevent="like" type="button" class="bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white rounded-full p-2 ml-6">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mt-3 text-gray-700 prose max-w-none">
                                        {{ $filters.truncate(internship.description, 350) }}
                                    </p>
                                    <required-skills class="mt-2" />
                                </div>
                            </card>
                        </inertia-link>
                    </div>
                    <pagination class="mt-3" :data="internships" />
                </div>
            </div>
        </div>
        <card v-else class="p-6">No records found.</card>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeLabel from "@/Components/Label";
import BreezeCheckbox from "@/Components/Checkbox";
import Card from "@/Components/Card";
import Pagination from "@/Components/Pagination";
import InternshipHeader from "./Shared/Header";
import RequiredSkills from "@/Components/DisplaySkills";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeLabel,
        BreezeCheckbox,
        Card,
        Pagination,
        InternshipHeader,
        RequiredSkills
    },
    props: {
        internships: Object,
        cities: Array,
        fields: Array,
        companies: Array
    },
    methods: {
        like() {
            console.log("like");
        },
    },
};
</script>
