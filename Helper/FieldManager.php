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

namespace Cytracon\Eav\Helper;

use Magento\Eav\Model\Adminhtml\System\Config\Source\InputtypeFactory;
use Magento\Framework\Module\Manager as ModuleManager;
use Cytracon\Eav\Model\Attribute\AttributeModel as Attribute;

class FieldManager extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var InputtypeFactory
     */
    protected $inputTypeFactory;

    /**
     * @var ModuleManager
     */
    protected $moduleManager;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param InputtypeFactory $inputTypeFactory
     * @param ModuleManager $moduleManager
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        InputtypeFactory $inputTypeFactory,
        ModuleManager $moduleManager
    ) {
        parent::__construct($context);
        $this->inputTypeFactory = $inputTypeFactory;
        $this->moduleManager    = $moduleManager;
    }

    /**
     * @param $fieldset
     * @param string $type
     * @param string $key
     * @param string $label
     * @param string $class
     * @param string $note
     * @param string $dateFormat
     * @param string $options
     * @param string $timeFormat
     * @param string $require
     * @param string $afterField
     * @param string $config
     * @return FieldManager [type]
     */
	public function createField($fieldset, $type, $key, $label, $class = '', $note = '', $dateFormat = '', $options = '', $timeFormat= '', $require = '0', $afterField = '', $config = '')
	{
		$fieldset->addField(
			$key,
            $type,
            [
                'name' => $key,
                'label' => __('%1', $label),
                'title' => __('%1', $label),
                'class' => $class,
                'note' => __('%1', $note),
                'date_format' => $dateFormat,
                'time_format' => $timeFormat,
                'values' => $options,
                'required' => $require,
                'config' => $config,
            ],
            $afterField
        );
        return $this;
	}

    /**
     * @param  [type] $fieldset 
     * @param  string $key      
     * @param  string $label    
     * @param  array $value     
     * @param  array $options   
     * @param  string $class    
     * @param  string $note     
     * @return [type]           
     */
    public function createSelectField($fieldset, $key, $label, $options, $class = '', $note = '', $require = 0, $afterField = '')
    {
        return $this->createField($fieldset, Attribute::TYPE_SELECT, $key, $label, $class , $note, '', $options , '', $require, $afterField);
    }

    /**
     * @param  [type] $fieldset 
     * @param  string $key      
     * @param  string $label    
     * @param  string $value    
     * @param  string $note     
     * @param  string $class    
     * @return [type]           
     */
    public function createTextField($fieldset, $key, $label, $note = '', $class = '', $require = 0, $afterField = '')
    {
        return $this->createField($fieldset, Attribute::TYPE_TEXT, $key, $label, $class , $note, '', '' , '', $require, $afterField);
    }

    /**
     * @param  [type] $fieldset   
     * @param  string $key        
     * @param  string $label      
     * @param  string $value      
     * @param  string $dateFormat 
     * @param  string $timeFormat 
     * @param  string $note       
     * @param  string $class      
     * @return [type]             
     */
    public function createDateTimeField($fieldset, $key, $label, $dateFormat, $timeFormat = '', $note = '', $class = '', $require = 0, $afterField = '')
    {
        return $this->createField($fieldset, Attribute::TYPE_DATE, $key, $label, $class , $note, $dateFormat, '' , $timeFormat, $require, $afterField);
    }

    /**
     * @param  [type] $fieldset 
     * @param  string $key      
     * @param  string $label    
     * @param  string $value    
     * @param  string $note     
     * @param  string $class    
     * @return [type]           
     */
    public function createTextAreaField($fieldset, $key, $label, $note = '', $class = '', $require = 0, $afterField = '')
    {
        return $this->createField($fieldset, Attribute::TYPE_TEXTAREA, $key, $label, $class , $note, '', '' , '', $require, $afterField);
    }

    /**
     * @param $fieldset
     * @param string $key
     * @param string $label
     * @param string $option
     * @param string $note
     * @param string $class
     * @param string $require
     * @param string $afterField
     * @return FieldManager [type]
     */
    public function createMultiselectaField($fieldset, $key, $label, $option, $note = '', $class = '', $require = '', $afterField = '')
    {
        return $this->createField($fieldset, Attribute::TYPE_MULTISELECT, $key, $label, $class , $note, '', $option , '', $require, $afterField);
    }

    /**
     * @param $fieldset
     * @param string $key
     * @param string $label
     * @param string $note
     * @param string $class
     * @param int $require
     * @param string $afterField
     * @param array $config
     * @return FieldManager [type]
     */
    public function createEditorField($fieldset, $key, $label, $note = '', $class = '', $require = 0, $afterField = '', $config = [])  
    {
        return $this->createField($fieldset, Attribute::TYPE_EDITOR, $key, $label, $class , $note, '', '' , '', $require, $afterField, $config);
    }

    /**
     * @return array
     */
    public function multiType()
    {
        return [
            [
                'value' => 'multi_option',
                'label' => __('Option')
            ],
            [
                'value' => 'multi_checkbox',
                'label' => __('Checkbox')
            ],
        ];
    }

    /**
     * @return array
     */
    public function selectType()
    {
        return [
            [
                'value' => 'select_option',
                'label' => __('Option')
            ],
            [
                'value' => 'select_radio',
                'label' => __('Radio')
            ],
        ];
    }

    /**
     * @return array
     */
    public function selectStyle()
    {
        return [
            [
                'value' => 'horizontal',
                'label' => __('Horizontal')
            ],
            [
                'value' => 'vertical',
                'label' => __('Vertical')
            ],
        ];
    }

    /**
     * @return array
     */
    public function booleanType()
    {
        return [
            [
                'value' => 'yesno_option',
                'label' => __('Option')
            ],
            [
                'value' => 'yesno_radio',
                'label' => __('Toggle')
            ],
        ];
    }


    /**
     * @param $tab
     * @param $attribute
     * @return FieldManager [type]            [description]
     */
    public function createTab($tab, $attribute) 
    {
        $tab->addTab(
            'main',
            [
                'label' => __('Properties'),
                'title' => __('Properties'),
                'content' => $tab->getChildHtml('main'),
                'active' => true
            ]
        );
        
        $tab->addTab(
            'labels',
            [
                'label' => __('Manage Labels'),
                'title' => __('Manage Labels'),
                'content' => $tab->getChildHtml('labels')
            ]
        );

        $tab->addTab(
            'front',
            [
                'label' => __('Storefront Properties'),
                'title' => __('Storefront Properties'),
                'content' => $tab->getChildHtml('front')
            ]
        );
        
        $frontendInput = $attribute->getFrontendInput();
        if ($this->_moduleManager->isEnabled('Cytracon_CustomerAttributes')) {
            if ($frontendInput == Attribute::TYPE_MULTISELECT || $frontendInput == Attribute::TYPE_SELECT || $frontendInput == Attribute::TYPE_BOOLEAN) {
                $tab->addTab(
                    'reports',
                    [
                        'label' => __('Analytics'),
                        'title' => __('Analytics'),
                        'content' => $tab->getChildHtml('reports')
                    ]
                );
            }
        }

        return $this;
    }

    /**
     * @param  array $data
     * @return array
     */
    public function getDefaultValues($data) : array
    {
        if (isset($data['frontend_input'])) {
            switch ($data['frontend_input']) {
                case Attribute::TYPE_DATE:
                    $data['default_value_date'] = $data['default_value'];
                    break;

                case Attribute::TYPE_DATETIME:
                    $data['default_value_datetime'] = $data['default_value'];
                    break;    

                case Attribute::TYPE_BOOLEAN:
                    $data['default_value_yesno'] = $data['default_value'];
                    break;
                
                case Attribute::TYPE_TEXTAREA:
                case Attribute::TYPE_EDITOR:
                    $data['default_value_textarea'] = $data['default_value'];
                    break;        

                case Attribute::TYPE_TEXT:
                    $data['default_value_text'] = $data['default_value'];
                    break;

                case Attribute::TYPE_HTML:
                    $data['default_value_html'] = $data['default_value'];
                    break;

                case Attribute::TYPE_TIME:
                    $data['default_value_time'] = $data['default_value'];
                    break;
            }
        }

        return $data;
    }

    /**
     * @param bool $isCustomerAttribute
     * @return array
     */
    public function getAttributeTypes($isCustomerAttribute = false)
    {
        $attributes = $this->inputTypeFactory->create()->toOptionArray();
        $attributes = array_values($attributes);
        $pos = array_search('select', array_column($attributes, 'value'));
        $attributes[$pos]['label'] = __('Select');
        if ($isCustomerAttribute) {
            $attributes[] = ['value' => Attribute::TYPE_IMAGE, 'label' => __('Image')];
            $attributes[] = ['value' => Attribute::TYPE_FILE, 'label' => __('File')];
            $attributes[] = ['value' => Attribute::TYPE_SWATCH_IMAGE, 'label' => __('Visual Swatch')];
            $attributes[] = ['value' => Attribute::TYPE_SWATCH_TEXT, 'label' => __('Text Swatch')];
        } else {
            $pos2 = array_search(Attribute::TYPE_DATETIME, array_column($attributes, 'value'));
            $pos3 = array_search(Attribute::TYPE_EDITOR, array_column($attributes, 'value'));
            unset($attributes[$pos2], $attributes[$pos3]);
        }
        return $attributes;
    }
}
