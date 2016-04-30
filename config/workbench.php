<?php
return [
    'action'=> env(
        'WORKBENCH_ACTION',
        'cre'
    ),
    'type' => env(
        'WORKBENCH_TYPE',
        'laravel'
    ),
    'dir' => env(
        'WORKBENCH_DIR',
        'Y:/public/'
    ),
    'attemps' => env( 'WORKBENCH_ATTEMPS',
        '5'
    ),
    'git' => [
        'hosting' => env('WORKBENCH_GIT_HOSTING', 'github'),
        'action' => env('WORKBENCH_GIT_ACTION', 'pull'),
        'github' => [
            'user' => env('WORKBENCH_GIT_GITHUB_USER', ''),
            'password' => env('WORKBENCH_GIT_GITHUB_PASSWORD', ''),
            'email' => env('WORKBENCH_GIT_GITHUB_EMAIL', ''),
            'organization' => env('WORKBENCH_GIT_GITHUB_ORGANIZATION', 'padosoft'),
        ],
        'bitbucket' => [
            'user' => env('WORKBENCH_GIT_BITBUCKET_USER', ''),
            'password' => env('WORKBENCH_GIT_BITBUCKET_PASSWORD', ''),
            'email' => env('WORKBENCH_GIT_BITBUCKET_EMAIL', ''),
            'organization' => env('WORKBENCH_GIT_BITBUCKET_ORGANIZATION', 'padosoft'),
        ],
    ],
    'ssh' => [
        'server' => env('WORKBENCH_SSH_SERVER', ''),
        'user' => env('WORKBENCH_SSH_USER', ''),
        'password' => env('WORKBENCH_SSH_SERVER', ''),
    ],
 ];
