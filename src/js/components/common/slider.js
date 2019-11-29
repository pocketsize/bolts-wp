// Imports
import Siema from 'siema'
import { state } from 'bolts-lib'
import { select, selectAll } from '../../helpers/element'
import timing from '../../helpers/timing'

// Controls
Siema.prototype.initControls = function() {
    const siema = this;
    const slider = select(this.selector).closest('slider');
    const controls = slider.selectAllBy('action', 'go-to');

    if (controls.length) {
        controls.forEach(function(control) {
            control.element.addEventListener('click', function() {
                switch (control.value) {
                case 'previous':
                    siema.prev();
                    break;

                case 'next':
                    siema.next();
                    break;

                default:
                    if (!isNaN(parseFloat(control.value))) {
                        siema.goTo(control.value);
                        break;
                    }

                    throw new Error(
                        'Unhandled click action provided in slider.js'
                    );
                }
            });
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
    const slider = select(this.selector).closest('slider');
    const dots = slider.selectAll('dot');

    if (dots.length) {
        for (let i = 0; i < this.innerElements.length; i++) {
            state.set('active', this.currentSlide === i, dots[i].element);
        }
    }
};

const slider = {
    init: function(options) {
        let defaults = {
            selector: null,
            loop: false,
            autoplay: false,
            interval: null,
            easing: null,
            duration: null,
        };

        options = Object.assign({}, defaults, options);

        if (!options.selector) return false;

        let sliderItemsElement = select(options.selector);
        let sliderElement = sliderItemsElement.closest('slider');

        if (sliderElement.selectAll('item').length < 2) {
            return false;
        }

        return new Siema({
            selector: options.selector,
            loop: options.loop,
            easing: options.easing,
            duration: options.duration,
            onInit() {
                state.set('initialized', true, sliderElement.element);

                this.initControls();

                if (options.autoplay && options.interval) {
                    this.initAutoplay(options.interval);
                }

                if (typeof options.onInit != 'undefined') {
                    options.onInit();
                }
            },
            onChange() {
                this.updateActive();

                if (typeof options.onChange != 'undefined') {
                    options.onChange();
                }
            },
        });
    },
};

export default slider;