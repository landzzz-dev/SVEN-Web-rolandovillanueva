<template>
    <div>
        <header class="h-32 w-full content-center absolute z-10">
            <div class="container mx-auto w-full text-white flex gap-4 justify-between px-4">
                <div class="flex items-center gap-2">
                    <button class="rounded-3xl bg-white p-2 hover:bg-gray-300">
                        <PawsIcon class="fill-black"></PawsIcon>
                    </button>
                    <span class="text-2xl hidden sm:block">PAWSTATIC</span>
                </div>
                <div class="flex gap-4">
                    <button @click="scrollTo('about_us')" class="hover:text-gray-200 hover:underline underline-offset-4 py-2 px-3 text-xl">About us</button> 
                    <button @click="scrollTo('appointment_form')" class="hover:text-gray-200 hover:underline underline-offset-4 py-2 px-3 text-xl">Schedule a visit</button> 
                </div>
            </div>
        </header>

        <main>
            <section>
                <Home @scroll="scrollTo"></Home>
            </section>
            <section>
                <Hero @scroll="scrollTo"></Hero>
            </section>
            <section class="lg:flex">
                <AboutUs id="about_us" class="lg:w-2/5"></AboutUs>
                <AppointmentForm id="appointment_form" class="lg:w-3/5"></AppointmentForm>
            </section>
        </main>
    </div>
</template>

<script setup>
import PawsIcon from './icons/PawsIcon.vue'
import Home from './pages/Home.vue';
import Hero from './pages/Hero.vue';
import AboutUs from './pages/AboutUs.vue';
import AppointmentForm from './pages/AppointmentForm.vue';

function scrollTo(id) {
    const element = document.getElementById(id);
    element.scrollIntoView({block: 'center', behavior: 'smooth'});
}
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