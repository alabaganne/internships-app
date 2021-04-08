<template>
    <div class="bg-white overflow-hidden rounded-lg shadow-sm">
        <div v-if="title" class="p-6 bg-blue-600">
            <h2 class="text-3xl text-white font-semibold">
                {{ title }}
            </h2>
            <p class="mt-1 text-sm text-blue-200">{{ subtitle }}</p>
        </div>
        <div>
            <slot />
        </div>
        <div v-if="$slots['footer']" class="border-t border-gray-100 bg-gray-50">
            <slot name="footer" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        subtitle: String,
    },
};
</script>
