<?php

return [
    '/home' => 'site/home',
    '/about' => 'site/about',
    '/login' => 'site/loginform',

    '/usergroup/page{page}' => 'usergroup/show',
    '/usergroup/edit{id}' => 'usergroup/showeditform',
    '/usergroup/add' => 'usergroup/showaddform',
    '/usergroup/delete{id}' => 'usergroup/delete',

    '/feedback/page{page}' => 'feedback/show',
    '/feedback/edit{id}' => 'feedback/showeditform',
    '/feedback/add' => 'feedback/showaddform',
    '/feedback/delete{id}' => 'feedback/delete',

    '/users/page{page}' => 'users/show',
    '/users/edit{id}' => 'users/showeditform',
    '/users/add' => 'users/showaddform',
    '/users/delete{id}' => 'users/delete',

    '/supply/page{page}' => 'supply/show',
    '/supply/edit{id}' => 'supply/showeditform',
    '/supply/add' => 'supply/showaddform',
    '/supply/delete{id}' => 'supply/delete',

    '/work/page{page}' => 'work/show',
    '/work/edit{id}' => 'work/showeditform',
    '/work/add' => 'work/showaddform',
    '/work/delete{id}' => 'work/delete',

    '/goods/page{page}' => 'goods/show',
    '/goods/edit{id}' => 'goods/showeditform',
    '/goods/add' => 'goods/showaddform',
    '/goods/delete{id}' => 'goods/delete',
    // '/goods/delete{id}' => 'goods/delete',


    '/recipt/page{page}' => 'recipt/show',
    '/recipt/edit{id}' => 'recipt/showeditform',
    '/recipt/add' => 'recipt/showaddform',
    '/recipt/delete{id}' => 'recipt/delete',

    '/signup' => 'signup/showform'
];
