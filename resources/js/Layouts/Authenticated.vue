<template>
    <div class="lg:flex min-h-screen bg-gray-100">
        <Toast :toast="$page.props.toast" />

        <Sidebar :key="url()" />
        <div class="flex-1 text-gray-900">
            <Navbar />
            <slot />
        </div>
    </div>
</template>

<script>
import Sidebar from './Partials/Sidebar';
import Navbar from './Partials/Navbar';
import Toast from './Partials/Toast';

export default {
    components: { Sidebar, Navbar, Toast },
    methods: {
        url() {
            return location.pathname.substr(1)
        },
    }
};
</script>
