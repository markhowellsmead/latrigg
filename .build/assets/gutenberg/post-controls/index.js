import { _x, __ } from '@wordpress/i18n';
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { useSelect, useDispatch } from '@wordpress/data';
import { registerPlugin } from '@wordpress/plugins';
import { SelectControl } from '@wordpress/components';

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

	const mainOffset = Array.isArray(main_offset) ? main_offset[0] : main_offset;
	const sidePadding = Array.isArray(side_padding) ? side_padding[0] : side_padding;

	const handleMainOffsetChange = (offsetValue) => {
		editPost({ meta: { main_offset: offsetValue } });
	};

	const handleSidePaddingChange = (paddingValue) => {
		console.log('Padding value changed:', paddingValue);
		editPost({ meta: { side_padding: paddingValue } });
	};

	const sizes = [
		{
			label: __('None'),
			value: 'none',
		},
		{
			label: __('Small'),
			value: 'small',
		},
		{
			label: __('Regular'),
			value: 'regular',
		},
		{
			label: __('Medium'),
			value: 'medium',
		},
		{
			label: __('Large'),
			value: 'large',
		},
		{
			label: __('Extra large'),
			value: 'xlarge',
		},
	];

	return (
		<PluginDocumentSettingPanel title={_x('Custom layout options', 'Editor sidebar panel title', 'latrigg')} initialOpen={true}>
			<SelectControl
				label={'Main content offset'}
				onChange={(value) => handleMainOffsetChange(value)}
				value={mainOffset}
				options={sizes}
			/>
			<SelectControl
				label={'Page side padding'}
				onChange={(value) => handleSidePaddingChange(value)}
				value={sidePadding}
				options={sizes}
			/>
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('latrigg-page-controls', { render: CustomLayoutPanel });
