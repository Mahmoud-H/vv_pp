<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission'     => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'المعرف',
            'id_helper'         => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'created_at'        => 'أنشئت في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'أدوار',
        'title_singular' => 'دور',
        'fields'         => [
            'id'                 => 'المعرف',
            'id_helper'          => ' ',
            'title'              => 'العنوان',
            'title_helper'       => ' ',
            'permissions'        => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at'         => 'أنشئت في',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم الحذف في',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'المعرف',
            'id_helper'                => ' ',
            'name'                     => 'الاسم',
            'name_helper'              => ' ',
            'email'                    => 'الايميل',
            'email_helper'             => ' ',
            'email_verified_at'        => 'التحقق من الايميل',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الأدوار',
            'roles_helper'             => ' ',
            'remember_token'           => 'تذكر الرمز',
            'remember_token_helper'    => ' ',
            'created_at'               => 'أنشئت في',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تم التحديث في',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تم الحذف في',
            'deleted_at_helper'        => ' ',
            'team'                     => 'الفريق',
            'team_helper'              => ' ',
        ],
    ],
    'main'           => [
      //  'title'          => 'Main',
        'title'          => 'الرئيسية',
        'title_singular' => 'الرئيسية',
    ],
    'setting'        => [
       // 'title'          => 'Settings',
        'title'          => 'الإعدادات',
        'title_singular' => 'الإعدادات',
    ],
    'governorate'    => [
        //'title'          => 'Governorates',
        'title'          => 'المحافظات',
        'title_singular' => 'المحافظة',
        'fields'         => [
            'id'                      => 'المعرف',
            'id_helper'               => ' ',
            'governorate_name'        => 'اسم المحافظة',
            'governorate_name_helper' => ' ',
            'created_at'              => 'أنشئت في',
            'created_at_helper'       => ' ',
            'updated_at'              => 'تم التحديث في',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'تم الحذف في',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'departement'    => [
       // 'title'          => 'Departements',
        'title'          => 'الأقسام',
        'title_singular' => 'القسم',
        'fields'         => [
            'id'                => 'المعرف',
            'id_helper'         => ' ',
            'dept_name'         => 'اسم القسم',
            'dept_name_helper'  => ' ',
            'is_active'         => 'نشط',
            'is_active_helper'  => ' ',
            'created_at'        => 'أنشئت في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'visitor'        => [
        //'title'          => 'Visitors',
        'title'          => 'الزائرين',
        'title_singular' => 'الزائر',
        'fields'         => [
            'id'                    => 'المعرف',
            'id_helper'             => ' ',
            'visitor_id_num'        => 'رقم الهوية',
            'visitor_id_num_helper' => ' ',
            'visitor_name'          => 'اسم الزائر',
            'visitor_name_helper'   => ' ',
            'mobile_num'            => 'رقم الهاتف المحمول',
            'mobile_num_helper'     => ' ',
            'dept'                  => 'مكان الزيارة',
            'dept_helper'           => ' ',
            'in_date_time'          => 'تاريخ ووقت الدخول',
            'in_date_time_helper'   => ' ',
            'deposit'               => 'الوديعة',
            'deposit_helper'        => ' ',
            'notes'                 => 'ملاحظات',
            'notes_helper'          => ' ',
            'created_at'            => 'أنشئت في',
            'created_at_helper'     => ' ',
            'updated_at'            => 'تم التحديث في',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'تم الحذف في',
            'deleted_at_helper'     => ' ',
            'governorate'           => 'المحافظة',
            'governorate_helper'    => ' ',
            'out_date_time'         => 'تاريخ ووقت الخروج',
            'out_date_time_helper'  => ' ',
            'team'                  => 'الفريق',
            'team_helper'           => ' ',
             'deposit'               => 'الوديعة',
            'deposit_helper'        => ' ',
             'office'                => 'المكتب',
            'office_helper'         => ' ',
            'acreated_by'           => 'انشأ من قبل',
            'acreated_by_helper'    => ' ',
            'deposit_taken'         => 'تم أخذ الايداع',
            'deposit_taken_helper'  => ' ',
             'deposit_type'          => 'نوع الإيداع',
            'deposit_type_helper'   => ' ',

        ],
    ],
    'team'           => [
       // 'title'          => 'Teams',
        'title'          => 'الفريق',
        'title_singular' => 'الفريق',
        'fields'         => [
       'id'                => 'المعرف',
            'id_helper'         => ' ',
            'created_at'        => 'أنشئت في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'owner'             => 'المالك',
            'owner_helper'      => ' ',
            'offices'           => 'المكاتب',
            'offices_helper'    => ' ',
        ],
    ],
       'depositType'    => [
        'title'          => 'نوع الإيداع',
        'title_singular' => 'نوع الإيداع',
        'fields'         => [
            'id'                       => 'المعرف',
            'id_helper'                => ' ',
            'deposit_type_desc'        => 'وصف نوع الإيداع',
            'deposit_type_desc_helper' => ' ',
            'created_at'               => 'أنشئت في',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تم التحديث في',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تم الحذف في',
            'deleted_at_helper'        => ' ',
        ],
    ],
       'office'         => [
        'title'          => 'مكاتب',
        'title_singular' => 'مكتب',
        'fields'         => [
            'id'                 => 'المعرف',
            'id_helper'          => ' ',
            'office_name'        => 'اسم المكتب',
            'office_name_helper' => ' ',
            'created_at'         => 'أنشئت في',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم الحذف في',
            'deleted_at_helper'  => ' ',
        ],
    ],
    
];
