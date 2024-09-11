import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';

import Edit from './tab-edit';
import save from './tab-save';

registerBlockType( metadata, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
} );
