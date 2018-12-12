


#Initial scripts for running

```
composer install
npm install
npm run watch
php artisan serve
```


Access `http://localhost:8000`


# Tests


## Unit Test


### Running Test

```
vendor/bin/phpunit
```

### Example
Input: `The softbottomcat is jumping over a memecat and fell down on top of catnips`

Output:
```json
[
	"softbottomcat",
	"memecat"
]
```

Input: `Electrocatosis is a process where a oxycat is transmuted-cat into hydrogen cat`

Output:
```json
[
	"oxycat",
	"transmuted-cat"
]
```

Input: `When cat hits the fan, the cat and the fan shall become one catfan`

Output:
```json
[]
```

## Browser Test


### Installation

```
composer require --dev laravel/dusk
```

### Running test

```
php artisan dusk
```


### Details


1. Test fill input box
2. Test clear input box using cancel button
3. Test submit button using a success input
4. Test submit button using a false input

