import { registerBlockExtension } from '@10up/block-components';
import BlockEdit from './BlockEdit'; // Adjust the path as necessary
import { addFilter } from '@wordpress/hooks';
import { createElement, cloneElement } from '@wordpress/element';

// Define the new attributes
const newAttributes = {
    buttonType: {
        type: 'string',
        default: '',
    },
    buttonCity: {
        type: 'string',
        default: '',
    },
};

// Add the new attributes to the block
registerBlockExtension('core/button', {
    extensionName: 'button-type-city-extension',
    attributes: newAttributes,
    classNameGenerator: () => '', // No additional class names needed
    Edit: BlockEdit,
});

// Modify save function to include the new data attributes and ga-event class
const addButtonTypeAndCityAttributes = (element, blockType, attributes) => {
    if (blockType.name === 'core/button' && element.props && element.props.children) {
        const { buttonType, buttonCity } = attributes;
        const newProps = {};

        if (buttonType) {
            newProps['data-type'] = buttonType;
            newProps.className = (element.props.children.props.className || '') + ' ga-event';
        }

        if (buttonCity) {
            newProps['data-city'] = buttonCity;
        }

        const newChildren = cloneElement(
            element.props.children,
            newProps
        );

        return createElement(
            element.type,
            element.props,
            newChildren
        );
    }
    return element;
};

addFilter(
    'blocks.getSaveElement',
    'my-plugin/button-type-city-attributes',
    addButtonTypeAndCityAttributes
);
