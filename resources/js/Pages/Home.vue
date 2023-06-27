<template>
    <Hero :title="title" :subtitle="subtitle" />

    <!-- MENU-3
        ============================================= -->
    <section id="menu-3" class="wide-100 menu-section division">
        <div class="container">

            <!-- MENU-3 WRAPPER -->
            <div class="menu-3-wrapper" v-for="menu_category in menu_categories">
                <!-- Title -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-3-title">
                            <h3 class="h3-md red-color">
                                {{ menu_category.name }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="row mb-3" v-if="menu_category.menu_items.length > 0 && menu_category.menu_items.every(i => !!i)">
                    <!-- LEFT COLUMN -->
                    <div class="col-lg-6" v-for="menu_item in menu_category.menu_items" :key="index">
                        <div class="menu-3-txt">
                            <ul>
                                <!-- MENU ITEM-1 -->
                                <li class="menu-3-item">
                                    <Link :href="'/menu_item/' + menu_item.slug" preserve-state preserve-scroll>

                                    <!-- Title & Price -->
                                    <div class="menu-title-wrapper rel">
                                        <div class="menu-item-title">
                                            <h5 class="h5-sm">{{ menu_item.name }}</h5>
                                        </div>
                                        <div class="menu-item-dots"></div>
                                        <div class="menu-item-price">
                                            <h5 class="h5-sm">GHc{{ menu_item.price }}</h5>
                                        </div>
                                        <div class="menu-3-item-data bg-grey">
                                            <h6 class="h6-xs grey-color">{{ menu_item.size }}</h6>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="menu-item-desc">
                                        <p>
                                            {{ menu_item.description }}
                                        </p>
                                    </div>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                </div> <!-- End row -->
            </div> <!-- END MENU-3 WRAPPER -->

        </div> <!-- End container -->
    </section> <!-- END MENU-3 -->




    <!-- BANNER-4 ============================================= -->
    <section id="banner-4" class="bg-fixed wide-100 banner-section division">
        <div class="container">
            <div class="row">
                <!-- BANNER TEXT -->
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="banner-4-txt text-center">

                        <!-- Title  -->
                        <h4 class="h4-xl">We Guarantee</h4>

                        <!-- Title  -->
                        <h2>30 Minutes Delivery!</h2>

                        <!-- Text -->
                        <p class="p-lg">Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor primis libero
                            tempus,
                            blandit a cursus varius luctus neque magna
                        </p>

                        <!-- Call Button -->


                    </div>
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BANNER-4 -->
</template>

<script>
import Layout from "../Shared/Layout";
import { Link } from "@inertiajs/vue3";
import Hero from "../Shared/Hero";

export default {
    layout: Layout,
    components: {
        Link,
        Hero,
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
        menu_categories: {
            type: Array,
        },
    },
};
</script>
