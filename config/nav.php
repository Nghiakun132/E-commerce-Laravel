<?php

return [
    'admin' => [
        'top' =>
        [
            [
                'name' => 'Danh mục sản phẩm',
                'route' => 'get_backend.category.index',
                'icons' => '<i class="fas fa-bars"></i>',
            ],
            [
                'name' => 'Sản phẩm',
                'route' => 'get_backend.product.index',
                'icons'=>'<i class="fab fa-product-hunt"></i>',
            ],

            [
                'name' => 'Danh mục bài viết',
                'route' => 'get_backend.menu.index',
                'icons'=>'<i class="fas fa-bars"></i>',
            ],
            [
                'name' => 'Bài viết',
                'route' => 'get_backend.article.index',
                'icons'=>'<i class="fas fa-newspaper"></i>',
            ],
            [
                'name' => 'Khách hàng',
                'route' => 'get_backend.user.index',
                'icons'=>'<i class="fas fa-users"></i>',
            ],
            [
                'name' => 'Bình luận',
                'route' => 'get_backend.comment.index',
                'icons'=>'<i class="fas fa-comments"></i>',
            ],
            [
                'name' => 'Giảm giá',
                'route' => 'get_backend.coupon.index',
                'icons'=>'<i class="fas fa-arrow-alt-circle-down"></i>',
            ],
            [
                'name' => 'Nhân viên',
                'route' => 'get_backend.staff.index',
                'icons'=>'<i class="fas fa-user-circle"></i>'
            ],
            [
                'name' => 'Quản lý nhập hàng',
                'route' => 'get_backend.import.index',
                'icons'=>'<i class="fas fa-plus-square"></i>'
            ],
            [
                'name' => 'Quản lý đơn hàng',
                'route' => 'get_backend.order.index',
                'icons'=>'<i class="fab fa-jedi-order"></i>'
            ],
        ]
    ]
];
