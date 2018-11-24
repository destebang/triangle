# Triangle type kata

## Run the app

```
composer install
php app.php triangle:find-type 1.21 1.23 1.22
```

## Run tests

```
composer install
vendor/bin/phpunit
```

## Design decisions

### Model
I have used inheritance to describe the three triangles
as the different lengths information is inherent to the 
triangle itself, as well as the type.

I have used composition to describe the triangles, as it
offers the opportunity to encapsulate all the responsibilities
in each Value Object.

This way:

* Triangle is composed with a TriangleSides VO.
* TriangleSides is compose with three TriangleSide VO and has the responsibility
of calculating the difference.
* TriangleSides enforces lengths validity.

I have also decided to create a factory to decouple creation
of the Triangle from the Triangle itself, but a factory method
in the Triangle would have also seem ok to me.


### Layering

* Used hexagonal layering for decouple model from application and UI.

### Testing

* No need to use mocks, everything is sociable unit tested.
* Creation of stubs for the reason of easier test code refactoring.
