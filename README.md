<snippet>
# Logic in PHP test

Simple test to see the impact on performance depending on whether the data selection logic (in most cases called businesslogic) is in SQL or PHP.

This test creates 100 000 seeds and selects the records both in SQL (query) and PHP (filter).

The purpose is to consider moving the business logic from the database layer to the PHP layer to enable unit testing on the PHP side.

## Installation

composer install

vendor/bin/phinx migrate

vendor/bin/phinx seed:run

## Usage

Just run php index.php
</snippet>
