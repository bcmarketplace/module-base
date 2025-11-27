# BCMarketplace_Base

Base module for the BCMarketplace namespace providing shared configuration for all BCMarketplace modules.

## What It Does

BCMarketplace_Base creates a central configuration section where you can manage settings for all BCMarketplace modules. Currently, it provides notification preferences so you can choose what types of updates you want to receive.

## Installation

1. Enable the module:
   ```bash
   bin/magento module:enable BCMarketplace_Base
   ```

2. Run setup upgrade:
   ```bash
   bin/magento setup:upgrade
   ```

3. Clear cache:
   ```bash
   bin/magento cache:flush
   ```

## Configuration

Navigate to: **Stores → Configuration → BCMarketplace → Base Settings**

### Notification Settings

- **Enable Notifications**: Turn notifications on or off
- **Subscribed to**: Choose which types of notifications you want to receive:
  - Product Updates
  - Announcements
  - Promotions

## Support

For questions or support, contact:
- **Email**: rbaako@baakoconsultingllc.com
- **Company**: Baako Consulting LLC

## License

Copyright © Baako Consulting LLC. All rights reserved.
