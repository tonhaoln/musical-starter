import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

function BlockEdit(props) {
    const { attributes, setAttributes } = props;
    const { buttonType, buttonCity } = attributes;

    const updateButtonType = (value) => {
        setAttributes({ buttonType: value });
    };

    const updateButtonCity = (value) => {
        setAttributes({ buttonCity: value });
    };

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Button Settings', 'text-domain')}>
                    <TextControl
                        label={__('Button Type', 'text-domain')}
                        value={buttonType}
                        onChange={updateButtonType}
                        help={__('Enter a type for the button to be used in data-type attribute.', 'text-domain')}
                    />
                    <TextControl
                        label={__('Button City', 'text-domain')}
                        value={buttonCity}
                        onChange={updateButtonCity}
                        help={__('Enter a city for the button to be used in data-city attribute.', 'text-domain')}
                    />
                </PanelBody>
            </InspectorControls>
        </>
    );
}

export default BlockEdit;
