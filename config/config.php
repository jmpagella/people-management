<?php

return [

    /* -----------------------------------------------------------------
     * Tables
     * -----------------------------------------------------------------
     * You can modify the name of the tables and run the migrations
     * -----------------------------------------------------------------
     */
    'tables' => [
        'categories'        => 'people_categories',
        'people'            => 'people',
        'people_categories' => 'people_people_categories',
        'attribute_types'   => 'people_attribute_types',
        'telephones'        => 'people_telephones',
        'emails'            => 'people_emails',
        'addresses'         => 'people_addresses',
        'notes'             => 'people_notes'
    ]

];