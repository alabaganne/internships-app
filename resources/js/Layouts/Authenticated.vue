<template>
	<div class="flex min-h-screen bg-gray-100">
		<toast :toast="$page.props.toast" />

		<sidebar :key="url()" />
		<div class="flex-1 flex flex-col text-gray-900">
			<navbar />
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
};
</script>
