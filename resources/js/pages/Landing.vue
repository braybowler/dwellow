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
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <FeatureCard
                        title="Maintenance & Incident Reporting"
                        description="Report issues in seconds, track progress, and keep everyone informed without endless emails or texts."
                    />
                    <FeatureCard
                        title="Contracts & Agreements"
                        description="Securely store, review, and access leases and documents whenever you need them."
                    />
                    <FeatureCard
                        title="Digital Signing"
                        description="Sign and send documents digitally — fast, legally sound, and paper-free."
                    />
                    <FeatureCard
                        title="Reminders & Appointments"
                        description="Never miss an inspection, payment, or renewal with smart reminders."
                    />
                    <FeatureCard
                        title="Built-in Communication"
                        description="Keep all tenant–landlord conversations in one place, organized and searchable."
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

    <WaitlistModal
        :open="showWaitListForm"
        @close="showWaitListForm = false"
        @submit="handleWaitListSubmit"
    />
</template>

<script setup lang="ts">
import Step from '@/components/dwellow/Step.vue';
import FeatureCard from '@/components/dwellow/FeatureCard.vue';
import { ref } from 'vue';
import WaitlistModal from '@/components/dwellow/WaitlistModal.vue';

const showWaitListForm = ref(false);

const handleWaitListClick = () => {
    showWaitListForm.value = true;
};

const handleWaitListSubmit = (data: {
    name: string;
    email: string;
    role: string;
    properties: string;
}) => {
    console.log('Waitlist submission:', data);
    // POST to API / store / analytics hook
};
</script>
