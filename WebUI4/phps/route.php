<?php
Router::any("/", "index");
Router::any("help","codinghelp");
//使用以下例子即可实现未登录用户的自动跳转登录
//Router::login("contest", "contest");

//Router::guest("contest", "user/login");
