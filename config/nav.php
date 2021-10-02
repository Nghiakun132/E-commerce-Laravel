<?php

return [
    'admin' => [
        'top' =>
        [
            [
                'name' => 'Danh mục sản phẩm',
                'route' => 'get_backend.category.index'
            ],
            [
                'name' => 'Sản phẩm',
                'route' => 'get_backend.product.index'
            ],

            [
                'name' => 'Danh mục bài viết',
                'route' => 'get_backend.menu.index'
            ],
            [
                'name' => 'Bài viết',
                'route' => 'get_backend.article.index'
            ],
            [
                'name' => 'Khách hàng',
                'route' => 'get_backend.user.index'
            ],
            [
                'name' => 'Bình luận',
                'route' => 'get_backend.comment.index'
            ],
            [
                'name' => 'Giảm giá',
                'route' => 'get_backend.coupon.index'
            ],
            [
                'name' => 'Nhân viên',
                'route' => 'get_backend.staff.index'
            ],
            [
                'name' => 'Quản lý nhập hàng',
                'route' => 'get_backend.import.index'
            ],
        ]
    ]
];
