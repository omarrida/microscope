# Overview

Microscope is an internal Laravel API service that allows you to:

- Explore a curated list of college schools and analyze their associated ad products.
- Manage schools and manage the ad products that they offer and the price-point of each offering. This lets you price products per-school.
- Browse, sort, and filter ad products and view schools that support them.
- Export our partner schools to a spreadsheet.

## API Docs

Microscope's API is documented (with examples) on Postman, so [check them out](https://documenter.getpostman.com/view/1971267/S17nVB2Y).

## Setup Guide

To setup Microscope on your local machine, just follow these easy steps.

> Note that this guide assumes your machine satisfies the requirements for Laravel 5.8 and Valet. If not, you'll need to checkout https://laravel.com/docs/5.8 or email me at omarrida94@gmail.com for help :)

1. Clone the repository
2. Run composer install
3. Add a MySQL connection to your .env file
4. Run the migrations and seed

## TODO

[ ] Change the term "circulation" to "population".
[ ] Create a seeder that inserts all the states.
[ ] Refactor cities into a new model.
[ ] Integrate the [Spatie Query Builder](https://github.com/spatie/laravel-query-builder) for easy filters/sorting.
[ ] Write tests for CSV export and getting products by value.
[ ] Refactor SchoolProduct => Product and Product => ProductType.
[ ] Write a listener to check for edits to product price and school circulation, and update the calculated value accordingly.
[ ] Agree with internal team on auth strategy.
