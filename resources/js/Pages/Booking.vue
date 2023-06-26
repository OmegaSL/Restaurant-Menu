<template>
    <Hero :title="title" :subtitle="subtitle" />

    <!-- BOOKING-2 ============================================= -->
    <div id="booking-2" class="wide-70 booking-section division">
        <div class="container">
            <div class="row">

                <!-- BOOKING FORM -->
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="form-holder">

                        <!-- Text -->
                        <p class="p-xl text-center">
                            Fill in the form below or give us a call
                            <a :href="'tel:' + setting.site_phone">{{ setting.site_phone }}</a>
                        </p>

                        <!-- Form -->
                        <form @submit.prevent="submit" class="row booking-form" preserve-scroll>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <input type="datetime-local" v-model="form.reservation_datetime"
                                    :name="reservation_datetime" :id="reservation_datetime" class="form-control date"
                                    placeholder="Select Date*">

                                <!-- Error message -->
                                <span v-if="errors.reservation_datetime" v-text="errors.reservation_datetime"
                                    class="text-danger"></span>
                            </div>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <input type="number" v-model="form.number_of_people" :min="1" :name="number_of_people"
                                    :id="number_of_people" class="form-control number_of_people"
                                    placeholder="Number of person">

                                <!-- Error message -->
                                <span v-if="errors.number_of_people" v-text="errors.number_of_people"
                                    class="text-danger"></span>
                            </div>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <input type="text" v-model="form.name" :name="name" :id="name" class="form-control name"
                                    placeholder="Your Name*">

                                <!-- Error message -->
                                <span v-if="errors.name" v-text="errors.name" class="text-danger"></span>
                            </div>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <input type="email" v-model="form.email" :name="email" :id="email"
                                    class="form-control email" placeholder="Email Address*">

                                <!-- Error message -->
                                <span class="text-danger">{{ errors.email }}</span>
                            </div>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <input type="text" v-model="form.phone" :name="phone" :id="phone" class="form-control phone"
                                    placeholder="Phone Number*">

                                <!-- Error message -->
                                <span v-if="errors.phone" v-text="errors.phone" class="text-danger"></span>
                            </div>

                            <!-- Form Textarea -->
                            <div class="col-md-12">
                                <textarea v-model="form.message" :name="message" :id="message" class="form-control message"
                                    rows="4" placeholder="Your Message ..."></textarea>

                                <!-- Error message -->
                                <span v-if="errors.message" v-text="errors.message" class="text-danger"></span>
                            </div>

                            <!-- Form Button -->
                            <div class="col-md-12 mt-10">
                                <button type="submit" class="btn btn-md btn-red tra-red-hover submit"
                                    :disabled="processing">
                                    Request Booking
                                </button>
                            </div>

                            <!-- Form Message -->
                            <!-- <div class="col-md-12 booking-form-msg text-center">
                                <div class="sending-msg"><span class="loading"></span></div>
                            </div> -->

                        </form> <!-- End Form -->

                    </div>
                </div> <!-- END BOOKING FORM -->

            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END BOOKING-2 -->
</template>

<script setup>
import { Link, usePage, router } from "@inertiajs/vue3";
import { computed, defineAsyncComponent, reactive, ref } from 'vue';
import Hero from "../Shared/Hero";
import Layout from "../Shared/Layout";
import flasher from "@flasher/flasher";

const page = usePage();
const setting = computed(() => page.props.setting);
const errors = computed(() => page.props.errors);

let form = reactive({
    reservation_datetime: '',
    number_of_people: '',
    name: '',
    email: '',
    phone: '',
    message: '',
});
let processing = ref(false);
let submit = () => {
    processing.value = true;
    router.post('/make-reservation', form, {
        preserveScroll: true,
        onStart: () => {
            processing.value = true;
        },
        // onFinish: () => {
        //     processing.value = false;
        // },
        onSuccess: () => {
            processing.value = false;
            form.reservation_datetime = '';
            form.number_of_people = '';
            form.name = '';
            form.email = '';
            form.phone = '';
            form.message = '';
        },
        onError: () => {
            processing.value = false;
        }
    });
};

defineProps({
    title: {
        type: String,
    },
    subtitle: {
        type: String,
        required: false,
        default: "Book a Table",
    },
    setting: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
        required: false,
        default: () => ({}),
    },
    messages: {
        type: Object,
        required: false,
        default: () => ({}),
    },
});

defineAsyncComponent({
    components: {
        Link,
        Hero,
    },
});
</script>

<script>
export default {
    layout: Layout,
    watch: {
        messages(value) {
            flasher.render(value);
        }
    },
};
</script>
