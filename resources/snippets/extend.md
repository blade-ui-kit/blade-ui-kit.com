```php
<?php

namespace App\View\Components;

class Mapbox extends \BladeUI\Maps\Mapbox
{
    public function options(): array
    {
        return array_merge([
            'zoom' => 3,
            'center' => [13.4105300, 52.5243700],
        ], parent::options());
    }
}
```
