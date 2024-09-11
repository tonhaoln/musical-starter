import classnames from "classnames";
import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import { TextControl } from "@wordpress/components";
import { useSelect, useDispatch } from "@wordpress/data";
import { useEffect } from "@wordpress/element";

import "./editor.scss";

export default function Edit(props) {
  const { attributes, setAttributes, clientId } = props;
  const { tabLabel, parentBlock } = attributes;

  // Detect the parent block dynamically
  const detectedParentBlockType = useSelect((select) => {
    const { getBlock, getBlockParents } = select("core/block-editor");
    const parents = getBlockParents(clientId);
    const parentBlock = parents.length > 0 ? getBlock(parents[0]) : null;
    return parentBlock ? parentBlock.name : null;
  }, [clientId]);

  // Update the parentBlock attribute if it changes
  useEffect(() => {
    if (parentBlock !== detectedParentBlockType) {
      setAttributes({ parentBlock: detectedParentBlockType });
    }
  }, [detectedParentBlockType, parentBlock]);

  // Classes
  const classNames = classnames("block-tab", "container");

  // Update tab label
  const onChangeTabLabel = (newTabLabel) => {
    setAttributes({ tabLabel: newTabLabel });
  };


  return (
    <div {...useBlockProps()}>
      <div className={classNames}>
        <h4>Title</h4>
        <TextControl
          value={tabLabel}
          onChange={onChangeTabLabel}
          placeholder="Add Title"
          type="text"
          className="tab-title"
        />
        <h4>Inner Content</h4>
        <InnerBlocks />
      </div>
    </div>
  );
}
