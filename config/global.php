<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/10/27
 * Time: 下午7:09
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Common Info
    |--------------------------------------------------------------------------
    |
    |
    */
    'keywords' => env('KEYWORDS', '慕宠网, 宠物商城, 宠物资讯, 宠物社区, 宠物百科, 宠物医疗'),
    'description' => env('DESC', '慕宠网是集宠物商城、资讯、社区、百科、医疗为一体的平台，宠物爱好者可在平台购物，了解新闻，交流讨论，致力于为广大宠物爱好者打造宠物梦工厂平台。'),
    'author' => env('AUTHOR', 'Serenity_Tang'),
    'title' => env('TITLE', '慕宠网 - 宠物爱好者的梦工厂'),

    /*
    |--------------------------------------------------------------------------
    | Mall Info
    |--------------------------------------------------------------------------
    |
    |
    */
    'mall_keywords' => env('KEYWORDS', '慕宠商城,慕宠网上商城,宠物,狗,猫,水族,imoop.com'),
    'mall_description' => env('DESC', '慕宠商城-专业的宠物网上购物商城，提供狗狗/犬、猫猫、水族等丰富种类的宠物，满足宠物爱好者的需求。'),
    'mall_title' => env('TITLE', '慕宠商城(imoop.com) - '),
    'mall_address' => env('Address', 6),

    /*
    |--------------------------------------------------------------------------
    | Upload folder
    |--------------------------------------------------------------------------
    |
    | This defines the site author.
    |
    | Default to 'uploads'.
    |
    */
        'upload_folder' => env('UPLOAD_FOLDER', 'uploads'),

    /*
    |--------------------------------------------------------------------------
    | Upload Max Size
    |--------------------------------------------------------------------------
    |
    | This max size of the upload file.
    |
    | Default to '2000000'.
    |
    */
    'upload' => [
    'image' => [
        'max_size' => env('MAX_SIZE', '2048'), //图片上传大小 单位是kb
    ]
],

    /*
    |--------------------------------------------------------------------------
    | Qiniu Kodo 设置
    |--------------------------------------------------------------------------
    |
    | This max size of the upload file.
    |
    | Default to '2000000'.
    |
    */
    'qiniu_kodo' => env('QINIU_KODO', true), //是否开启上传到oss
    'qiniu_url' => 'http://photo.laraveler.net/',
    //'qiniu_kodo_bucket' => env('QINIU_KODO_BUCKET', 'laraveler'),

    'email' => [
    'register_subject' => '慕宠网-新注册账号激活',
    'register_remarks' => '注册——激活个人账户',
    'expiration' => [
        'time' => 1
    ],
],
];