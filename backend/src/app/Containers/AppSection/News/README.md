### Apiato News Container

####Container includes codes to use multiple news and article provider.
####This Container is depended on jcobhams/newsapi which is located on package directory of the root directory.
Add the following code to the root composer

```
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/",
            "jcobhams\\NewsApi\\": "packages/jcobhams/newsapi/src"
            ...
        }
    },
```
Add the following envirement variables to the root .env

```
NEWSAPI_API_KEY=
THEGUARDIAN_API_KEY=
NYTIMES_API_KEY=
```
