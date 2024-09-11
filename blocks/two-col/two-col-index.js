import { registerBlockType } from '@wordpress/blocks';
import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks, useInnerBlocksProps } from "@wordpress/block-editor";
import './style.scss';
import metadata from './block.json';

const Edit = (props) => {
  const blockProps = useBlockProps();

  const innerBlocksProps = useInnerBlocksProps(blockProps, {
		template: [
    ['core/column', {}, [
      ['core/heading', { level: 3, content: 'Sub Heading 1' }],
      ['core/paragraph', { content: 'Lorem ipsum dolor sit amet id erat aliquet diam ullamcorper tempus massa eleifend vivamus.' }],
    ]],
    ['core/column', {}, [
      ['core/heading', { level: 3, content: 'Sub Heading 2' }],
      ['core/paragraph', { content: 'Morbi augue cursus quam pulvinar eget volutpat suspendisse dictumst mattis id.' }],
    ]],
  ]
	});

  return <div {...innerBlocksProps}></div>;
};

const Save = () => {
  const blockProps = useBlockProps.save();

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
