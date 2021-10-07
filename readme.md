## Officegest SMS (Laravel Package)

This is a laravel package to send sms using officegest.

## Installation

    composer require officegest/officegest-send-sms

Laravel < 8.0 Add ServiceProvider to your `config/app.php`

    Officegest\OfficegestSms\OfficegestSmsServiceProvider::class,

If you need to publish the config file for this package. This will add the file `config/officegest-sms.php`, where you can configure this package.

    $ php artisan vendor:publish --provider="Officegest\OfficegestSms\OfficegestSmsServiceProvider" --tag=config

You need add this variables to your .env

    OFFICEGEST_SMS_ACTIVE=true
    OFFICEGEST_SMS_URL="your_officegest_url"
    OFFICEGEST_SMS_USER="your_user"
    OFFICEGEST_SMS_KEY="your_api_key"



## Usage

### Function OfficegestSms->send()

Parameters: string $phone_number, string $text

![Screenshot](https://i.imgur.com/nUccGsU.png)

## Security

If you discover any security related issues, please email suporte@guisoft.net or use issues of this repo.

## Credits

- [Officegest.com][link-author]
- [Guisoft.net][link-guisoft]
- [All Contributors][link-contributors]


[link-author]: https://officegest.com
[link-guisoft]: https://guisoft.net
[link-contributors]: ../../contributors
