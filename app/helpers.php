<?php


if (!function_exists('isAdmin')) 
{
    function isAdmin()
    {
        $user = auth()->user();
        if ($user) {
            if($user->role == 'admin' )
            {
                return $user;
            }
            else {
                return false;
            }
        }
        return false;
    }
}

if (!function_exists('isRegistrar')) 
{
    function isRegistrar()
    {
        $user = auth()->user();
        if ($user) {
            if($user->role == 'court-registrar' )
            {
                return $user;
            }
            else {
                return false;
            }
        }
        return false;
    }
}

if (!function_exists('isJudge')) 
{
    function isJudge()
    {
        $user = auth()->user();
        if ($user) {
            if($user->role == 'court-judge' )
            {
                return $user;
            }
            else {
                return false;
            }
        }
        return false;
    }
} 


if (!function_exists('isUser')) 
{
    function isUser()
    {
        $user = auth()->user();
        if ($user) {
            return $user;
        }
        return false;
    }
} 

