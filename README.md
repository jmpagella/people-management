
# people-management (Laravel Package)
This package allows basic contact management generating the structures and models necessary to carry it out.

## Installation

Through the composer:

    composer require jmpagella/people-management

Then run the migrations:

    php artisan migrate

## Tables

After you run the migration, 8 tables will be created:

 - People
 - PeopleCategory
 - People-PeopleCategory
 - PeopleAttributeType
 - PeopleTelephone
 - PeopleEmail
 - PeopleAddress
 - PeopleNote

## Basic Usage

### New Person

    $people = new People();  
    $people->name = 'John';
    $people->last_name = 'Doe';  
    $people->save();

Or you can use:

    $people = People::create(['name' => 'John', 'last_name' => 'Doe']);

### New Telephone/Email/Address/Note

    $people = People::find(1);  
    PeopleTelephone::create(['people_id' => $people->id, 'telephone' => '444-5555']);


### Get Telephones/Emails/Addresses/Notes

    $people = People::find(1);
    $people->telephones;

### Create a category and assign to person

    $category = PeopleCategory::create(['name' => 'Client']); 
    $people = People::find(1);  
    $people->categories()->attach($category);  
    $people->categories;

## License
This project is licensed under the terms of the MIT license.
