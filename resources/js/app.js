// import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'

createInertiaApp({
    progress: false,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .mount(el)
    },
}),

router.on('start', () => NProgress.start()),
router.on('finish', (event) => {
    if (event.detail.visit.completed) {
      NProgress.done()
    } else if (event.detail.visit.interrupted) {
      NProgress.set(0)
    } else if (event.detail.visit.cancelled) {
      NProgress.done()
      NProgress.remove()
    }
}),
router.on('progress', (event) => {
    if (!NProgress.isStarted()) {
        return
    }
    if (event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9)
    }
})
