<template>

    <Head title="Log in" />

    <div class="session-wrapper">
        <div class="session-left">
            <Carousel :autoplay="2000" :wrap-around="true">
                <Slide v-for="slide in sliderData" :key="slide.id">
                        <div class="slick-slider">
                            <div class="slider-content">
                                <img :src="slide.image" class="rounded-circle img-responsive" width="170"
                                    height="170" />
                                <div class="slider-meta mb-4">
                                    <span class="d-block client-name fw-bold">
                                        <i>{{ slide.name }}</i>
                                    </span>
                                    <span class="d-block client-digg">{{ slide.subtitle }}</span>
                                </div>
                                <p class="px-4">{{ slide.body }}</p>
                            </div>
                        </div>
                </Slide>
                <template #addons>
                    <Pagination />
                </template>
            </Carousel>
        </div>

        <div class="session-right text-center">
            <div class="session-table-cell">
                <div class="session-content">

                    <h2>Log in</h2>

                    <jet-authentication-card>
                        <template #logo>
                            <jet-authentication-card-logo />
                        </template>

                        <jet-validation-errors/>

                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>

                        <form @submit.prevent="submit">
                            <div>
                                <jet-label for="email" value="Email" />
                                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                    required autofocus />
                            </div>

                            <div class="mt-4">
                                <jet-label for="password" value="Password" />
                                <jet-input id="password" type="password" class="mt-1 block w-full"
                                    v-model="form.password" required autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <label class="flex items-center">
                                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <Link v-if="canResetPassword" :href="route('password.request')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900">
                                Forgot your password?
                                </Link>

                                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Log in
                                </jet-button>
                            </div>
                        </form>
                    </jet-authentication-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import 'vue3-carousel/dist/carousel.css';
// optional style for arrows & dots
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default defineComponent({
    name: "Login",
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        Link,
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            }),

            logo: '../logo/logo-pentest.png',

            sliderData: [
                { id: 1, name: "", subtitle: "We are hackers", image: "/sliders/slider.1.png", body: "The best option for your app, Welcome to the Pentesting GJMJ" },
                { id: 2, name: "", subtitle: "We are enginners", image: "/sliders/slider.2.png", body: "The best option for your app, Welcome to the Pentesting GJMJ" },
                { id: 3, name: "", subtitle: "The better conditions for your app", image: "/sliders/slider.3.png", body: "The best option for your app, Welcome to the Pentesting GJMJ" },
                { id: 4, name: "", subtitle: "Fasters and Efective", image: "/sliders/slider.4.png", body: "The best option for your app, Welcome to the Pentesting GJMJ" },
            ],

        }
    },

    computed: {
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        },
        onInitCarousel() {
            console.log('our carousel is ready')
        },
    }
})
</script>
