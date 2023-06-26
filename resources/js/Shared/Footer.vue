<template>
    <!-- FOOTER-4
			============================================= -->
    <footer id="footer-4" class="footer division">
        <div class="container grey-color">


            <!-- FOOTER CONTENT -->
            <div class="row">
            </div> <!-- END FOOTER CONTENT -->


            <!-- BOTTOM FOOTER -->
            <div class="bottom-footer">
                <div class="row d-flex align-items-center">
                    <!-- FOOTER COPYRIGHT -->
                    <div class="col-md-5 col-lg-6">
                        <div class="footer-copyright">
                            <p>&copy; 2023 {{ setting.site_name }}. All Rights Reserved</p>
                        </div>
                    </div>

                    <!-- BOTTOM FOOTER LINKS -->
                    <div class="col-md-7 col-lg-6">
                        <ul class="bottom-footer-list text-right clearfix">
                            <li>
                                <p class="first-list-link">
                                    <a :href="setting.site_facebook_link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-facebook-f"></i> Facebook
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a  :href="setting.site_twitter_link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a  :href="setting.site_youtube_link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-youtube"></i> YouTube
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="last-li">
                                    <a  :href="setting.site_instagram_link" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-instagram"></i> Instagram</a>
                                </p>
                            </li>
                        </ul>
                    </div>

                </div> <!-- End row -->
            </div> <!-- END BOTTOM FOOTER -->

        </div> <!-- End container -->
    </footer> <!-- END FOOTER-4 -->
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
    setup() {
        const page = usePage();
        const setting = computed(() => page.props.setting);

        return {
            setting,
        }
    },
};
</script>