import { registerBlockType } from '@wordpress/blocks';
import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import { useEffect } from "@wordpress/element";
import './style.scss';
import metadata from './block.json';

const Edit = (props) => {
  const { attributes, setAttributes } = props;
  const blockProps = useBlockProps({
    className: `panel-width-${attributes.panelWidth}`
  });

  useEffect(() => {
    setAttributes({ panelWidth: attributes.panelWidth || 'full' });
  }, []);

  const innerBlocksProps = {
  template: [
    ['core/group', { className: 'panel-header' }, [
      ['core/heading', { level: 3, content: 'Title' }],
    ]],
    ['core/group', { className: 'panel-body', style: { spacing: { blockGap: 'var:preset|spacing|10' } }, layout: { type: 'default' } }, [
      ['core/paragraph', { content: 'Lorem ipsum dolor sit amet id erat aliquet diam ullamcorper tempus massa eleifend vivamus.' }],
      ['core/buttons', { layout: { type: 'flex', justifyContent: 'center' } }, [
        ['core/button', { text: 'Book Now' }]
      ]],
      ['core/paragraph', { content: 'Lorem ipsum dolor sit amet, fine print, fine print', fontSize: 'small' }]
    ]]
  ]
};
  return (
    <>
      <InspectorControls>
        <PanelBody title={__("Panel Settings", "text-domain")}>
          <SelectControl
            label={__("Panel Width", "text-domain")}
            value={attributes.panelWidth}
            options={[
              { label: __("Full", "text-domain"), value: "full" },
              { label: __("Half", "text-domain"), value: "half" },
              { label: __("Third", "text-domain"), value: "third" },
            ]}
            onChange={(newValue) => setAttributes({ panelWidth: newValue })}
          />
        </PanelBody>
      </InspectorControls>
      <div {...blockProps}>
        <InnerBlocks {...innerBlocksProps} />
      </div>
    </>
  );
};

const Save = (props) => {
  const { attributes } = props;
  const blockProps = useBlockProps.save({
    className: `panel-width-${attributes.panelWidth}`
  });

  return (
    <div {...blockProps}>
      <InnerBlocks.Content />
    </div>
  );
};

registerBlockType(metadata, {
  edit: Edit,
  save: Save,
});
