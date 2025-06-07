<template>
    <div class="min-h-screen w-full bg-slate-900 text-white flex flex-col">
        <div class="container mx-auto flex flex-col gap-10 flex-grow place-items-center justify-center">
            <div class="flex flex-col gap-6 px-4">
                <div class="flex items-center gap-2">
                    <button @click="scrollToTop()" class="rounded-3xl bg-red-100 p-2 hover:bg-gray-300">
                        <PawsIcon class="fill-black"></PawsIcon>
                    </button>
                    <span class="text-2xl">PAWSTATIC</span>
                </div>
                <p class="font-bold text-xl">All services include:</p>
                <li>A photo update for you along</li>
                <li>Notifications of sitter arrival</li>
                <li>Treats for your pet, with your approval</li>
            </div>
        </div>
        <div class="flex-shrink-0">
            <img class="w-full object-cover" src="/public/images/about/puppy-1.jpg" alt="puppy-1.jpg">
        </div>
    </div>
</template>

<script setup>
import PawsIcon from '../icons/PawsIcon.vue';

function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}
</script>