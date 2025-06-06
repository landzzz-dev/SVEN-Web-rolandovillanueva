<template>
    <div>
        <header class="h-32 w-full content-center px-4 absolute z-10">
            <div class="container mx-auto w-full text-white flex gap-4 justify-between">
                <div class="flex items-center gap-2">
                    <button class="rounded-3xl bg-white p-2 hover:bg-slate-300">
                        <PawsIcon class="fill-black"></PawsIcon>
                    </button>
                    <span>PAWSTATIC</span>
                </div>
                <div class="flex gap-4">
                    <a href="" class="hover:text-slate-300 hover:underline underline-offset-4 py-2 px-3">About us</a> 
                    <a href="" class="hover:text-slate-300 hover:underline underline-offset-4 py-2 px-3">Schedule a visit</a> 
                </div>
            </div>
        </header>

        <main>
            <section>
                <Home></Home>
            </section>
    
            <section>
                <Hero></Hero>
            </section>
    
            <section class="lg:w-1/2">
                <AboutUs></AboutUs>
            </section>
        </main>
    </div>
</template>

<script setup>
import PawsIcon from './icons/PawsIcon.vue'
import Home from './pages/Home.vue';
import Hero from './pages/Hero.vue';
import AboutUs from './pages/AboutUs.vue';

</script>

<style>
@font-face {
    font-family: OpenSans-Regular;
    src: url('fonts/open-sans/OpenSans-Regular.ttf');
}

@font-face {
    font-family: OpenSans-Medium;
    src: url('fonts/open-sans/OpenSans-Medium.ttf');
}

@font-face {
    font-family: OpenSans-Bold;
    src: url('fonts/open-sans/OpenSans-Bold.ttf');
}

* {
    font-family: OpenSans-Regular;
}

.open-sans-medium {
    font-family: OpenSans-Medium;
}

.open-sans-bold {
    font-family: OpenSans-Bold;
}
</style>