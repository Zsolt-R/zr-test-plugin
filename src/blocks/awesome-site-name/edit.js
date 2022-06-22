/**
 * WordPress dependencies
 */
import { RichText, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';

function Edit({ attributes, setAttributes }) {
	const { prefix } = attributes;

	const siteData = useSelect((select) => select('core').getSite());

	return (
		<div {...useBlockProps()}>
			<RichText
				tagName="span"
				className="prefix"
				placeholder={__('Prefix ex: Awesome …', 'zr-test-plugin')}
				value={prefix}
				onChange={(value) => setAttributes({ prefix: value })}
			/>{' '}
			{siteData?.title}
		</div>
	);
}

export default Edit;
