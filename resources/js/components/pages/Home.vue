<template>
    <div class="min-h-screen dog-1 relative flex text-white">
        <div class="z-10 container mx-auto xs:self-end lg:self-center lg:justify-items-end">
            <div class="xs:mb-12 lg:mb-0 md:w-full lg:w-1/4">
                <p class="xs:text-4xl md:text-5xl lg:text-6xl open-sans-bold">
                    We care for your furry little loved ones while
                </p>
                <button class="mt-10 bg-white text-black/80 rounded-3xl py-2 px-6 hover:bg-slate-300">Schedule a visit</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.dog-1 {
    background-image: url('images/home/dog-1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.dog-1::after {
    content: "";
    position: absolute;
    inset: 0;
    /* background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent); */
    background: radial-gradient(circle, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);
    z-index: 0;
}
</style>
