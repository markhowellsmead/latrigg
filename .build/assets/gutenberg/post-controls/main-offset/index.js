import { _x } from '@wordpress/i18n';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __experimentalDimensionControl as DimensionControl, ToggleControl } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { withDispatch, withSelect } from '@wordpress/data';
import { registerPlugin } from '@wordpress/plugins';

const validPostTypes = ['page'];

const isValidPostType = function (name) {
	return validPostTypes.includes(name);
};

let CustomLayoutPanel = ({ main_offset, post_type, onUpdateMainOffset }) => {
	if (!isValidPostType(post_type)) {
		return null;
	}

	return (
		<PluginDocumentSettingPanel title={_x('Custom layout options', 'Editor sidebar panel title', 'latrigg')} initialOpen={true} icon={'invalid-name-no-icon'}>
			<DimensionControl label={'Main content offset'} value={main_offset} onChange={(main_offset) => onUpdateMainOffset(main_offset)} />
		</PluginDocumentSettingPanel>
	);
};

const CustomLayoutPanelWithCompose = compose([
	withSelect((select) => {
		return {
			main_offset: select('core/editor').getEditedPostAttribute('meta')['main_offset'],
			post_type: select('core/editor').getCurrentPostType(),
		};
	}),
	withDispatch((dispatch) => {
		return {
			onUpdateMainOffset: (main_offset) => {
				dispatch('core/editor').editPost({ meta: { main_offset } });
			},
		};
	}),
])(CustomLayoutPanel);

registerPlugin('latrigg-page-controls', { render: CustomLayoutPanelWithCompose });
