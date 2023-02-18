import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { Fragment } from '@wordpress/element';
import { createHigherOrderComponent } from '@wordpress/compose';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import classnames from 'classnames';

const allowedBlocks = ['core/group', 'core/columns', 'core/media-text'];

addFilter('blocks.registerBlockType', 'sht/group-box-shadow', (settings) => {
	if (!allowedBlocks.includes(settings.name)) {
		return settings;
	}

	return lodash.assign({}, settings, {
		attributes: lodash.assign({}, settings.attributes, {
			withShadow: {
				type: 'boolean',
				default: false,
			},
		}),
	});
});

addFilter(
	'editor.BlockEdit',
	'sht/group-box-shadow',
	createHigherOrderComponent((BlockEdit) => {
		return (props) => {
			const { name, attributes, setAttributes, isSelected } = props;
			const { withShadow } = attributes;

			if (!isSelected || !allowedBlocks.includes(name)) {
				return <BlockEdit {...props} />;
			}
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody
							title={__('Design', 'latrigg')}
							initialOpen={true}
						>
							<ToggleControl
								label={__('Add shadow')}
								checked={!!withShadow}
								onChange={() =>
									setAttributes({
										withShadow: !withShadow,
									})
								}
							/>
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		};
	})
);

const addEditorClass = createHigherOrderComponent((BlockListBlock) => {
	return (props) => {
		const { attributes, className, name } = props;
		const { withShadow } = attributes;

		if (!allowedBlocks.includes(name) || !withShadow) {
			return <BlockListBlock {...props} />;
		}

		return (
			<BlockListBlock
				{...props}
				className={classnames(className, 'with--container-shadow')}
			/>
		);
	};
}, 'withClientIdClassName');

addFilter(
	'editor.BlockListBlock',
	'sht/allow-block-backgroundfixed-editor-class',
	addEditorClass
);

addFilter(
	'blocks.getSaveContent.extraProps',
	'sht/group-box-shadow',
	(extraProps, blockType, attributes) => {
		const { withShadow } = attributes;

		if (!allowedBlocks.includes(blockType.name)) {
			return extraProps;
		}

		if (!!withShadow) {
			extraProps.className = classnames(
				extraProps.className,
				'with--container-shadow'
			);
		}

		return extraProps;
	}
);
