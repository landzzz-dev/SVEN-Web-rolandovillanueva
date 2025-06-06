<template>
    <div class="min-h-screen w-full bg-slate-900 text-white py-10">
        <div class="container mx-auto flex flex-col gap-10">
            <div class="flex items-center gap-2">
                <button class="rounded-3xl bg-white p-2 hover:bg-slate-300">
                    <PawsIcon class="fill-black"></PawsIcon>
                </button>
                <span>PAWSTATIC</span>
            </div>
            <div class="flex flex-col gap-6">
                <p>All services include:</p>
                <li>A photo update for you along</li>
                <li>Notifications of '' arrival</li>
                <li>Treats for your pet, with yor</li>
            </div>
            <div>
                <img src="/public/images/about/puppy-1.jpg" alt="puppy-1.jpg">
            </div>
        </div>
    </div>
</template>

<script setup>
import PawsIcon from '../icons/PawsIcon.vue';

</script>

<style scoped>

</style>