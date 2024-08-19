<?php

use Aaran\Aadmin\Src\Customise;

return [

    'customise' => [
        Customise::common(),
        Customise::master(),
        Customise::entries(),
        Customise::core(),
        Customise::blog(),
    ],
];
