<template>
    <img :src="logo" alt="" width="120" height="120">
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        name: 'Logo',
        data(){
            return{
                logo: '../logo/logo-pentest.png',
            }
        },
        components: {
            Link,
        },
    })
</script>