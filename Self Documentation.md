
# Juice Bar E-commerce Web Application

## Folder/file Structure

MVC architecture
- Model = Data
- View = What is displayed to user
- Controller = Intermediary between the model and the view

bootstrap folder is needed to initiate the project.

public contatins the css and the js.

resources contains the ``views``

routes contain the **links** that let the user to go specifi pages.
Web ``php`` file is used to manage the routes of the application.

Storage folder is for anything we want to upload.

Test folder for running unit tests.

composer.json contains the version of the packages use in this project.

.env contains all the enviornment variables.
Application name, database configuration are in ``.env`` file.

---

## Running the Project

To Run this project type the following command in the terminal.

```
php artisan serve
```

---
### Adding and Setting views for the Project

Add the view to the ``resources/views`` directory with the extension ``.blade.php``

Then add that ``view``'s name without the extention to the ``web.php`` in the routes directory.

---
## Creating the Page Strucure of the Web Application


Page Strucure is divided into 3 sections. We create a folder called ``layout`` for this. 

- Header (will be same for all pages)
- Content
- Footer (will be same for all pages)

First create the ``heder.blade.php`` and ``footer.blade.php``.

Create the main page. (main.blade.php)

Import the heder and footer to the ``main.blade.php`` . To achieve this use the following line.

```
@include('layouts.header')
```

@include('name of the file'). It is inside the layouts folder. 

In between the header and the footer we can inject the content using following line.

```
@yield('content')
```

@yield('name of the thing we want to inject')


### Injecting contents to the 'content' defined as @yield('content')

In the ``index.blade.php`` we add the following line.

```
@extends('layouts.main')
```

(We are extending the main.blade.php file because we want to use it. And then we are )

To inject the content to the 'content' defined as @yield('content')

```
@section('content')

<h1>Html codes we want to inject</h1>

@endsection
```

Change the route of '/' to view 'index' instead of view 'welcome'