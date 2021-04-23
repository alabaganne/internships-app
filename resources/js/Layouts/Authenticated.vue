<template>
    <div class="lg:flex min-h-screen bg-gray-100">
        <sidebar />
        <div class="flex-1 text-gray-700">
            <navbar />
            <div class="px-6 lg:px-8 py-8 mx-auto" :class="maxWidthClass">
                <header v-if="title" class="pb-8 flex justify-between items-center mx-auto w-full">
                    <div>
                        <span class="text-sm text-gray-500 font-medium uppercase">{{ subtitle }}</span>
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl text-gray-900 font-extrabold">{{ title }}</h3>
                    </div>
                    <div class="flex items-center space-x-1">
                        <slot name="header-right" />
                    </div>
                </header>
                <main>
                    <slot />
                </main>
                <footer class="px-8 pt-8 text-center">
                    <span class="font-medium text-gray-500 text-sm">Designed & Developped By <a class="link hover:underline" target="_blank" href="#">Ala Baganne</a></span>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from "@/Components/Layout/Sidebar";
import Navbar from "@/Components/Layout/Navbar";

export default {
    components: {
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
        maxWidthClass: {
            type: String,
            default: "",
        }
    },

    computed: {
        widthClass() {
            return this.width;
        } 
    }
};
</script>
