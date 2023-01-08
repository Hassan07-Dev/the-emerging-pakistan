<?php

namespace App\HelpersFunction;

class Constants
{
    const GUARD_NAME ='admin';

    /*************** User status ******************/
    const ACTIVE_USER = 0;
    const BLOCKED_USER = 1;

    /*************** User status ******************/
    const STATUS = 1;
    const UNBLOCKED_USER = 0;

    /*************** Categories ******************/
    const categories_list = ["Latest News", "Technology", "Bussiness", "Fashion", "Travel", "Sport", "Digital Marketing"];

    const pages = ['home_page', 'about_page', 'blog_page', 'category_page', 'contact_page', 'profile_page', 'user_blog_page', 'login_page', 'signup_page', 'forget_password_page'];
}
