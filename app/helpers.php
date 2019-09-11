<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 2019/8/15
 * Time: 14:26
 */

function route_class(){
    return str_replace('.','-',Route::currentRouteName(0));
}

function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}