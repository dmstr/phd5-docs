<!-- file generated with AI assistance: Claude Code - 2026-03-19 -->

Cookie Consent
==============

The phd5 application includes a cookie consent system based on the `dmstr/yii2-cookie-consent` package. It provides a configurable banner that lets users accept or reject cookie categories, and a server-side helper to conditionally load scripts based on the user's consent.

## Package

The package is included as a dependency in `src/composer.phd5.json`:

```json
"dmstr/yii2-cookie-consent": "^1.4.3"
```

Source code and documentation: [github.com/dmstr/yii2-cookie-consent](https://github.com/dmstr/yii2-cookie-consent)

## Components

### CookieConsentHelper

The helper is registered as an application component in `config/web.php`:

```php
'components' => [
    'cookieConsentHelper' => [
        'class' => dmstr\cookieconsent\components\CookieConsentHelper::class
    ],
],
```

This provides the `hasConsent()` method for checking consent status server-side.

### CookieConsent Widget

The widget renders the cookie banner popup. Place it in your main layout so it appears on every page:

```php
use dmstr\cookieconsent\widgets\CookieConsent;

<?= CookieConsent::widget([
    'name' => 'cookie_consent_status',
    'path' => '/',
    'domain' => '',
    'expiryDays' => 365,
    'message' => Yii::t('cookie-consent', 'We use cookies to ensure the proper functioning of our website. For an improved visit experience we use analysis products. These are used when you agree with "Statistics".'),
    'save' => Yii::t('cookie-consent', 'Save'),
    'acceptAll' => Yii::t('cookie-consent', 'Accept all'),
    'controlsOpen' => Yii::t('cookie-consent', 'Change'),
    'detailsOpen' => Yii::t('cookie-consent', 'Cookie Details'),
    'learnMore' => Yii::t('cookie-consent', 'Privacy statement'),
    'visibleControls' => false,
    'visibleDetails' => false,
    'link' => \yii\helpers\Url::to('privacy'),
    'consent' => [
        'necessary' => [
            'label' => Yii::t('cookie-consent', 'Necessary'),
            'checked' => true,
            'disabled' => true,
            'details' => [
                [
                    'title' => 'PHPSESSID',
                    'description' => 'PHP session cookie'
                ],
                [
                    'title' => '_csrf',
                    'description' => 'CSRF protection token'
                ],
                [
                    'title' => '_language',
                    'description' => 'Language preference'
                ]
            ]
        ],
        'statistics' => [
            'label' => Yii::t('cookie-consent', 'Statistics'),
            'cookies' => [
                ['name' => '_ga'],
                ['name' => '_gat', 'domain' => '', 'path' => '/'],
                ['name' => '_gid', 'domain' => '', 'path' => '/']
            ]
        ]
    ]
]) ?>
```

#### Widget Options

| Option            | Description                                                   |
|-------------------|---------------------------------------------------------------|
| `name`            | Cookie name used to store the consent status                  |
| `path`            | Cookie path                                                   |
| `domain`          | Cookie domain (empty string for current domain)               |
| `expiryDays`      | Number of days until the consent cookie expires               |
| `message`         | Banner text explaining the cookie usage                       |
| `save`            | Label for the save button                                     |
| `acceptAll`       | Label for the accept-all button                               |
| `controlsOpen`    | Label for toggling category checkboxes                        |
| `detailsOpen`     | Label for toggling cookie details                             |
| `learnMore`       | Label for the privacy policy link                             |
| `link`            | URL to the privacy policy page                                |
| `visibleControls` | Whether category checkboxes are visible by default            |
| `visibleDetails`  | Whether cookie details are visible by default                 |
| `consent`         | Array of consent categories (see below)                       |

#### Consent Categories

Each entry in the `consent` array defines a cookie category:

- **`label`** — Display name of the category
- **`checked`** — Whether the checkbox is pre-checked (use for mandatory categories)
- **`disabled`** — Whether the user can uncheck it (use `true` for necessary cookies)
- **`details`** — Array of `title`/`description` pairs documenting individual cookies
- **`cookies`** — Array of cookie definitions (`name`, `domain`, `path`) that will be deleted when the user revokes consent for this category

## Conditionally Loading Scripts

Use `CookieConsentHelper::hasConsent()` to load tracking scripts or other third-party code only when the user has given consent for the respective category:

```php
<?php if (\Yii::$app->cookieConsentHelper->hasConsent('statistics')): ?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXX-X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXX-X');
    </script>
<?php endif; ?>
```

You can use this pattern for any category defined in the widget configuration:

```php
<?php if (\Yii::$app->cookieConsentHelper->hasConsent('marketing')): ?>
    <!-- Facebook Pixel, ad scripts, etc. -->
<?php endif; ?>
```

## Adding Custom Categories

To add a new consent category (e.g. `marketing`), add it to the `consent` array in the widget configuration:

```php
'consent' => [
    'necessary' => [ /* ... */ ],
    'statistics' => [ /* ... */ ],
    'marketing' => [
        'label' => Yii::t('cookie-consent', 'Marketing'),
        'cookies' => [
            ['name' => '_fbp', 'domain' => '', 'path' => '/'],
        ],
        'details' => [
            [
                'title' => 'Facebook Pixel',
                'description' => 'Used for ad targeting and measurement'
            ]
        ]
    ]
]
```

Then wrap the corresponding scripts with the `hasConsent()` check as shown above.

## User Flow

1. On first visit, the cookie banner appears (`.cookie-consent-popup`)
2. The user can click **Accept all** or toggle individual categories and click **Save**
3. The consent decision is stored in the `cookie_consent_status` cookie
4. On subsequent page loads, `hasConsent()` reads the cookie and returns the appropriate result
5. If a user revokes consent for a category, the cookies listed in that category's `cookies` array are automatically deleted
6. A page reload after consent changes ensures server-side `hasConsent()` checks reflect the updated state

## CSS Classes

The widget uses these CSS classes for styling and interaction:

| Class                          | Element                              |
|--------------------------------|--------------------------------------|
| `.cookie-consent-popup`        | Main banner container                |
| `.cookie-consent-accept-all`   | Accept all button                    |
| `.cookie-consent-save`         | Save selection button                |
| `.cookie-consent-controls-toggle` | Toggle for category checkboxes    |
| `.cookie-consent-details-toggle`  | Toggle for cookie details         |
| `.cookie-consent-controls`     | Category checkboxes container        |
| `.cookie-consent-details`      | Cookie details container             |
| `.cookie-consent-link`         | Privacy policy link                  |
| `.cookie-consent-toggle`       | Re-open banner after dismissal       |
