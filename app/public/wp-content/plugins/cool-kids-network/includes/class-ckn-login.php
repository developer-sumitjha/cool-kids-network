<?php

class CKN_Login
{
    public static function init()
    {
        add_shortcode('ckn_login', [self::class, 'login_form']);
    }

    public static function login_form()
    {
        ob_start();
?>
        <form method="POST" action="<?php echo wp_login_url(); ?>" class="ckn-form">
            <input type="email" name="log" placeholder="Email Address" required>
            <input type="hidden" name="pwd" value="ckn_default_password">
            <button type="submit">Login</button>

        </form>

<?php

        return ob_get_clean();
    }
}
