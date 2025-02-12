<?php

class CKN_Roles
{
    public static function register()
    {
        add_role('cool_kid', 'Cool Kid');
        add_role('cooler_kid', 'Cooler Kid', ['read_others_data' => true]);
        add_role('coolest_kid', 'Coolest Kid', ['read_all_data' => true]);
    }
}
