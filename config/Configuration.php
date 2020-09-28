<?php

class Configuration
{

    const
        DATABASE_HOSTNAME = "",
        DATABASE_PORT = 33066,
        DATABASE_NAME = "",
        DATABASE_USERNAME = "",
        DATABASE_PASSWORD = "",
        CAPTCHA_SECRET_KEY = '',
        CAPTCHA_VERIFICATION_URL = '',
        SITE_URL = '',

        // Email configuration
        SENDER_EMAIL = '',
        SENDER_PASSWORD = '',
        SENDER_NAME = '',
        SMTP_SERVER_HOSTNAME = '',
        SMTP_SERVER_PORT = 587,
        SMTP_ENCRYPTION = '',
        SMTP_OPTIONS = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


}