<script setup lang="ts">

defineProps({
    title: String,
    description: String
})

</script>

<template>
    <div class="rounded-3xl bg-white p-6 shadow transition hover:shadow-md">
        <h3 class="mb-3 text-xl font-semibold">{{ title }}</h3>
        <p class="text-slate-600">{{ description }}</p>
    </div>
</template>

<style scoped></style>
