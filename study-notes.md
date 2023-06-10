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

# create controller
php artisan make:controller ControllerName
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

> can be written as

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

-   C -> create()
-   R -> all(), find(), where()
-   U -> save()
-   D -> delete()

## Shortcuts

CTRL + K + CTRL + L => fold the code
CTRL + K + CTRL + J => unfold the code

## PHP vs. Node

-   Both are server-side technologies used for web development

### Architecture

> PHP

-   Server-side scripting language designed for web development
-   Follows a request-response model, where each HTTP request creates a new PHP process

> Node.js

-   Run time environment built on the V8 JavaScript engine, which is used to execute JavaScript code outside of a browser
-   Uses an event-driven, non-blocking I/O model that makes it lightweight and efficient

Event-driven Node.js architecture: Node.js runs on a single thread, using non-blocking I/O calls, allowing it to support tens of thousands of concurrent connections without incurring the cost of thread context switching.

### Language and Ecosystem

> PHP

-   Mature and widely adopted language for web development
-   Generates dynamic HTML content on the server side, while React generates dynamic HTML content on the client side. Next.js is the combination of both, in a sense. Because it allows us to generate dynamic HTML content on the server side and on the client side.

> Node.js

-   JavaScript is the most popular programming language in the world

### Performance

> PHP

-   Performs well in synchronous tasks and is well-suited for generating dynamic HTML content on the server side. It may face performance issues when handling concurrent requests.

> Node.js

-   Performs well in asynchronous tasks and is well-suited for handling concurrent requests. It allows a large amount of connections with relatively loew resource usage

## Blade

-   Similar to React, Blade provides us a way to generate dynamic HTML content
-   Blade operates on the server-side and it's tightly integrated with Laravel
-   Allows us to write HTML code in a more elegant way
-   it uses `{{ }}` to output data instead of `<?php echo ?>`
-   it uses `@` to write control structures instead of `<?php ?>`

## XML

-   XML stands for eXtensible Markup Language, marks or tags <> are used to define elements
-   Extensible means that we can define our own tags
-   XML doesn't have predefined tags, we can define our own tags
-   HTML stands for HyperText Markup Language

```xml
<book>
    <title>Harry Potter</title>
    <author>J.K. Rowling</author>
</book>
```

-   XML is used to store and transport data, independent of software and hardware, while HTML is used to display data, and it's limited to web browsers
-   XML is a markup language, while HTML is a presentation language
-   XML is used to allow different applications to share data

```xml
<friendsList>
    <friend>
        <name>John</name>
        <age>20</age>
        <profession>Engineer</profession>
    </friend>
    <friend>
        <name>Bob</name>
        <age>25</age>
        <profession>Doctor</profession>
    </friend>
</friendsList>

<nature>
    <animals>
        <reptiles>
            <snake>
                <name>Python</name>
            </snake>
        </reptiles>
        <mammals>// Find one job
Route::get("jobs/{id}", [JobController::class, 'show']);
            <lion>
                <name>African Lion</name>
            </lion>
        </mammals>
    </animals>
</nature>
```

## A workflow

-   Create a new route
-   Then, a new controller
-   Then, a new view

## Drupal

-   Drupal is a free and open-source content management framework written in PHP and distributed under the GNU General Public License. Drupal provides a back-end framework for at least 2.3% of all websites worldwide – ranging from personal blogs to corporate, political, and government sites. Systems also use Drupal for knowledge management and for business collaboration.

-   Drupal is an alternative to WordPress, which is the most popular content management system in the world. Drupal is more flexible than WordPress, but it's more difficult to learn and use.

## Tech Stack

> LAMP: Linux, Apache, MySql, Php

-   Linux: operating system
-   Apache: web server
-   MySql: database
-   Php: programming language

This led to wordPress, which is written in Php.

> Tech Steck Definition

-   Front-end: the part of the application that the user interacts with
    Ex: Web: javascript, html, css
    Ex: Mobile: IOS, Android
-   Back-end: the part of the application that the user doesn't interact with directly, it's responsible for storing and retrieving data
    Ex: Node.js, Python,
-   API: Connect the frton-end and the back-end

> MEAN: Mongo, Express, Angular, Node
> MERN: Mongo, Express, React, Node
> MEVN: Mongo, Express, Vue, Node

## Crud Methods

1. Create/Post = Store
   Route::post('/resource', [ResourceController::class, 'store'])->name('resource.store');

2. Read/Show = Get
   Route::get('/resource/{id}', [ResourceController::class, 'show'])->name('resource.show');

3. Update/Put = Update
   Route::put('/resource/{id}', [ResourceController::class, 'update'])->name('resource.update');

4. Delete = Destroy
   Route::delete('/resource/{id}', [ResourceController::class, 'destroy'])->name('resource.destroy');

In addition to these, Laravel provides resourceful routing conventions, which allow you to define routes for all the CRUD operations using a single line of code. This can be done using the Route::resource method. For example:

Route::resource('resource', ResourceController::class);

## Tinker

-   Tinker is a REPL (Read-Eval-Print-Loop) environment for PHP, similar to Node.js REPL
-   REPL is a simple interactive computer programming environment that takes single user inputs, executes them, and returns the result to the user
