## A simple example

```bootstrap/app.php
<?php

  ...
  $app->register(Rainbow2019s\Logger\Providers\LoggerServiceProvider::class);
  ...
```  

```bootstrap/app.php

$app->routeMiddleware([
    'HttpBasicAuth'=>Rainbow2019s\HttpBasicAuth\middleware\HttpBasicAuth:class
]);

#.env
HTTP_BASIC_AUTH=paas:U9ihgZO8

#routes/web.php
$router->group(['prefix' => 'v1'], function () use ($router) {
     $router->get('test', ['middleware'=>'HttpBasicAuth','uses'=>'ExampleController@test']);
});

```