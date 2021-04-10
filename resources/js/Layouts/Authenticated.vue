<template>
    <div class="lg:flex min-h-screen bg-gray-100">
        <Sidebar />
        <div class="flex-1 text-gray-900">
            <header>
                <Navbar />
                <div v-if="title" class="px-6 lg:px-8 pt-8 flex justify-between items-center mx-auto w-full">
                    <div>
                        <span class="font-medium text-gray-500 text-sm">
                            {{ subtitle }}
                        </span>
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold">{{ title }}</h3>
                    </div>
                    <div class="flex items-center space-x-1">
                        <slot name="header-right" />
                    </div>
                </div>
            </header>
            <div class="px-6 lg:px-8 py-8 mx-auto">
                <main>
                    <slot />
                </main>
                <footer class="pt-8 text-center">
                    <span class="font-medium text-gray-500 text-sm">Designed & Developped By <a class="link hover:underline" target="_blank" href="#">Ala Baganne</a></span>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import BreezeDropdown from "@/Components/Dropdown";
import BreezeDropdownLink from "@/Components/DropdownLink";
import Sidebar from "@/Components/Layout/Sidebar";
import Navbar from "@/Components/Layout/Navbar";

export default {
    components: {
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        Sidebar,
        Navbar,
    },

    props: {
        title: {
            type: String,
        },
        subtitle: {
            type: String,
            default: "Page",
        },
    },

    computed: {
        widthClass() {
            return this.width;
        } 
    }
};
</script>
