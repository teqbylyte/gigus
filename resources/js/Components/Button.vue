<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});

</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-secondary-800 border border-transparent rounded-xl font-semibold text-xs text-white tracking-widest hover:bg-secondary-600 active:bg-secondary-900 focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>
