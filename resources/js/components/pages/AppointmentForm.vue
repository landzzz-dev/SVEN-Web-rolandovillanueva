<template>
    <div class="min-h-screen w-full bg-red-100 px-4 lg:px-20 flex flex-col p-10 gap-10 items-center justify-center">
        <p class="text-4xl lg:text-6xl open-sans-bold">We’ll take your dog for a walk. Just tell us when!</p>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl space-y-6">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Contact <span class="text-pink-500">*</span></label>
                <input 
                    type="text"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" 
                    v-model="formObject.contact"
                />
                <p v-if="errors.contact" class="mt-1 text-sm text-red-600 font-bold">{{ errors.contact }}</p>
            </div>
            <div class="flex w-full">
                <div class="w-full">
                    <label class="block mb-2 font-semibold text-gray-700">Frequency <span class="text-pink-500">*</span></label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" value="One time" v-model="formObject.frequency" />
                            One time
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" value="Recurring" v-model="formObject.frequency" />
                            Recurring
                        </label>
                    </div>
                    <p v-if="errors.frequency" class="mt-1 text-sm text-red-600 font-bold">{{ errors.frequency }}</p>
                </div>
                <div class="w-full">
                    <label class="block mb-2 font-semibold text-gray-700">Start date <span class="text-pink-500">*</span></label>
                    <input 
                        type="date" 
                        :min="dateToday" 
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" 
                        v-model="formObject.start_date"
                    />
                    <p v-if="errors.start_date" class="mt-1 text-sm text-red-600 font-bold">{{ errors.start_date }}</p>
                </div>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Days <span class="text-pink-500">*</span></label>
                <div class="flex flex-wrap gap-2">
                    <button 
                        v-for="day in days" :key="day" @click="toggleSelection('day', day)" 
                        :class="['px-4 py-2 rounded-full border', formObject.day.includes(day) ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700']"
                    >
                        {{ day }}
                    </button>
                </div>
                <p v-if="errors.day" class="mt-1 text-sm text-red-600 font-bold">{{ errors.day }}</p>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Times <span class="text-pink-500">*</span></label>
                <div class="flex gap-2">
                    <button 
                        v-for="time in times" :key="time" @click="toggleSelection('time', time)" 
                        :class="['px-4 py-2 rounded-full border', formObject.time.includes(time) ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700']"
                    >
                        {{ time }}
                    </button>
                </div>
                <p v-if="errors.time" class="mt-1 text-sm text-red-600 font-bold">{{ errors.time }}</p>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Notes for your sitter <span class="text-pink-500">*</span></label>
                <textarea 
                    placeholder="Please provide details like leash location, vet info, etc."
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500"
                    v-model="formObject.note"
                ></textarea>
            </div>
            <div class="text-center">
                <button @click="scheduleService()" class="bg-slate-800 px-6 py-3 rounded-3xl text-white font-semibold hover:bg-slate-900 transition">
                    Schedule Service
                </button>
            </div>
        </div>

        <div 
            v-if="alertObject.isOpen"
            id="alert" 
            class="bottom-4 right-4 fixed bg-green-500 text-white px-4 py-3 shadow-md rounded transition transform duration-700"
        >   
            {{ alertObject.message }}
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'

// ERROR VALIDATION
const errors = reactive({
    contact: null,
    frequency: null,
    start_date: null,
    day: null,
    time: null,
});

function clearErrors() {
    errors.contact = null;
    errors.frequency = null;
    errors.start_date = null;
    errors.day = null;
    errors.time = null;
};

const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
const times = ['Morning', 'Afternoon', 'Evening'];
const dateToday = new Date().toLocaleDateString('en-CA').split('T')[0]
function toggleSelection(field, value) {
    const index = formObject[field].indexOf(value)
    if (index > -1) {
        formObject[field].splice(index, 1)
    } else {
        formObject[field].push(value)
    }
}

// FORM DATA
const formObject = reactive({
    contact: '',
    frequency: '',
    start_date: '',
    day: [],
    time: [],
    note: ''
});

function clearForm() {
    formObject.contact = '';
    formObject.frequency = '';
    formObject.start_date = '';
    formObject.day = [];
    formObject.time = [];
    formObject.note = '';
};

const alertObject = reactive({
    isOpen: false,
    message: ''
});

function scheduleService() {
    clearErrors();

    axios({
        method: 'post',
        url: 'schedule-services',
        data: formObject
    })
    .then((res) => {
        alertObject.isOpen = true;
        alertObject.message = res.data.message
        clearForm();
    })
    .catch((err) => {
        console.error('Error scheduling service: ', err);
        if (err.response && err.response.status === 422) {
            const serverErrors = err.response.data.errors
            Object.keys(serverErrors).forEach(key => {
                if (errors[key] !== undefined) {
                    errors[key] = serverErrors[key][0]
                }
            })
        }
        else if (err.response && err.response.status === 500) {

        }
    }).finally(() => {
        setTimeout(function () {
            const alert = document.getElementById('alert');
            if (alert) {
                alert.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => alert.style.display = 'none', 700);
            }
        }, 4000);
    })
};

</script>