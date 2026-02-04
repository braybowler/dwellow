<script setup lang="ts">

defineProps({
    number: String,
    title: String,
    description: String
})

</script>

<template>
    <div class="p-6">
        <div
            class="mx-auto mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 font-bold text-white"
        >
            {{ number }}
        </div>
        <h3 class="mb-2 text-lg font-semibold">{{ title }}</h3>
        <p class="text-slate-600">{{ description }}</p>
    </div>
</template>

<style scoped></style>
