<template>
    <Header />

    <!-- PAGE CONTENT
		============================================= -->
    <div id="page" class="page">
        <slot />

        <Footer />
    </div>
</template>

<script>
import Header from './Header';
import Footer from './Footer';

export default {
    components: {
        Header,
        Footer,
    },
    props: {
        title: {
            type: String,
        },
        subtitle: {
            type: String,
            required: false,
            default: null,
        },
    },
};
</script>
