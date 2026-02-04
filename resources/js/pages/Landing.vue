<template>
    <div class="min-h-screen bg-gradient-to-b from-slate-50 to-white text-slate-900">
        <!-- Hero -->
        <section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    A better way to work together for
                    <span class="text-indigo-600"> tenants and landlords</span>
                </h1>
                <p class="text-lg text-slate-600 mb-8">
                    Dwellow makes the tenant–landlord relationship seamless.
                    Report issues, manage agreements, sign digitally, and stay in sync — all in one intuitive app.
                </p>
                <div class="flex gap-4 justify-center items-center">
                    <button class="px-6 py-3 rounded-2xl bg-indigo-600 text-white font-medium shadow hover:bg-indigo-700 transition">
                        Join our Wait List
                    </button>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-[4/3] rounded-3xl bg-slate-100 shadow-inner flex items-center justify-center">
                    <span class="text-slate-400">App preview</span>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="bg-slate-50 py-20">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-12">
                    Everything you need, nothing you don’t
                </h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
            <div class="max-w-5xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-12">How Dwellow works</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <Step number="1" title="Connect" description="Tenants and landlords join the same property in Dwellow." />
                    <Step number="2" title="Manage" description="Handle issues, documents, and communication in one place." />
                    <Step number="3" title="Relax" description="Less friction, fewer surprises, better relationships." />
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-indigo-600 text-white py-20">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-6">Ready to simplify renting?</h2>
                <p class="text-indigo-100 mb-8">
                    Join Dwellow and experience a smoother, more transparent tenant–landlord relationship.
                </p>
                <button class="px-8 py-3 rounded-2xl bg-white text-indigo-600 font-medium shadow hover:bg-indigo-50 transition">
                    Request Access
                </button>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 text-center text-sm text-slate-500">
            © {{ new Date().getFullYear() }} Dwellow. All rights reserved.
        </footer>
    </div>
</template>

<script setup lang="ts">
import Step from '@/components/dwellow/Step.vue';
import FeatureCard from '@/components/dwellow/FeatureCard.vue';
</script>
