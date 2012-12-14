Wave Scaffolding App
===============

An example application to get started with the Wave framework.

## To get started first install [Composer](http://getcomposer.org)

    $ curl -s http://getcomposer.org/installer | php

## Then create a new `wave-framework/scaffolding-app` project

The simplest thing to do is just clone the master branch, (`dev-master`), e.g.

    $ composer.phar create-project wave-framework/scaffolding-app ./test dev-master

Then you can run a few of the setup scripts, but at the very minimum you need to generate the routes cache

    $ cd test
    $ ./vendor/bin/wave generate/routes
    Regenerating Routes...  done
    $

You can also have a script populate the default database configuration by running

    $ ./vendor/bin/wave install

Manually regenerating views can be done with 

    $ ./vendor/bin/wave generate/views

In development mode views are automatically regenerated when they change.


## Apache configuration

Wave requires Apache `mod_rewrite` (or an equivilent that can transform each request into `public/index.php`). 

A typical `VirtualHost` configuration might look something like this:

```apacheconf
<VirtualHost *:80>
  ServerName wave-app.localhost

  DocumentRoot /var/www/wave-app/public
  <Directory /var/www/wave-app/public>
     # Rewrite directives are set in public/.htaccess. Move
     # them here if you prefer to leave AllowOverride None
     AllowOverride all
  </Directory>
  # Consolidate log files into the same directory the app logs
  # go into.
  ErrorLog /var/www/wave-app/logs/web_error.log
  CustomLog /var/www/wave-app/logs/web_access.log common
</VirtualHost>
```

Once you have configured your Apache environment you should be able to browse to the application in your browser
and be met with a welcome page (and an obligatory gold star).
