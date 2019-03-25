Floating Messages jQuery Plugin
===============================

Version 1.0.1

Copyright 2016, Daniel David Duarte <danieldd.ar@gmail.com>

[Github](https://github.com/daniel-duarte/jquery.floating-messages)

Icons by [Mark James](http://www.famfamfam.com/lab/icons/silk/), Silk icons version 1.3.

Usage
-----

- Include jQuery

    ```html
    <script src="//code.jquery.com/jquery-3.1.0.js"></script>
    ```

- Include Floating Messages jQuery Plugin (CSS and JS)

    ```html
    <link href="jquery.floating-messages.min.css" rel="stylesheet" type="text/css"/>
    <script src="jquery.floating-messages.min.js"></script>
    ```

- Call the plugin methods (available after document is loaded)
    ```js
    $.showInfo('This is information.');
    $.showWarning('This is a warning.');
    $.showError('This is an error!');
    ```

Composer
--------

If you prefer, you can get the plugin using composer.

Just add the repository to your composer.json:

```json
"repositories": [
   {
        "type": "vcs",
        "url": "https://github.com/daniel-duarte/jquery.floating-messages"
    }
]
```

And require the package:

```bash
composer require daniel-duarte/js-floating-messages:dev-master
```
