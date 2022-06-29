<?php

return [
    'role'  => [
        'super_admin'   => env('ROLE_SUPER_ADMIN', 1),
    ],
    'menu'  => [
        'sidebar'       => [
            [
                'title'     => 'Menu',
                'permission'   => 'list dashboard',
            ],
            [
                'link'      => 'dashboard.home',
                'title'     => 'Beranda',
                'icon'      => 'fas fa-tachometer-alt',
                'permission'  => 'list dashboard',
            ],
            [
                'id'        => 'menu-penelitian',
                'link'      => 'penelitian.data-penelitian',
                'title'     => 'Penelitian',
                'icon'      => 'nav-icon fa fa-edit',
                'permission'  => 'list penelitian',
                'submenu'   => [
                    [
                        'id'        => 'data-penelitian',
                        'link'      => 'penelitian.data-penelitian',
                        'title'     => 'Data Penelitian',
                        'icon'      => 'far fa-circle',
                        'permission'  => 'list penelitian',
                    ],
                    [
                        'id'        => 'data-review-penelitian',
                        'link'      => 'penelitian.reviewer',
                        'title'     => 'Data Penelitian',
                        'icon'      => 'far fa-circle',
                        'permission'  => 'list reviewer penelitian',
                    ],
                ]
            ],
            [
                'id'        => 'menu-pengabdian',
                'link'      => 'pengabdian.data-pengabdian',
                'title'     => 'Pengabdian',
                'icon'      => 'nav-icon fa fa-edit',
                'permission'  => 'list pengabdian',
                'submenu'   => [
                    [
                        'id'        => 'data-pengabdian',
                        'link'      => 'pengabdian.data-pengabdian',
                        'title'     => 'Data Pengabdian',
                        'icon'      => 'far fa-circle',
                        'permission'  => 'list pengabdian',
                    ],
                    [
                        'id'        => 'data-review-pengabdian',
                        'link'      => 'pengabdian.reviewer',
                        'title'     => 'Data Pengabdian',
                        'icon'      => 'far fa-circle',
                        'permission'  => 'list reviewer pengabdian',
                    ],
                ]
            ],
            [
                'id'        => 'menu-user',
                'link'      => 'manage-user.list',
                'title'     => 'Manahemen Pengguna',
                'icon'      => 'nav-icon fa fa-users',
                'permission'  => 'list user',
                'submenu'   => [
                    [
                        'id'        => 'data-user',
                        'link'      => 'manage-user.list',
                        'title'     => 'Data Pengguna',
                        'icon'      => 'far fa-circle',
                        'permission'  => 'list user',
                    ],
                ]
            ]
        ],
    ],
];
