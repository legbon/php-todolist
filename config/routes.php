<?php
return [
    'default' => '/tasks/list',
    'errors' => '/error/:code',
    'routes' => [
        '/tasks(/:action(/:id))' => [
            'controller' => '\BadTodoSample\Controller\Todos',
            'action' => 'list',
        ],
        '/:controller(/:action)' => [
            'controller' => '\BadTodoSample\Controller\:controller',
            'action' => 'index',
        ]
    ]
];
