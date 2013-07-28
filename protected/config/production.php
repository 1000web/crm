<?php
return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=1000web_crm',
            'emulatePrepare' => true,
            'username' => '1000web_crm',
            'password' => 'CRM1pass',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ),
    ),
);