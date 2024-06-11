<?php

return [
    'extensions_path' => config('app.env') == 'production' ? env('NATIVEPHP_USER_HOME_PATH').'/.prompt/extensions' : base_path('extensions'),
];
