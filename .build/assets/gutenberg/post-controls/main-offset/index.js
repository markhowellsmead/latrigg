import { _x } from '@wordpress/i18n';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __experimentalDimensionControl as DimensionControl } from '@wordpress/components';
import { useSelect, useDispatch } from '@wordpress/data';
import { registerPlugin } from '@wordpress/plugins';

const validPostTypes = ['page'];

const isValidPostType = function (name) {
	return validPostTypes.includes(name);
};

let CustomLayoutPanel = () => {
	const post_type = useSelect((select) => {
		return select('core/editor').getCurrentPostType();
	});

	if (!isValidPostType(post_type)) {
		return null;
	}

	const metaValues = useSelect((select) => {
		const { getEditedPostAttribute } = select('core/editor');
		return getEditedPostAttribute('meta');
	});

	const { main_offset } = metaValues;
	const { editPost } = useDispatch('core/editor');

	const handleMetaValueChange = (main_offset) => {
		editPost({ meta: { main_offset } });
	};

	return (
		<PluginDocumentSettingPanel title={_x('Custom layout options', 'Editor sidebar panel title', 'latrigg')} initialOpen={true} icon={'invalid-name-no-icon'}>
			<DimensionControl label={'Main content offset'} value={main_offset} onChange={(main_offset) => handleMetaValueChange(main_offset)} />
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('latrigg-page-controls', { render: CustomLayoutPanel });
