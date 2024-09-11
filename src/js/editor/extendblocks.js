import classnames from "classnames";

function addEhdAttributes(settings, name) {
  if (typeof settings.attributes !== "undefined") {
      settings.attributes = Object.assign(settings.attributes, {
        hideEhdBlock: {
          type: "boolean",
        },
      });
  }
  return settings;
}

wp.hooks.addFilter("blocks.registerBlockType", "ehd/ehd-attributes", addEhdAttributes);

/**
 * Add controls to the "advanced" section of inspector
 */
const ehdControls = wp.compose.createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { Fragment } = wp.element;
    const { ToggleControl } = wp.components;
    const { InspectorAdvancedControls } = wp.blockEditor;
    const { attributes, setAttributes, isSelected, name } = props;
    return (
      <Fragment>
        <BlockEdit {...props} />
        {isSelected && (
          <InspectorAdvancedControls>
          
            <ToggleControl
              label={wp.i18n.__("Hide Block on Front End", "ehd")}
              checked={!!attributes.hideEhdBlock}
              onChange={(newval) =>
                setAttributes({
                  hideEhdBlock: !attributes.hideEhdBlock,
                })
              }
            />
          </InspectorAdvancedControls>
        )}
      </Fragment>
    );
  };
}, "ehdControls");

wp.hooks.addFilter("editor.BlockEdit", "ehd/ehd-attributes", ehdControls);




/**
 * Add padding and limit width classes to the block in the editor when applicable
 */

const addAdvancedClasses = wp.compose.createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    const { Fragment } = wp.element;
    const {
      attributes: { hideEhdBlock },
      className,
      name,
    } = props;

    let hideBlockClass = "";
    if (hideEhdBlock) {
      hideBlockClass = "ehd-hide-block";
    }
    return <BlockListBlock {...props} className={classnames(className, hideBlockClass)} />;
  };
});

wp.hooks.addFilter("editor.BlockListBlock", "ehd/ehd-attributes/add-editor-class", addAdvancedClasses);