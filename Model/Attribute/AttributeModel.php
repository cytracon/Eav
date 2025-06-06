<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_Eav
 * @copyright Copyright (C) 2021 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\Eav\Model\Attribute;

class AttributeModel
{
	const TYPE_BOOLEAN      = 'boolean';
	const TYPE_CHECKBOX     = 'checkbox';
	const TYPE_DATE         = 'date';
	const TYPE_DATETIME     = 'datetime';
	const TYPE_TIME         = 'time';
	const TYPE_EDITOR       = 'editor';
	const TYPE_HTML         = 'html';
	const TYPE_FILE         = 'file';
	const TYPE_HIDDEN       = 'hidden';
	const TYPE_IMAGE        = 'image';
	const TYPE_MULTISELECT  = 'multiselect';
	const TYPE_RADIO        = 'radio';
	const TYPE_SELECT       = 'select';
	const TYPE_SWATCH_IMAGE = 'swatch_visual';
	const TYPE_SWATCH_TEXT  = 'swatch_text';
	const TYPE_TEXT         = 'text';
	const TYPE_TEXTAREA     = 'textarea';
	const TYPE_MULTILINE    = 'multiline';

	/**
	 * Other
	 */
	const TYPE_VARCHAR      = 'varchar';
	const TYPE_INT	        = 'int';
	const TYPE_DECIMAL	    = 'decimal';
	const TYPE_STATIC	    = 'static';
	const TYPE_LABEL        = 'label';
	const TYPE_DISCOUNT     = 'discount';
}