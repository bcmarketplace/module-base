<?php
/**
 * Copyright © Baako Consulting LLC. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace BCMarketplace\Base\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Configuration model for BCMarketplace Base module
 *
 * Provides methods to read notification configuration values.
 *
 * @author Raphael Baako <rbaako@baakoconsultingllc.com>
 * @company Baako Consulting LLC
 */
class Config
{
    private const XML_PATH_NOTIFICATIONS_ENABLED = 'bcmarketplace/notifications/enabled';
    private const XML_PATH_NOTIFICATIONS_SUBSCRIBED_TO = 'bcmarketplace/notifications/subscribed_to';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Check if notifications are enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isNotificationsEnabled(?int $storeId = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_NOTIFICATIONS_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get subscribed notification types
     *
     * Returns an array of selected notification option values.
     * Multiselect values are stored as comma-separated strings.
     *
     * @param int|null $storeId
     * @return array
     */
    public function getSubscribedNotificationTypes(?int $storeId = null): array
    {
        $value = $this->scopeConfig->getValue(
            self::XML_PATH_NOTIFICATIONS_SUBSCRIBED_TO,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );

        if (empty($value)) {
            return [];
        }

        // Handle both string and array formats
        if (is_string($value)) {
            return array_filter(explode(',', $value));
        }

        return is_array($value) ? $value : [];
    }

    /**
     * Check if a specific notification type is subscribed
     *
     * @param string $notificationType
     * @param int|null $storeId
     * @return bool
     */
    public function isSubscribedTo(string $notificationType, ?int $storeId = null): bool
    {
        if (!$this->isNotificationsEnabled($storeId)) {
            return false;
        }

        $subscribedTypes = $this->getSubscribedNotificationTypes($storeId);
        return in_array($notificationType, $subscribedTypes, true);
    }
}

