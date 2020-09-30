# PHPass Hashing integration for Laravel 8


This is a fork from [phpass-laravel for Larael 5](https://github.com/ksungcaya/phpass-laravel)

I updated it to work with Laravel 8. 


A PHPass Hasher integration to Laravel 8.

This package overrides the default Bycrypt Hasher of Laravel 
and uses the [Phpass](http://openwall.com/phpass/) Library from Openwall for password hashing and checking methods.


## Installation

Install package through Composer.

add reposetory to your composer file 

```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/karamqubsi/phpass-laravel"
        }
    ],

```


```js
"require": {
    "karamqubsi/phpass-laravel": "*"
}
```

Then run composer update
```
$ composer update
```

Update `config/app.php`

Repleace this line : 

```php
Illuminate\Hashing\HashServiceProvider::class
```
with :
```php
    Karamqubsi\Phpass\PhpassHashServiceProvider::class
```

Update `config/hashing.php`

```php
    'driver' => 'phpass',
```


## Usage

Now that PHPass is installed in Laravel, you can now use the normal `Hash` methods.

```php
Hash::make('secret');
Hash::check('secret', $hashedPassword);
```

## That's it!

Please refer to Laravel documentation on [Hashing](https://laravel.com/docs/8.x/hashing) to know more about the Hash methods.
