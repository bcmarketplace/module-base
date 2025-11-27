<?php
/**
 * Copyright © Baako Consulting LLC. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace BCMarketplace\Base\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Source model for notification subscription options
 *
 * Provides options for the multiselect field in system configuration.
 *
 * @author Raphael Baako <rbaako@baakoconsultingllc.com>
 * @company Baako Consulting LLC
 */
class NotificationOptions implements OptionSourceInterface
{
    public const PRODUCT_UPDATES = 'product_updates';
    public const ANNOUNCEMENTS = 'announcements';
    public const PROMOTIONS = 'promotions';

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: [['value' => '<value>', 'label' => '<label>'], ...]
     */
    public function toOptionArray(): array
    {
        return [
            [
                'value' => self::PRODUCT_UPDATES,
                'label' => __('Product Updates')
            ],
            [
                'value' => self::ANNOUNCEMENTS,
                'label' => __('Announcements')
            ],
            [
                'value' => self::PROMOTIONS,
                'label' => __('Promotions')
            ]
        ];
    }
}

