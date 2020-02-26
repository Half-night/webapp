<?php

return array(
    '' => 'Homepage@index',
    'news' => 'News@index',
    'login' => 'Authorization@login',
    'logout' => 'Authorization@logout',
    'news/p_[0-9]{1,3}' => 'News@pager',
    'install' => 'Installation@index',

    // Administration routes
    'admin' => 'Administration@index',

    // This entry should be the last in the array
    '[a-z0-9_-]{1,100}(/[a-z0-9_-]{1,100})*' => 'CustomPage@index',
    // And this should be the very last entry
    '.*' => 'Error@notFound',
);