<?php

return array(
    '' => 'Homepage@index',
    'news' => 'News@index',
    'login' => 'Authorization@login',
    'logout' => 'Authorization@logout',
    'registration' => 'Authorization@registration',
    'news/p_[0-9]{1,3}' => 'News@pager',
    'install' => 'Installation@index',

    // Testing purposes
    'test' => 'Test@index',
    'test/add' => 'Test@add',
    'test/edit/[0-9]{1,10}' => 'Test@edit',
    'test/delete' => 'Test@delete',
    'test/[0-9]{1,10}' => 'Test@get',

    // Administration routes
    'admin' => 'Administration@index',
    'admin/users' => 'Administration@users',
    'admin/pages' => 'Administration@pages',
    'admin/settings' => 'Administration@settings',
    'admin/query' => 'Administration@query',

    // This entry should be the last in the array
    '[a-z0-9_-]{1,100}(/[a-z0-9_-]{1,100})*' => 'CustomPage@index',
    // And this should be the very last entry
    '.*' => 'Error@notFound',
);