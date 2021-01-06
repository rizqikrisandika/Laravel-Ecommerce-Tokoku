<?php

function set_active($route)
{
    if(Route::is($route)){
        return 'active';
    }
}
