/*
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save() {
	return (
		<p {...useBlockProps.save()}>
			{__('Myblock – hello from the saved content!', 'myblock')}
		</p>
	);
}
*/

import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
    return <div { ...useBlockProps.save() }>{ attributes.message }</div>;
}
