<?php

class CKN_Registration
{

    public static function init()
    {
        add_shortcode('ckn_signup', [self::class, 'signup_form']);
        add_action('template_redirect', [self::class, 'handle_signup']);
    }

    public static function signup_form()
    {
        ob_start();
?>
        <form method="post">
            <input type="email" name="ckn_email" required>
            <button type="submit">Confirm</button>
        </form>

<?php
        return ob_get_clean();
    }

    public static function handle_signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ckn_email'])) {
            $email = sanitize_email($_POST['ckn_email']);
            if (!email_exists($email)) {
                // Generate Username
                $username = explode('@', $email)[0];
                $password = 'ckn_default_password';

                // Create User
                $user_id = wp_create_user($username, $password, $email);

                // Generate Fake Identity
                $response = wp_remote_get('https://randomuser.me/api/');
                if (!is_wp_error($response)) {
                    $data = json_decode($response['body'], true);
                    $name = $data['results'][0]['name'];
                    $location = $data['results'][0]['location'];

                    update_user_meta($user_id, 'first_name', $name['first']);
                    update_user_meta($user_id, 'last_name', $name['last']);
                    update_user_meta($user_id, 'country', $location['country']);
                }

                // Set default role
                $user = new WP_User($user_id);
                $user->set_role('cool_kid');

                // Auto Login
                wp_signon([
                    'user_login' => $username,
                    'user_password' => $password
                ]);
                wp_redirect(home_url('/dashboard'));
                exit;
            }
        }
    }
}
