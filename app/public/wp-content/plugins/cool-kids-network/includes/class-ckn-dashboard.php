<?php

class CKN_Dashboard
{
    public static function init()
    {
        add_shortcode('ckn_dashboard', [self::class, 'dashboard_content']);
        add_shortcode('ckn_user_list', [self::class, 'user_list']);
    }

    public static function dashboard_content()
    {
        if (!is_user_logged_in()) return 'Please Login';

        $user = wp_get_current_user();
        ob_start();
?>
        <h2>Your Character</h2>
        <p>Name: <?php echo $user->first_name . ' ' . $user->last_name; ?></p>
        <p>Country: <?php echo get_user_meta($user->ID, 'country', true); ?></p>
        <p>Email: <?php echo $user->user_email; ?></p>
        <p>Role: <?php echo ucfirst(str_replace('_', ' ', $user->roles[0])); ?></p>

        <?php echo do_shortcode('[ckn_user_list]'); ?>

<?php
        return ob_get_clean();
    }

    public static function user_list()
    {

        if (current_user_can('read_others_data') || current_user_can('read_all_data')) {

            $users = get_users([
                'exclude' => get_users([
                    'role' => 'administrator',
                    'fields' => 'ID'
                ])
            ]);
            ob_start();
            echo '<div class="user-list-cont">';
            echo '<h2>Other Users</h2>';
            echo '<div class="user-list">';
            foreach ($users as $user) {
                echo '<div class="user-card">';
                echo '<h3>' .  $user->first_name . ' ' . $user->last_name . '</h3>';
                echo '<p>Country: ' . get_user_meta($user->ID, 'country', true) . '</p>';

                if (current_user_can('read_all_data')) {
                    echo '<p>Email: ' . $user->user_email . '</p>';
                    echo '<p>Role: ' . ucfirst(str_replace('_', ' ', get_userdata($user->ID)->roles[0])) . '</p>';
                }

                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
            return ob_get_clean();
        }
    }
}
