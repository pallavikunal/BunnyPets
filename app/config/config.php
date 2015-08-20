<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | Number of records show on per page for pagination
      |--------------------------------------------------------------------------
      |
      | The max row value defineds the default value that will be used to show
      | as limit in per query and that number of rows only shown in per page.
      |
     */
    'max_num_rows' => 8,
    /*
      |--------------------------------------------------------------------------
      | Number of categories shown on Home page
      |--------------------------------------------------------------------------
      |
      | The max_categories_num defined the default value that will be used to show
      | the number of categories on Home Page
      |
     */
    'max_categories_num' => 6,
    /*
      |--------------------------------------------------------------------------
      | Number of regions shown on Home page
      |--------------------------------------------------------------------------
      |
      | The max_regions_num defined the default value that will be used to show
      | the number of regions on Home Page
      |
     */
    'max_regions_num' => 8,
    /*
      |--------------------------------------------------------------------------
      | Percentage of Amount admin will receive from each tour
      |--------------------------------------------------------------------------
      |
      | The comission defined the default value that will be used represent the
      | percentage of amount admin will received from each tour operators tour.
      |
     */
    'comission' => 0,
    /*
      |--------------------------------------------------------------------------
      | Mode of CCAvenue Payment gateway
      |--------------------------------------------------------------------------
      |
      | The default mode is "test".i.e. CCAvenue is work with the test mode. For
      | production server or if we want to use CCAvenue as live then please change
      | mode to "prod"
      |
     */
    'CCAvenue_access_mode' => 'test',
    /*
      |--------------------------------------------------------------------------
      | CCAvenue test URL
      |--------------------------------------------------------------------------
      |
      | This is the test environment or sandbox URL of CCAvenue payment gateway.
      | Please use this URL for testing purpose only.
      |
     */
    'CCAvenue_test_url' => 'https://test.ccavenue.com',
    /*
      |--------------------------------------------------------------------------
      | CCAvenue LIVE / production URL
      |--------------------------------------------------------------------------
      |
      | The LIVE or production URL for CCAvenue payment gateway. Please use this URL
      | in production environment or in Live server for processing actual payments.
      |
     */
    'CCAvenue_prod_url' => 'https://secure.ccavenue.com',
    /*
      |--------------------------------------------------------------------------
      | CCAvenue Merchant ID
      |--------------------------------------------------------------------------
      |
      | This is the identifier for our CCAvenue merchant Account.
      | We must send this with each request.
      |
     */
    'CCAvenue_Merchant_id' => 50744,
    /*
      |--------------------------------------------------------------------------
      | CCAvenue Access Code
      |--------------------------------------------------------------------------
      |
      | This is the access code for our application. We must send this with each request.
      |
     */
    'CCAvenue_Access_code' => 'AVUR03BL68BJ80RUJB',
    /*
      |--------------------------------------------------------------------------
      | CCAvenue Encryption Key
      |--------------------------------------------------------------------------
      |
      | Below are the secret keys used for encrypting each request originating from
      | our applications. Ensures us that we are using the correct key while encrypting
      | requests from different URLs registered with CCAvenue.
      |
     */
    'CCAvenue_Enc_key' => '2DDAEE7255B2022A427897F321DC5401',
    /*
      |--------------------------------------------------------------------------
      | Id of contact Us (email)
      |--------------------------------------------------------------------------
      |
      | This is the contact Us email Id from travel_settings table
      |
      |
     */
    'contact_us' => 1,
    /*
      |--------------------------------------------------------------------------
      | CCAvenue_Currency
      |--------------------------------------------------------------------------
      |
      | This is the Currency using at payment
      |
      |
     */
    'CCAvenue_currency' => 'INR',
    /*
      |--------------------------------------------------------------------------
      | CCAvenue_Currency
      |--------------------------------------------------------------------------
      |
      | This is the Currency using at payment
      |
      |
     */
    'CCAvenue_language' => 'EN',
    /*
      |--------------------------------------------------------------------------
      | MAX_FILE_UPLOAD_NUMBER
      |--------------------------------------------------------------------------
      |
      | This is the Max tour images should upload
      |
      |
     */
    'MAX_FILE_UPLOAD_NUMBER' => '10',
);
