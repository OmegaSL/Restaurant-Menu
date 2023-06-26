<template>
    <!-- HEADER-3
		============================================= -->
    <header id="header-3" class="header navik-header header-transparent header-shadow">
        <div class="container">


            <!-- NAVIGATION MENU -->
            <div class="navik-header-container">


                <!-- CALL BUTTON -->
                <div class="callusbtn">
                    <a :href="'tel:' + setting.site_phone">
                        <i class="fas fa-phone"></i>
                    </a>
                </div>


                <!-- LOGO IMAGE -->
                <div class="logo" :data-mobile-logo="logo" :data-sticky-logo="logo">
                    <Link href="/">
                    <!-- <img src="/images/logo-01.png" alt="header-logo" /> -->
                    <img :src="logo" alt="header-logo" style="width: 150px; height: 150px;" />
                    </Link>
                </div>


                <!-- BURGER MENU -->
                <div class="burger-menu">
                    <div class="line-menu line-half first-line"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu line-half last-line"></div>
                </div>


                <!-- MAIN MENU -->
                <nav class="navik-menu menu-caret navik-yellow">
                    <ul class="top-list">

                        <!-- DROPDOWN MENU -->
                        <li :class="{ 'nav-btn yellow-color': $page.component == 'Home' }">
                            <Link href="/" preserve-state preserve-scroll>Main Menu</Link>
                        </li>

                        <!-- DROPDOWN MENU -->
                        <li :class="{ 'nav-btn yellow-color': $page.component == 'Booking' }">
                            <Link href="/booking" preserve-state preserve-scroll>Book a Table</Link>
                        </li>

                        <!-- HEADER BUTTON  -->
                        <li class="nav-btn yellow-color">
                            <a :href="'tel:' + setting.site_phone">
                                {{ setting.site_phone }}
                            </a>
                        </li>

                        <!-- BASKET ICON -->
                        <!-- <li class="basket-ico ico-30">
                            <a href="cart.html">
                                <span class="ico-holder">
                                    <span class="flaticon-shopping-bag"></span>
                                    <em class="roundpoint">2</em>
                                </span>
                            </a>
                        </li> -->

                    </ul>
                </nav> <!-- END MAIN MENU -->


            </div> <!-- END NAVIGATION MENU -->


        </div> <!-- End container -->
    </header> <!-- END HEADER-3 -->
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const setting = computed(() => page.props.setting);

export default {
    components: {
        Link,
    },
    props: {
        // check if setting.site_logo is null
        // if null, use default logo
        // if not null, use setting.site_logo
        logo: {
            type: String,
            required: false,
            default: setting.site_logo ? /storage/ + setting.site_logo : '/assets/images/logo-text.jpg',
        },
    },
    setup() {
        return {
            setting,
        }
    }
};
</script>
