import LazyLoad from 'vanilla-lazyload';

const images = {
    images: null,

    reset() {
        if (this.images !== null && this.images.destroy !== undefined) {
            this.images.destroy();
        }
    },

    init() {
        this.reset();

        this.images = new LazyLoad({
            elements_selector: '[data-lazy-image-trigger]',
            threshold: 300,
            callback_load: image => {
                const root = image.closest('[data-lazy-image-root]');
                const object = image.closest('[data-lazy-image]');
                object.style.backgroundImage = `url('${image.getAttribute(
                    'src'
                )}')`;
                root.classList.add('is-loaded');
            },
        });
    },
};

export default images;
