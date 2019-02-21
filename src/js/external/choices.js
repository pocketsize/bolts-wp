import Choices from 'choices.js';

const classNames = {
    containerOuter: 'choices',
    containerInner: 'choices__inner',
    input: 'choices__input',
    inputCloned: 'choices__input is-cloned',
    list: 'choices__list',
    listItems: 'choices__list is-multiple',
    listSingle: 'choices__list is-single',
    listDropdown: 'choices__list is-dropdown',
    item: 'choices__item',
    itemSelectable: 'choices__item is-selectable',
    itemDisabled: 'choices__item is-disabled',
    itemOption: 'choices__item is-choice',
    group: 'choices__group',
    groupHeading: 'choices__heading',
    button: 'choices__button',
    activeState: 'is-active',
    focusState: 'is-focused',
    openState: 'is-open',
    disabledState: 'is-disabled',
    highlightedState: 'is-highlighted',
    hiddenState: 'is-hidden',
    flippedState: 'is-flipped',
    selectedState: 'is-highlighted',
};

const choices = {
    themes: {
        select: {
            searchEnabled: false,
            loadingText: 'Loading...',
            noResultsText: 'No results found',
            noChoicesText: 'No choices to choose from',
            itemSelectText: 'Press to select',
            classNames,
        },
    },

    elements: Array.from(document.querySelectorAll('[data-bolts-choices]')),

    init() {
        if (this.elements.length) {
            this.elements.forEach(element => {
                const theme = this.themes[
                    element.getAttribute('data-bolts-choices')
                ];
                if (!theme) {
                    throw new Error('No theme provided for Choices');
                }

                const choices = new Choices(element, theme);
                console.log(element);
                console.log(theme);
                console.log(choices);
            });
        }
    },
};

export default choices;
