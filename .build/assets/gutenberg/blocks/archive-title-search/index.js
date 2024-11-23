import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import { _x } from '@wordpress/i18n';
import { archive as icon } from '@wordpress/icons';

const blockName = 'sht/archive-title-search';

registerBlockType(blockName, {
	apiVersion: 2,
	title: _x('Archive Title (Search)', 'Block title', 'latrigg'),
	icon,
	category: 'sht/blocks',
	keywords: [_x('Bilder', 'Block keyword', 'latrigg'), 'image', 'gallery', _x('Impressionen', 'Block keyword', 'latrigg')],
	supports: {
		align: ['wide', 'full'],
		html: false,
	},
	edit: () => {
		const blockProps = useBlockProps();

		return (
			<div {...blockProps}>
				<ServerSideRender block={blockName} />
			</div>
		);
	},
	save() {
		return null;
	},
});
