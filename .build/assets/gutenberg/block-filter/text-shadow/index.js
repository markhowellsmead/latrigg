import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { Fragment } from '@wordpress/element';
import { createHigherOrderComponent } from '@wordpress/compose';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import classnames from 'classnames';

const allowedBlocks = [
	'core/group',
	'core/columns',
	'core/media-text',
	'core/cover',
];

addFilter('blocks.registerBlockType', 'sht/block-text-shadow', (settings) => {
	if (!allowedBlocks.includes(settings.name)) {
		return settings;
	}

	return lodash.assign({}, settings, {
		attributes: lodash.assign({}, settings.attributes, {
			withTextShadow: {
				type: 'boolean',
				default: false,
			},
		}),
	});
});

addFilter(
	'editor.BlockEdit',
	'sht/block-text-shadow',
	createHigherOrderComponent((BlockEdit) => {
		return (props) => {
			const { name, attributes, setAttributes, isSelected } = props;
			const { withTextShadow } = attributes;

			if (!isSelected || !allowedBlocks.includes(name)) {
				return <BlockEdit {...props} />;
			}
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody
							title={__('Text shadow', 'latrigg')}
							initialOpen={true}
						>
							<ToggleControl
								label={__('Add text shadow')}
								checked={!!withTextShadow}
								onChange={() =>
									setAttributes({
										withTextShadow: !withTextShadow,
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
		const { withTextShadow } = attributes;

		if (!allowedBlocks.includes(name) || !withTextShadow) {
			return <BlockListBlock {...props} />;
		}

		return (
			<BlockListBlock
				{...props}
				className={classnames(className, 'with--text-shadow')}
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
	'sht/block-text-shadow',
	(extraProps, blockType, attributes) => {
		const { withTextShadow } = attributes;

		if (!allowedBlocks.includes(blockType.name)) {
			return extraProps;
		}

		if (!!withTextShadow) {
			extraProps.className = classnames(
				extraProps.className,
				'with--text-shadow'
			);
		}

		return extraProps;
	}
);
