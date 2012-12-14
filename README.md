Wave Scaffolding App
===============

An example application to get started with the Wave framework.

## To get started first install [Composer](http://getcomposer.org)

    $ curl -s http://getcomposer.org/installer | php

## Then create a new `wave-framework/scaffolding-app` project

The simplest thing to do is just clone the master branch, (`dev-master`), e.g.

    $ composer.phar create-project wave-framework/scaffolding-app test dev-master

Then you can run a few of the setup scripts, but at the very minimum you need to generate the routes cache

    $ cd test
    $ ./vendor/bin/wave generate/routes
    Regenerating Routes...  done
    $

From there you should be able to navigate to the document root in your browser and you should see a welcome page.
