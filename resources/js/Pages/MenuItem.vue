<template>
    <Hero :title="title" :subtitle="subtitle" />

    <!-- {{ menu_item.name }} -->

    <!-- SINGLE PRODUCT
			============================================= -->
    <section id="product-1" class="pt-100 single-product division">
        <div class="container">
            <div class="row">
                <!-- PRODUCT IMAGE -->
                <div class="col-lg-7">
                    <div class="product-preview">
                        <!-- TABS CONTENT -->
                        <div class="tabs-content">

                            <!-- TAB-1 CONTENT -->
                            <div v-if="menu_item.image" id="tab-0-img" class="tab-content text-center displayed">
                                <img class="img-fluid" :src="/storage/ + menu_item.image" alt="menu-image"
                                    style="width: 100%; max-height: 500px;" />
                            </div>
                            <div v-else id="tab-0-img" class="tab-content text-center displayed">
                                <img class="img-fluid" :src="'/images/menu/burger-04.png'" alt="menu-image"
                                    style="width: 100%; max-height: 500px;" />
                            </div>

                            <!-- TAB-2 CONTENT -->
                            <div v-for="(more_image, index) in menu_item.additional_images" :key="index"
                                :id="'tab-' + index + 1 + '-img'" class="tab-content text-center">
                                <img class="img-fluid" :src="/storage/ + more_image" alt="menu-image"
                                    style="width: 100%; max-height: 500px;" />
                            </div>

                        </div> <!-- END TABS CONTENT -->


                        <!-- TABS NAVIGATION -->
                        <div class="tabs-nav">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <ul class="tabs-2 clearfix">

                                        <!-- TAB-1 LINK -->
                                        <li v-if="menu_item.image" class="tab-link displayed" data-tab="tab-0-img">
                                            <img :src="/storage/ + menu_item.image" alt="menu-image" />
                                        </li>
                                        <li v-else class="tab-link" data-tab="tab-0-img">
                                            <img src="/images/menu/burger-04.png" alt="menu-image" />
                                        </li>

                                        <li v-for="(more_image, index) in menu_item.additional_images" class="tab-link"
                                            :key="index" :data-tab="'tab-' + index + 1 + '-img'">
                                            <img :src="/storage/ + more_image" alt="menu-image" />
                                        </li>

                                        <!-- TAB-2 LINK -->
                                        <!-- <li class="tab-link" data-tab="tab-2-img">
                                            <img src="/images/menu/burger-04.png" alt="menu-image" />
                                        </li> -->

                                        <!-- TAB-2 LINK -->
                                        <!-- <li class="tab-link" data-tab="tab-3-img">
                                            <img src="/images/menu/burger-07.png" alt="menu-image" />
                                        </li> -->

                                    </ul>
                                </div>
                            </div>
                        </div> <!-- END TABS NAVIGATION -->


                    </div>
                </div> <!-- END PRODUCT IMAGE -->


                <!-- PRODUCT DISCRIPTION -->
                <div class="col-lg-5">
                    <div class="product-description">

                        <!-- TITLE -->
                        <div class="project-title">

                            <!-- Title -->
                            <h2 class="h2-lg">{{ menu_item.name }}</h2>

                            <!-- Rating -->
                            <!-- <div class="stars-rating">
                                <span>4.38</span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(3 Customer Reviews)</span>
                            </div> -->

                            <!-- Price -->
                            <div class="project-price">
                                <h4 class="h4-xl yellow-color">
                                    <!-- <span class="old-price">$9.95</span>  -->
                                    GHC{{ menu_item.price }}
                                </h4>
                            </div>

                        </div>

                        <!-- TEXT -->
                        <div class="product-txt">

                            <!-- Text -->
                            <p class="p-md grey-color">
                                {{ menu_item.description }}
                            </p>

                            <!-- Product Data -->
                            <div class="product-info">
                                <p class="text-uppercase">Portion Size: <strong>{{ menu_item.size }}</strong></p>
                                <!-- <p>Calories: <span>680Kj</span></p>
                                <p>Allergies: <span>Lactose, Gluten, Mustard</span></p>
                                <p>Tags: <span>Burgers, Fast Food, Testo</span></p> -->
                            </div>

                            <!-- <input class="qty" type="number" min="1" max="20" value="1"> -->

                            <!-- Add To Cart -->
                            <!-- <div class="add-to-cart-btn bg-yellow ico-20 text-center">
                                <a href="cart.html"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
                            </div> -->

                            <!-- List -->
                            <!-- <ul class="txt-list">
                                <li class="list-item">
                                    <p class="p-sm">We accept credit cards or cash to a courier</p>
                                </li>
                                <li class="list-item">
                                    <p class="p-sm">Shipping cost is GHc2 (Free from GHc35)</p>
                                </li>
                                <li class="list-item">
                                    <p class="p-sm">Order before noon for same day dispatch</p>
                                </li>
                            </ul> -->

                        </div> <!-- END TEXT-->

                    </div>
                </div> <!-- END PRODUCT DISCRIPTION -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END SINGLE PRODUCT -->
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
        menu_item: Array,
        title: {
            type: String,
        },
        subtitle: {
            type: String,
            required: false,
            default: "Display Menu Item",
        },
    },
    setup() {
        return {

        }
    }
};
</script>
