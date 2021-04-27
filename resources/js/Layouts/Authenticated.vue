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
                <card v-if="session && showAlert" class="mb-4 px-5 py-4 flex items-center">
                    <svg v-if="session.action === 'store'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <svg v-if="session.action === 'update'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                        <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                    </svg>
                    <svg v-if="session.action === 'destroy'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <p class="ml-3 mr-auto text-sm text-gray-600" v-html="session.message"></p>
                    <button type="button" @click="showAlert = false;" class="text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </card>
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
import Card from "@/Components/Card";

export default {
    components: {
        Sidebar,
        Navbar,
        Card,
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
    data() {
        return {
            showAlert: true,
        }
    },
    computed: {
        widthClass() {
            return this.width;
        },
        session() {
            return this.$page.props.session;
        }
    }
};
</script>
