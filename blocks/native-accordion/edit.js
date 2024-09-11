import classnames from "classnames";
import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import { useEffect } from "@wordpress/element";

import "./editor.scss";

export default function Edit(props, clientId) {
  const { attributes, setAttributes } = props;
  const { narrowWidth, paddingTop, paddingBottom, tabLabelsArray } = attributes;

  // Checks if one array equals another
  const arrayEquals = (a, b) => {
    if (a.length === b.length) {
      return a.every((element, index) => {
        if (element === b[index]) {
          return true;
        }

        return false;
      });
    }
    return false;
  };

  // Create an array of tab labels by accessing the child blocks "tabLabel" attribute
  // src: https://www.amberalter.com/2021/11/20/building-a-gutenberg-block-for-tabbed-content/#block-setup
  const buildTabLabelsArray = () => {
    //function gets child block attributes and saves as an array to parent attributes
    const parentBlockID = props.clientId;
    const { innerBlockCount } = useSelect((select) => ({
      innerBlockCount: select("core/block-editor").getBlockCount(parentBlockID),
    }));

    var tabLabels = [];

    for (let block = 0; block < innerBlockCount; block++) {
      let tabLabel = wp.data.select("core/block-editor").getBlocks(parentBlockID)[block].attributes.tabLabel;
      tabLabels.push(tabLabel);
    }

    return tabLabels;
  };

  var labelsArray = buildTabLabelsArray();
  var arrayIsEqual = true;
  var arrayIsEqual = arrayEquals(tabLabelsArray, labelsArray);

  useEffect(() => {
    if (!arrayIsEqual) {
      setAttributes({ tabLabelsArray: labelsArray });
    }
  }, [arrayIsEqual]);

  let classNames = classnames("block-tabs", "container");


  //INNER BLOCKS CONFIG
  const ALLOWED_BLOCKS = ["ehd/tab"];
  const INNER_BLOCKS_TEMPLATE = [["ehd/tab"], ["ehd/tab"]];

  return (
    <div {...useBlockProps()}>
      <h4>Accordion</h4>
      <div className={classNames}>
        <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} template={INNER_BLOCKS_TEMPLATE} renderAppender={InnerBlocks.ButtonBlockAppender} />
      </div>
    </div>
  );
}
