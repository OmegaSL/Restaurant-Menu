<template>
    <!-- PAGE HERO ============================================= -->
    <div id="product-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">
                        <!-- Breadcrumb -->
                        <div id="breadcrumb">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumb-nav">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <Link href="/" preserve-state preserve-scroll>{{ title }}</Link>
                                                </li>

                                                <li v-if="subtitle" class="breadcrumb-item active" aria-current="page">
                                                    Book a Table
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 v-if="subtitle" class="h2-xl">{{ subtitle }}</h2>
                        <h2 v-else class="h2-xl">{{ title }}</h2>

                    </div>
                </div>
            </div>
        </div> <!-- End row -->
    </div> <!-- END PAGE HERO -->
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        title: {
            type: String,
            default: "Main Menu",
        },
        subtitle: {
            type: String,
            required: false,
            default: null,
        },
    },
};
</script>
