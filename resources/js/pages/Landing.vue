<template>
    <div
        class="min-h-screen bg-gradient-to-b from-slate-50 to-white text-slate-900"
    >
        <!-- Hero -->
        <section
            class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 md:grid-cols-2"
        >
            <div>
                <h1 class="mb-6 text-4xl leading-tight font-bold md:text-5xl">
                    A better way to work together for
                    <span class="text-indigo-600"> tenants and landlords</span>
                </h1>
                <p class="mb-8 text-lg text-slate-600">
                    Dwellow makes the tenant–landlord relationship seamless.
                    Report issues, manage agreements, sign digitally, and stay
                    in sync — all in one intuitive app.
                </p>
                <div class="flex items-center justify-center gap-4">
                    <button
                        @click="handleWaitListClick"
                        class="rounded-2xl bg-indigo-600 px-6 py-3 font-medium text-white shadow transition hover:bg-indigo-700"
                    >
                        Join Wait List
                    </button>
                </div>
            </div>
            <div class="relative">
                <div
                    class="flex aspect-4/3 items-center justify-center rounded-3xl bg-slate-100 shadow-inner"
                >
                    <span class="text-slate-400">App preview</span>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-6">
                <h2 class="mb-12 text-center text-3xl font-bold">
                    Everything you need, nothing you don’t
                </h2>
                <div class="mb-10 flex justify-center">
                    <div class="inline-flex rounded-2xl bg-slate-200 p-1">
                        <button
                            @click="audience = 'landlord'"
                            class="rounded-xl px-4 py-2 text-sm font-medium transition"
                            :class="
                                audience === 'landlord'
                                    ? 'bg-indigo-600 text-white shadow'
                                    : 'text-slate-600 hover:text-slate-900'
                            "
                        >
                            Landlord
                        </button>

                        <button
                            @click="audience = 'tenant'"
                            class="rounded-xl px-4 py-2 text-sm font-medium transition"
                            :class="
                                audience === 'tenant'
                                    ? 'bg-indigo-600 text-white shadow'
                                    : 'text-slate-600 hover:text-slate-900'
                            "
                        >
                            Tenant
                        </button>
                    </div>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <FeatureCard
                        v-for="feature in activeFeatures"
                        :key="feature.title"
                        :title="feature.title"
                        :description="feature.description"
                    />
                </div>
            </div>
        </section>

        <!-- How it works -->
        <section class="py-20">
            <div class="mx-auto max-w-5xl px-6 text-center">
                <h2 class="mb-12 text-3xl font-bold">How Dwellow works</h2>
                <div class="grid gap-8 md:grid-cols-3">
                    <Step
                        number="1"
                        title="Connect"
                        description="Tenants and landlords join the same property in Dwellow."
                    />
                    <Step
                        number="2"
                        title="Manage"
                        description="Handle issues, documents, and communication in one place."
                    />
                    <Step
                        number="3"
                        title="Relax"
                        description="Less friction, fewer surprises, better relationships."
                    />
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-indigo-600 py-20 text-white">
            <div class="mx-auto max-w-4xl px-6 text-center">
                <h2 class="mb-6 text-3xl font-bold">
                    Ready to simplify renting?
                </h2>
                <p class="mb-8 text-indigo-100">
                    Join Dwellow and experience a smoother, more transparent
                    tenant–landlord relationship.
                </p>
                <button
                    @click="handleWaitListClick"
                    class="rounded-2xl bg-white px-8 py-3 font-medium text-indigo-600 shadow transition hover:bg-indigo-50"
                >
                    Join Wait List
                </button>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 text-center text-sm text-slate-500">
            © {{ new Date().getFullYear() }} Dwellow. All rights reserved.
        </footer>
    </div>

    <div
        v-if="flashSuccessToastMessage"
        class="fixed inset-x-0 bottom-4 z-50 flex justify-center px-4"
    >
        <div
            class="flex w-full max-w-md items-center justify-between gap-4 rounded-2xl bg-indigo-600 px-5 py-4 text-white shadow-xl ring-1 ring-black/10 backdrop-blur"
        >
            <p class="text-sm font-medium">
                You're on the waitlist 🎉 We'll be in touch soon.
            </p>

            <button
                @click="handleSuccessToastMessageDismissal"
                class="rounded-lg bg-white/10 px-3 py-1 text-xs font-medium transition hover:bg-white/20"
            >
                Dismiss
            </button>
        </div>
    </div>

    <div
        v-if="flashErrorToastMessage"
        class="fixed inset-x-0 bottom-4 z-50 flex justify-center px-4"
    >
        <div
            class="flex w-full max-w-md items-center justify-between gap-4 rounded-2xl bg-orange-400 px-5 py-4 text-white shadow-xl ring-1 ring-black/10 backdrop-blur"
        >
            <p class="text-sm font-medium">
                Something went wrong. Please try again.
            </p>

            <button
                @click="handleErrorToastMessageDismissal"
                class="rounded-lg bg-white/10 px-3 py-1 text-xs font-medium transition hover:bg-white/20"
            >
                Dismiss
            </button>
        </div>
    </div>

    <WaitlistModal
        :open="showWaitListForm"
        @close="showWaitListForm = false"
        @submit="handleWaitListSubmit"
    />
</template>

<script setup lang="ts">
import Step from '@/components/dwellow/Step.vue';
import FeatureCard from '@/components/dwellow/FeatureCard.vue';
import { computed, ref } from 'vue';
import WaitlistModal from '@/components/dwellow/WaitlistModal.vue';
import { InertiaForm } from '@inertiajs/vue3';

const showWaitListForm = ref(false);
const flashSuccessToastMessage = ref(false);
const flashErrorToastMessage = ref(false);

const audience = ref<'landlord' | 'tenant'>('landlord');

const features = {
    landlord: [
        {
            title: 'Maintenance & Incident Reporting',
            description:
                'Receive and manage tenant issues quickly, track status, and keep records organized.',
        },
        {
            title: 'Contracts & Agreements',
            description:
                'Store leases, addenda, and documents securely with easy access anytime.',
        },
        {
            title: 'Digital Signing',
            description:
                'Send and sign lease documents digitally with tenants — fast and compliant.',
        },
        {
            title: 'Reminders & Appointments',
            description:
                'Stay on top of inspections, renewals, and important property tasks.',
        },
        {
            title: 'Built-in Communication',
            description:
                'Keep conversations with tenants centralized and searchable.',
        },
    ],

    tenant: [
        {
            title: 'Maintenance & Incident Reporting',
            description:
                'Report issues in seconds and stay updated without chasing your landlord.',
        },
        {
            title: 'Contracts & Agreements',
            description:
                'Access your lease and documents whenever you need them.',
        },
        {
            title: 'Digital Signing',
            description:
                'Review and sign rental documents easily from any device.',
        },
        {
            title: 'Reminders & Appointments',
            description:
                'Never miss inspections, payments, or important rental dates.',
        },
        {
            title: 'Built-in Communication',
            description:
                'Message your landlord in one organized, reliable place.',
        },
    ],
};

const activeFeatures = computed(() => features[audience.value]);

const handleWaitListClick = () => {
    showWaitListForm.value = true;
};
const handleSuccessToastMessageDismissal = () => {
    flashSuccessToastMessage.value = false;
};

const handleErrorToastMessageDismissal = () => {
    flashErrorToastMessage.value = false;
};

const handleWaitListSubmit = (form: InertiaForm<any>) => {
    form.post('/waitlist', {
        preserveScroll: true,
        onSuccess: () => (flashSuccessToastMessage.value = true),
        onError: () => (flashErrorToastMessage.value = true),
    });
};
</script>
