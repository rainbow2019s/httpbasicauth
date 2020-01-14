## A simple example

```bootstrap/app.php
<?php

  ...
  $app->register(Rainbow2019s\Logger\Providers\LoggerServiceProvider::class);
  ...
```  

```php
<?php

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Rainbow2019s\Logger\Facade\Logger;

class TestController extends Controller
{
    public function test()
    {
        Logger::info('user add',['id'=>1]);
        return 'ok';
    }
}
```