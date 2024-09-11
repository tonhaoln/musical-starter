import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import metadata from './block.json';

import Edit from './edit';
import save from './save';

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
