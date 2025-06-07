<template>
    <div class="min-h-screen flex flex-col items-center justify-center container mx-auto py-10 lg:flex-row lg:items-center lg:justify-center gap-10">
        <div class="lg:w-1/2 flex flex-col gap-10 px-4 lg:text-left">
            <p class="text-4xl lg:text-6xl open-sans-bold">Expert care for your furry, feathery, or scaley friend</p>
            <p>
                We know how stressful it is to leave your pets at home alone.
                We're a team of experienced animal caregivers well connected to local veterinarians.
                Trust us to love them like our own and to keep them safe and happy till you're home.
            </p>
            <div>
                <button @click="$emit('scroll', 'appointment_form')" class="bg-slate-800 text-white px-6 py-3 rounded-3xl hover:bg-slate-900">
                    Schedule a visit
                </button>
            </div>
        </div>
        <div class="lg:w-1/2 flex gap-6 flex-wrap justify-center px-4">
            <div class="flex flex-col gap-6 xs:gap-4">
                <img class="w-full h-full md:max-w-xs object-cover rounded-lg" src="/public/images/hero/cat-1.jpg" alt="Cat">
                <img class="w-full h-full md:max-w-xs object-cover rounded-lg" src="/public/images/hero/bird-1.jpg" alt="Bird">
            </div>
            <div class="flex flex-col gap-6 xs:gap-4">
                <img class="w-full h-full md:max-w-xs object-cover rounded-lg" src="/public/images/hero/dog-2.jpg" alt="Dog">
                <img class="w-full h-full md:max-w-xs object-cover rounded-lg" src="/public/images/hero/hamster-1.jpg" alt="Hamster">
            </div>
        </div>
    </div>
</template>

<script scoped>

</script>
