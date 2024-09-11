/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
 
/**
 * Internal dependencies
 */
import name from './block.json';
 
registerBlockType(name, {
	edit: () => { 
		return <div>:)</div> 
	},
	save: () => { 
		return <div>:)</div> 
	}
});