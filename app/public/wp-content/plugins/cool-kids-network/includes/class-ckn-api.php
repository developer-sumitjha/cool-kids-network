<?php

class CKN_API
{
    public static function init()
    {
        add_action('rest_api_init', [self::class, 'register_routes']);
    }

    public static function register_routes()
    {
        register_rest_route('ckn/v1', '/update-role', [
            'methods' => 'POST',
            'callback' => [self::class, 'handle_role_update'],
            'permission_callback' => [self::class, 'check_api_key']
        ]);
    }

    public static function check_api_key($request)
    {
        $api_key = $request->get_header('X-API-Key');
        return $api_key === get_option('ckn_api_key', 'SECRET_KEY');
    }



    public static function handle_role_update($request)
    {
        $params = $request->get_params();
        $user = null;

        if (!empty($params['email'])) {
            $user = get_user_by('email', $params['email']);
        } elseif (!empty($params['first_name']) && !empty($params['last_name'])) {
            $users = get_users([
                'meta_query' => [
                    ['key' => 'first_name', 'value' => $params['first_name']],
                    ['key' => 'last_name', 'value' => $params['last_name']]
                ]
            ]);
            if (count($users) === 1) $user = $users[0];
        }

        if (!$user || !in_array($params['role'], ['cool_kid', 'cooler_kid', 'coolest_kid'])) {
            return new WP_Error('invalid_request', 'Invalid parameters');
        }

        $user->set_role($params['role']);
        return ['success' => true];


        // return $params;
        // return $user;
    }
}
