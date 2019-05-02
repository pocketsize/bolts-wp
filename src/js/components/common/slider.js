/**
 * Slider
 *
 * Pretty nifty. Uses sliderTypes as functionality "themes".
 * sliderTypes are called upon from the components [data-slider].
 * Make sure to define all your custom slider types
 * in sliderTypes below!
 *
 * TODO - Event delegations for click events to properly micro-optimize
 */

/**
 * sliderTypes
 *
 * @param bool        loop
 * @param {int|false} interval - ms between auto slidechange. false prevents autoplay
 * @param int         duration - ms for transition
 * @param string      easing   - make it cubic-bezier, brodude
 */

const sliderTypes = {
    default: {
        loop: true,
        interval: 5000,
        duration: 1000,
        easing: 'cubic-bezier(.45,.08,.26,.99)',
    },
};

// Imports
import Siema from 'siema';
import { timing } from 'bolts-lib';

// Pagination
Siema.prototype.initPagination = function() {
    this.dots = Array.from(
        this.selector.parentNode.querySelectorAll('[data-dot]')
    );

    if (this.dots.length > 0) {
        for (let i = 0; i < this.dots.length; i++) {
            this.dots[i].addEventListener('click', () => {
                this.autoslide.stop();
                this.goTo(i);
                this.autoslide.start();
            });
        }
    }
};

// Controls
Siema.prototype.initControls = function() {
    this.controls = Array.from(
        this.selector.parentNode.querySelectorAll('[data-control]')
    );

    if (this.controls.length > 0) {
        this.controls.forEach(control => {
            const action = control.getAttribute('data-control');

            switch (action) {
            case 'previous':
                control.addEventListener('click', () => this.prev());
                break;

            case 'next':
                control.addEventListener('click', () => this.next());
                break;

            default:
                throw new Error(
                    'Unhandled click action provided in slider.js'
                );
            }
        });
    }
};

// Autoplay
Siema.prototype.initAutoplay = function(interval) {
    this.autoslide = new timing.Interval(
        () => {
            this.next();
        },
        interval,
        false
    );

    this.autoslide.start();

    this.selector.parentElement.addEventListener('mouseenter', () => {
        this.autoslide.stop();
    });
    this.selector.parentElement.addEventListener('touchstart', () => {
        this.autoslide.stop();
    });
    this.selector.parentElement.addEventListener('mouseleave', () => {
        this.autoslide.start();
    });
    this.selector.parentElement.addEventListener('touchend', () => {
        this.autoslide.start();
    });
};

// Update active classes
Siema.prototype.updateActive = function() {
    for (let i = 0; i < this.innerElements.length; i++) {
        const addOrRemove = this.currentSlide === i ? 'add' : 'remove';
        this.innerElements[i].classList[addOrRemove]('is-active');

        if (this.dots.length > 0) {
            this.dots[i].classList[addOrRemove]('is-active');
        }
    }
};

// INIT THE SLIDER!!!
const Slider = {
    sliders: null,

    cacheElems() {
        this.sliders = document.querySelectorAll('[data-slider]');
    },

    init() {
        this.cacheElems();
        if (this.sliders) {
            for (const slider of this.sliders) {
                const slideAmount = slider.querySelectorAll('[data-slide]');
                const options = sliderTypes[slider.getAttribute('data-slider')];

                if (slideAmount.length > 1) {
                    const mySlider = new Siema({
                        selector: slider,
                        loop: options.loop,
                        easing: options.easing,
                        duration: options.duration,
                        onInit() {
                            this.initPagination();
                            this.initControls();

                            if (options.interval) {
                                this.initAutoplay(options.interval);
                            }
                        },
                        onChange() {
                            this.updateActive();
                        },
                    });
                }
            }
        }
    },
};

// export
export default Slider;
