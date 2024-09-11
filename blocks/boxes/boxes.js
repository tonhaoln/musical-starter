import { registerBlockType } from '@wordpress/blocks';
import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks, useInnerBlocksProps } from "@wordpress/block-editor";
import './style.scss';
import metadata from './block.json';

const Edit = (props) => {
  const blockProps = useBlockProps();

  //INNER BLOCKS CONFIG
  const ALLOWED_BLOCKS = ["ehd/panel"];
  const INNER_BLOCKS_TEMPLATE = [["ehd/panel"], ["ehd/panel"]];

  const innerBlocksProps = useInnerBlocksProps(blockProps, {
		template: [["ehd/panel"], ["ehd/panel"]]
	});

  return (
    <div {...useBlockProps()}>
        <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} template={INNER_BLOCKS_TEMPLATE} renderAppender={InnerBlocks.ButtonBlockAppender} />      
    </div>
  );
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
