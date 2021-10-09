<?php

return [
    'admin' => [
        'top' =>
        [
            [
                'name' => 'Danh mục sản phẩm',
                'route' => 'get_backend.category.index',
                'icons' => 'category',
            ],
            [
                'name' => 'Sản phẩm',
                'route' => 'get_backend.product.index',
                'icons'=>'liquor',
            ],

            [
                'name' => 'Danh mục bài viết',
                'route' => 'get_backend.menu.index',
                'icons'=>'feed',
            ],
            [
                'name' => 'Bài viết',
                'route' => 'get_backend.article.index',
                'icons'=>'article',
            ],
            [
                'name' => 'Khách hàng',
                'route' => 'get_backend.user.index',
                'icons'=>'people',
            ],
            [
                'name' => 'Bình luận',
                'route' => 'get_backend.comment.index',
                'icons'=>'chat',
            ],
            [
                'name' => 'Giảm giá',
                'route' => 'get_backend.coupon.index',
                'icons'=>'south',
            ],
            [
                'name' => 'Nhân viên',
                'route' => 'get_backend.staff.index',
                'icons'=>'manage_accounts'
            ],
            [
                'name' => 'Quản lý nhập hàng',
                'route' => 'get_backend.import.index',
                'icons'=>'add_circle'
            ],
        ]
    ]
];
