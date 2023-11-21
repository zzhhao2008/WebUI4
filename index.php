<?php
include "./phps/lib/main.php";
Router::loadRouteMap();
$mypower=0;
include includePage(Router::GetScriptPath(Router::getUri(),$mypower));