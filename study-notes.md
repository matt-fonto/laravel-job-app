## Introduction

Laravel is a popular PHP framework known for its elegant syntax.It also has robust features in a developer friendly environment.It follows.The Model View Controller architectural pattern.Which helps in structuring and organizing your application code.

Here are the core concepts of Laravel.
1. Routing: Laravel provides a powerful.Routing system that allows you to define urls and map them to specific actions in your application.

2. Controllers: They handle the logic behind specific routes or actions. They are responsible for processing the requests interacting with models or services and returning appropriate responses.

3. Models: represent the data structure and interact with the database They encapsulate the business logic related to data manipulation, retrieval and validation.Object relational mapping call it eloquent provides an expressive syntax to work with databases.

4. Views: are responsible for presenting data to the users. They contain HTML markup, combined with embedded PHP code or lattice blade, templating engine.

5. Migrations: system allows you to define and manage databases schema changes using PHP code, migrations help in versioning and simplifying the process of modifying the database structure across different environments.

```bash
# to create a new laravel project
laravel new project-name

# to run the server
php artisan serve 

# make a model 
php artisan make:model ModelName

# make a migration
php artisan make:migration migration_name

# run the migration
php artisan migrate

# run seeders
# seeders: to insert dummy data into the database
php artisan db:seed

# clear the seeders
php artisan migrate:refresh

# create factory
# factory: used to generate dummy data
php artisan make:factory FactoryName
```

## Syntax

-> is used to access the properties and methods of an object. In JS, we use . to access the properties and methods of an object.

```php
$object->property;
$object->method();
```

```js
object.property;
object.method();
```

## Creating an API

In the example below, we are creating an API that returns a list of posts.

```php
Route::get("/posts", function () {
    return response()->json([
        'posts' => [
            [
                'title' => 'Post 1',
            ]
        ]
    ]);
});

```

## Making the code look better

```php
<h1>
    <?php echo $title; ?>
</h1>

<?php foreach ($jobs as $job) : ?>
    <h2>
        <?php echo $job['title']; ?>
    </h2>
    <p>
        <?php echo $job['description']; ?>
    </p>
<?php endforeach; ?>
```
>can be written as

```php
<h1>
    {{ $title }}
</h1>

@foreach ($jobs as $job)
    <h2>
        {{ $job['title'] }}
    </h2>
    <p>
        {{ $job['description'] }}
    </p>
@endforeach
```

## Model methods:
1. all(): returns all the records from the table.
2. find(): returns a single record based on the primary key.
3. where(): returns a collection of records based on the condition.
4. create(): creates a new record in the database.
5. save(): updates an existing record in the database.
6. delete(): deletes a record from the database.

CRUD:
- C -> create()
- R -> all(), find(), where()
- U -> save()
- D -> delete()