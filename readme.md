# MARS ROVER

# System requirements

* php 7.1 
* composer

# installation 

```
$ composer install 
```

# Commanda of mars rover

* `L` - Turn left
* `R` - Turn right
* `M` - Move
* `H` - Return to base
* `P` - Come to the place of research
* `I` - Start  research the area
* `B` - Turn back

# Tests

```
php vendor/phpunit/phpunit/phpunit --no-configuration Mars\Tests\Controller\ControllerTests tests/Controller/ControllerTests.php --teamcity
```
