<template>
    <breeze-authenticated-layout title="Internships" subtitle="View">
        <template v-slot:header-right>
            <CreateModal :fields="fields" />
        </template>
        <div>
            <div class="flex items-start flex-col 2xl:flex-row gap-4">
                <!-- Filters -->
                <div class="flex-shrink-0 w-full 2xl:w-96 order-2 2xl:order-first mt-4 2xl:mt-0">
                    <Card title="Filters" subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry.">
                        <div class="sm:flex flex-wrap">
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full sm:border-b sm:border-r xl:border-b-0 2xl:border-b 2xl:border-r-0">
                                <div class="font-medium text-gray-700">Cities</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="city in 5" :key="city" class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">Monastir</span>
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
                                    <div v-for="city in 5" :key="city" class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">Computer Science</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:w-1/2 xl:w-1/3 2xl:w-full border-t sm:border-t-0">
                                <div class="font-medium text-gray-700">Companies</div>
                                <div class="mt-4 space-y-3">
                                    <div v-for="city in 5" :key="city" class="flex items-center">
                                        <breeze-checkbox :value="false" />
                                        <span class="ml-2">Realinflo</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:border-t w-full w-96"></div>
                        </div>
                    </Card>
                </div>
                <!-- Items -->
                <div class="space-y-4">
                    <inertia-link v-for="internship in internships.data" :key="internship.id" :href="route('internships.show', internship.id)" class="block group">
                        <Card class="group-hover:bg-gray-50">
                            <div class="p-6 lg:p-8">
                                <div class="flex justify-between">
                                    <InternshipHeader :internship="internship" truncate />
                                    <div class="flex-shrink-0">
                                        <button @click.prevent="like" type="button" class="bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white rounded-full p-2 ml-6">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <p class="mt-3 text-gray-700 prose max-w-none">
                                    {{ $filters.truncate(internship.description, 50) }}
                                </p>
                                <RequiredSkills class="mt-2" />
                            </div>
                        </Card>
                    </inertia-link>
                    <Pagination />
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "../../Components/Label";
import BreezeCheckbox from "@/Components/Checkbox";
import Pagination from "@/Components/Pagination";
import Card from "@/Components/Card";
import Modal from "@/Components/Modal";
import CreateModal from "./Create";
import InternshipHeader from "./Shared/Header";
import RequiredSkills from "./Shared/Skills";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeCheckbox,
        Pagination,
        Card,
        Modal,
        CreateModal,
        InternshipHeader,
        RequiredSkills
    },
    props: {
        internships: Object,
        fields: Array,
        success: Object,
    },
    mounted() {
        console.log("internships", this.internships);
        console.log("success", this.success);
    },
    methods: {
        like() {
            console.log("like");
        },
    },
};
</script>
