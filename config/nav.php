<?php

return [
    'admin' => [
        'top' =>
        [
            [
                'name' => 'Từ khóa',
                'route' => 'get_backend.keyword.index'
            ],
            [
                'name' => 'Danh mục',
                'route' => 'get_backend.category.index'
            ],
            [
                'name' => 'Sản phẩm',
                'route' => 'get_backend.product.index'
            ],
            [
                'name' => 'Tag',
                'route' => 'get_backend.tag.index'
            ],
            [
                'name' => 'Menu',
                'route' => 'get_backend.menu.index'
            ],
            [
                'name' => 'Bài viết',
                'route' => 'get_backend.article.index'
            ],
            [
                'name' => 'Thành viên',
                'route' => 'get_backend.user.index'
            ],
            [
                'name' => 'Đơn hàng',
                'route'=>'get_backend.order.index'
            ],
        ]
    ]
];
