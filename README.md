SYMFONY 2.8
==========

A Symfony project Based on 2.8 version with some components that you will require.

As the standard symfony you would have to clone this repository an run 
```
$ composer update
```      
      
## Utilities for PHP Coding

      
####PHP_CodeSniffer Local


   Probably if you have executed composer update you'd have installed [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

   Read doc [Here](./doc/PHP_CodeSniffer.md) (this is the fast way of using PHP CodeSniffer)
   
####Symfony2 PHP CodeSniffer Coding Standard
  
   A coding standard to check against the [Symfony coding standards](http://symfony.com/doc/current/contributing/code/standards.html), originally shamelessly copied from the -disappeared- opensky/Symfony2-coding-standard repository.

   If you already have _phpcs_ globally installed probably you have to use
    
    
    $ sudo phpcs --config-set installed_paths vendor/escapestudios/symfony2-coding-standard
    


##Symfony Bundles

  * [Friend Of Symfony User Bundle](https://symfony.com/doc/master/bundles/FOSUserBundle/index.html)
  * [DoctrineMigrationsBundle](http://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html)
  * [Asssectic](https://symfony.com/doc/current/cookbook/assetic/asset_management.html)
  * [Ddeboer Data Import library and Bundle](https://github.com/ddeboer/data-import)
  * [PHPOffice/PHPExcel](https://github.com/PHPOffice/PHPExcel)
  * [Twig Extensions](http://twig.sensiolabs.org/doc/extensions/index.html)
  * [Doctrine Migrations](http://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html)

>Enjoy coding ;)