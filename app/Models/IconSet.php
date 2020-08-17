<?php

namespace App\Models;

use Sushi\Sushi;

class IconSet extends BaseModel
{
    use Sushi;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'heroicons',
            'composer' => 'blade-ui-kit/blade-heroicons',
            'ignore_rule' => '/^(?:o|s)-/',
            'outline_rule' => '/^o-/',
        ],
        [
            'id' => 2,
            'name' => 'zondicons',
            'composer' => 'blade-ui-kit/blade-zondicons',
            'ignore_rule' => null,
            'outline_rule' => null,
        ],
        [
            'id' => 3,
            'name' => 'bootstrap-icons',
            'composer' => 'davidhsianturi/blade-bootstrap-icons',
            'ignore_rule' => '/-fill$/',
            'outline_rule' => '/.*(?<!-fill)$/',
        ],
        [
            'id' => 4,
            'name' => 'css-icons',
            'composer' => 'khatabwedaa/blade-css-icons',
            'ignore_rule' => null,
            'outline_rule' => null,
        ],
        [
            'id' => 5,
            'name' => 'evaicons',
            'composer' => 'hasnayeen/blade-eva-icons',
            'ignore_rule' => '/-outline$/',
            'outline_rule' => '/-outline$/',
        ],
        [
            'id' => 6,
            'name' => 'feather-icons',
            'composer' => 'brunocfalcao/blade-feather-icons',
            'ignore_rule' => null,
            'outline_rule' => null,
        ],
        [
            'id' => 7,
            'name' => 'fontawesome-brands',
            'composer' => 'owenvoke/blade-fontawesome',
            'ignore_rule' => null, //fab
            'outline_rule' => null,
        ],
        [
            'id' => 8,
            'name' => 'fontawesome-regular',
            'composer' => 'owenvoke/blade-fontawesome',
            'ignore_rule' => null, //far
            'outline_rule' => null,
        ],
        [
            'id' => 9,
            'name' => 'fontawesome-solid',
            'composer' => 'owenvoke/blade-fontawesome',
            'ignore_rule' => null, //fas
            'outline_rule' => null,
        ],
        [
            'id' => 10,
            'name' => 'github-octicons',
            'composer' => 'actb/blade-github-octicons',
            'ignore_rule' => '/-\d{2}$/', // 16|24
            'outline_rule' => null,
        ],
        [
            'id' => 11,
            'name' => 'ionicons',
            'composer' => 'faisal50x/blade-ionicons',
            'ignore_rule' => '/-(?:outline|sharp)$/',
            'outline_rule' => '/-outline$/',
        ],
        [
            'id' => 12,
            'name' => 'blade-mdi',
            'composer' => 'renoki-co/blade-mdi',
            'ignore_rule' => '/-outline$/',
            'outline_rule' => '/-outline$/',
        ],
        [
            'id' => 13,
            'name' => 'remix',
            'composer' => 'skydiver/blade-icons-remix',
            'ignore_rule' => '/-(?:line|fill)$/',
            'outline_rule' => '/-line$/',
        ],
        [
            'id' => 14,
            'name' => 'tabler',
            'composer' => 'ryangjchandler/blade-tabler-icons',
            'ignore_rule' => null,
            'outline_rule' => null,
        ],
        [
            'id' => 15,
            'name' => 'entypo',
            'composer' => 'owenvoke/blade-entypo',
            'ignore_rule' => null,
            'outline_rule' => null,
        ],
    ];
}
