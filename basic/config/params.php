<?php

$proto = 'http://';
$base_domain = 'dev.brain9d.com';

return [
    'noReplyEmail' => 'admin@brain9d.com',
    'contact-us-email' => 'info@brain9d.com',
    'cors' => [
        'Access-Control-Allow-Origin' => ['*'],
        'Origin' => ['*'],
        'Access-Control-Request-Method' => ['GET', 'PUT', 'POST', 'DELETE'],
        'Access-Control-Request-Headers' => ['Authorization', 'Content-Type'],
        'Access-Control-Allow-Credentials' => true,
        'Access-Control-Max-Age' => 3600,
        'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page',
            'X-Pagination-Page-Count', 'X-Pagination-Per-Page', 'X-Pagination-Total-Count '],
    ],
    'baseUrlForEmails' => $proto . $base_domain,
    'webuiBaseUrl' => $proto . $base_domain,
    'apiBaseUrl' => $proto . 'api.' . $base_domain,
    'forumBaseUrl' => $proto . $base_domain . '/forum/',
    'cmsBaseUrl' => $proto . 'cms.' . $base_domain,
    'forumSettings' => '/../../../extensions/Smfapi.php',
    //    
    // PayPal
    // DEV SANDBOX ACCOUNT
    'client-id' => 'AfwX4iEY2Tvd3hshM11AfhOYBt-Gtif4vq6AhhroN1G4ig9UZ0b3aA_aN1Ax7c0A1qV6HI1dDlBFQSnm',
    'client-secret' => 'EE_yfcswzQ53o_TUTvhS8KY4iHRXOWSuKIDkG3GlAEq7nXWDg-vNVmAYmEha4ybz8xPDDE7gk_PtuvHV',
    // BETA SANDBOX ACCOUNT
    // 'client-id' => 'AZ3QyUkcdgcVN25oGSjL9D5J_WLecbEIT0Tn4qiM_2kS_9lhez8oORYbUwuvGr_lRlqUfovzD1OcNE_I',
    // 'client-secret' => 'ELMs5jcdWho1Pgl4sKbCeUAQULrLiB2PHlOKsy_0RFVnINkyo6RengsH_MWm40BrloJB6pkFRIKTjBnj',
    //
    // 2CheckOut
    // DEV SANDBOX ACCOUNT
    'private_key' => '91CED96E-1471-4205-96D6-16093BB9565F',
    'seller_id' => '901341537',
    // BETA SANDBOX ACCOUNT
    // 'private_key' => '91CED96E-1471-4205-96D6-16093BB9565F',
    // 'seller_id' => '821C0D52-CD59-4E6A-A83E-3350B885DA5F',
    // 
    // URLs
    'paypal-return-url' => $proto . $base_domain . '/#/payment-verification',
    'paypal-cancel-url' => $proto . $base_domain . '/#/payment-verification',
    // USER FORM FILLING CONFIGURATIONS FOR FREE USER
    'form_filling_count_monthly' => 1,
    'form_filling_count_daily' => 1,
    'form_reminder_email_after_day' => 0,
    // DEFAULT LANGUAGE
    'default_language' => 'en-US',
];
