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

use Magento\Framework\Serialize\Serializer\Json;

class ProcessAdditionalData
{
    /**
     * @var Json
     */
    protected $serializer;

    /**
     * @param Json                                    $serializer
     * @param \Cytracon\CustomerAttributes\Helper\Data $attributeHelper
     */
    public function __construct(
        Json $serializer
    ) {
        $this->serializer      = $serializer;
    }
    /**
     * Convert presentation to storable input type.
     *
     * @param array $data
     *
     * @return array
     */
    public function convertDataAdditonal(array $data) : array
    {
        $dataAddition = [];

        if (isset($data['date_style'])) {
           $dataAddition['date_style'] = $data['date_style'];
        }

        if (isset($data['multiple_type'])) {
           $dataAddition['multiple_type'] = $data['multiple_type'];
        }

        if (isset($data['yes_no_type'])) {
            $dataAddition['yes_no_type'] = $data['yes_no_type'];
        }

        if (isset($data['select_type'])) {
            $dataAddition['select_type'] = $data['select_type'];
        }

        if (isset($data['select_style'])) {
            $dataAddition['select_style'] = $data['select_style'];
        }

        if (isset($data['from_date'])) {
            $dataAddition['date_range_min'] = $data['from_date'];
        }

        if (isset($data['to_date'])) {
            $dataAddition['date_range_max'] = $data['to_date'];
        }

        if (isset($data['default_value_datetime']) && $data['default_value_datetime']) {
            $dataAddition['default_value_datetime'] = $data['default_value_datetime'];
        }

        $data['additional_data'] = $this->serializer->serialize($dataAddition);

        return $data;
    }
}