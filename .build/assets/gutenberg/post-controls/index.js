import { _x, __ } from '@wordpress/i18n';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __experimentalDimensionControl as DimensionControl } from '@wordpress/components';
import { useSelect, useDispatch } from '@wordpress/data';
import { registerPlugin } from '@wordpress/plugins';

const validPostTypes = ['page'];

const isValidPostType = function (name) {
	return validPostTypes.includes(name);
};

let CustomLayoutPanel = () => {
	const postType = useSelect((select) => select('core/editor').getCurrentPostType());
	const metaValues = useSelect((select) => select('core/editor').getEditedPostAttribute('meta'));

	if (!postType || !isValidPostType(postType)) {
		return null;
	}

	const { main_offset, side_padding } = metaValues || {};
	const { editPost } = useDispatch('core/editor');

	const handleMainOffsetChange = (offsetValue) => {
		editPost({ meta: { main_offset: offsetValue } });
	};

	const handleSidePaddingChange = (paddingValue) => {
		editPost({ meta: { side_padding: paddingValue } });
	};

	const sizes = [
		{
			name: __('None'),
			slug: 'none',
		},
		{
			name: __('Small'),
			slug: 'small',
		},
		{
			name: __('Regular'),
			slug: 'regular',
		},
		{
			name: __('Medium'),
			slug: 'medium',
		},
		{
			name: __('Large'),
			slug: 'large',
		},
		{
			name: __('Extra large'),
			slug: 'xlarge',
		},
	];

	return (
		<PluginDocumentSettingPanel title={_x('Custom layout options', 'Editor sidebar panel title', 'latrigg')} initialOpen={true}>
			<DimensionControl
				label={'Main content offset'}
				value={main_offset}
				onChange={(value) => handleMainOffsetChange(value)}
				sizes={sizes}
			/>
			<DimensionControl
				label={'Page side padding'}
				value={side_padding}
				onChange={(value) => handleSidePaddingChange(value || '')}
				sizes={sizes}
			/>
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('latrigg-page-controls', { render: CustomLayoutPanel });
