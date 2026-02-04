<template>
    <transition name="fade">
        <div
            v-if="open"
            class="fixed inset-0 z-50 flex items-center justify-center"
        >
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/50" @click="emit('close')" />

            <!-- Modal -->
            <div
                class="relative w-full max-w-lg rounded-3xl bg-white p-8 shadow-xl"
            >
                <h3 class="mb-2 text-2xl font-bold text-slate-900">
                    Join the Dwellow wait list
                </h3>
                <p class="mb-6 text-slate-600">
                    Tell us a bit about yourself and we’ll be in touch.
                </p>

                <form class="space-y-6" @submit.prevent="handleSubmit">
                    <!-- Name -->
                    <div>
                        <label
                            class="mb-1 block text-sm font-medium text-slate-700"
                        >
                            Name
                        </label>
                        <input
                            v-model="form.name"
                            type="text"
                            required
                            class="w-full rounded-xl border border-slate-300 px-4 py-2 text-slate-600 focus:border-indigo-500 focus:outline-none"
                        />
                    </div>

                    <!-- Email -->
                    <div>
                        <label
                            class="mb-1 block text-sm font-medium text-slate-700"
                        >
                            Email
                        </label>
                        <input
                            v-model="form.email"
                            type="email"
                            required
                            class="w-full rounded-xl border border-slate-300 px-4 py-2 text-slate-600 focus:border-indigo-500 focus:outline-none"
                        />
                    </div>

                    <!-- Role -->
                    <div>
                        <p class="mb-2 text-sm font-medium text-slate-700">
                            I am a…
                        </p>
                        <div class="flex gap-4">
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="tenant"
                                    v-model="form.role"
                                />
                                Tenant
                            </label>
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="landlord"
                                    v-model="form.role"
                                />
                                Landlord
                            </label>
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="both"
                                    v-model="form.role"
                                />
                                Both
                            </label>
                        </div>
                    </div>

                    <!-- Properties -->
                    <div>
                        <p class="mb-2 text-sm font-medium text-slate-700">
                            Number of properties
                        </p>
                        <div class="grid grid-cols-2 gap-3">
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="1"
                                    v-model="form.properties"
                                />
                                1
                            </label>
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="2-10"
                                    v-model="form.properties"
                                />
                                2–10
                            </label>
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="10-50"
                                    v-model="form.properties"
                                />
                                10–50
                            </label>
                            <label
                                class="flex items-center gap-2 text-slate-600"
                            >
                                <input
                                    type="radio"
                                    value="50+"
                                    v-model="form.properties"
                                />
                                50+
                            </label>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-center gap-3 pt-4">
                        <button
                            type="submit"
                            :disabled="!isValid"
                            class="rounded-xl px-6 py-2 font-medium text-white transition"
                            :class="
                                isValid
                                    ? 'bg-indigo-600 hover:bg-indigo-700'
                                    : 'cursor-not-allowed bg-slate-300'
                            "
                        >
                            Join Wait List
                        </button>
                        <button
                            type="button"
                            @click="emit('close')"
                            class="rounded-xl px-4 py-2 text-slate-600 hover:bg-slate-100"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </transition>
</template>

<script setup lang="ts">
import { reactive, computed } from 'vue';

defineProps<{ open: boolean }>();
const emit = defineEmits(['close', 'submit']);

const form = reactive({
    name: '',
    email: '',
    role: '',
    properties: '',
});

const isValid = computed(() => {
    return (
        form.name.trim().length > 0 &&
        form.email.trim().length > 0 &&
        form.role.length > 0 &&
        form.properties.length > 0
    );
});

const handleSubmit = () => {
    emit('submit', { ...form });
    emit('close');
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
