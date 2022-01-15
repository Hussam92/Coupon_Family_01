<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'team_create',
            ],
            [
                'id'    => 19,
                'title' => 'team_edit',
            ],
            [
                'id'    => 20,
                'title' => 'team_show',
            ],
            [
                'id'    => 21,
                'title' => 'team_delete',
            ],
            [
                'id'    => 22,
                'title' => 'team_access',
            ],
            [
                'id'    => 23,
                'title' => 'team_role_create',
            ],
            [
                'id'    => 24,
                'title' => 'team_role_edit',
            ],
            [
                'id'    => 25,
                'title' => 'team_role_show',
            ],
            [
                'id'    => 26,
                'title' => 'team_role_delete',
            ],
            [
                'id'    => 27,
                'title' => 'team_role_access',
            ],
            [
                'id'    => 28,
                'title' => 'customer_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 30,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 31,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 32,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 33,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 34,
                'title' => 'offer_create',
            ],
            [
                'id'    => 35,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 36,
                'title' => 'offer_show',
            ],
            [
                'id'    => 37,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 38,
                'title' => 'offer_access',
            ],
            [
                'id'    => 39,
                'title' => 'template_create',
            ],
            [
                'id'    => 40,
                'title' => 'template_edit',
            ],
            [
                'id'    => 41,
                'title' => 'template_show',
            ],
            [
                'id'    => 42,
                'title' => 'template_delete',
            ],
            [
                'id'    => 43,
                'title' => 'template_access',
            ],
            [
                'id'    => 44,
                'title' => 'newsletter_create',
            ],
            [
                'id'    => 45,
                'title' => 'newsletter_edit',
            ],
            [
                'id'    => 46,
                'title' => 'newsletter_show',
            ],
            [
                'id'    => 47,
                'title' => 'newsletter_delete',
            ],
            [
                'id'    => 48,
                'title' => 'newsletter_access',
            ],
            [
                'id'    => 49,
                'title' => 'promotion_create',
            ],
            [
                'id'    => 50,
                'title' => 'promotion_edit',
            ],
            [
                'id'    => 51,
                'title' => 'promotion_show',
            ],
            [
                'id'    => 52,
                'title' => 'promotion_delete',
            ],
            [
                'id'    => 53,
                'title' => 'promotion_access',
            ],
            [
                'id'    => 54,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 56,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 57,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 58,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 59,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 60,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 61,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 62,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 63,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 64,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 65,
                'title' => 'product_create',
            ],
            [
                'id'    => 66,
                'title' => 'product_edit',
            ],
            [
                'id'    => 67,
                'title' => 'product_show',
            ],
            [
                'id'    => 68,
                'title' => 'product_delete',
            ],
            [
                'id'    => 69,
                'title' => 'product_access',
            ],
            [
                'id'    => 70,
                'title' => 'purchase_create',
            ],
            [
                'id'    => 71,
                'title' => 'purchase_edit',
            ],
            [
                'id'    => 72,
                'title' => 'purchase_show',
            ],
            [
                'id'    => 73,
                'title' => 'purchase_delete',
            ],
            [
                'id'    => 74,
                'title' => 'purchase_access',
            ],
            [
                'id'    => 75,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 76,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 77,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 78,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 79,
                'title' => 'subscription_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
