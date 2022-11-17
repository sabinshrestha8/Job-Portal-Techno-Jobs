
<?php

if (! function_exists('get_avatar_text')) {
    /**
     * Get the avatar text from given name.
     *
     * @param  string|null  $name
     * @return string;
     */
    function get_avatar_text($name = null)
    {
        $avatarText = '';

        $nameArray = explode(' ', $name);

        foreach ($nameArray as $name) {
            $avatarText = $avatarText . strtoupper($name[0]);
        }

        return $avatarText;
    }
}

if (! function_exists('get_bg_color')) {
    /**
     * Get the random color.
     *
     * @return string;
     */
    function get_bg_color()
    {
        $colors = ['#0d6efd', '#6610f2', '#6f42c1', '#d63384', '#dc3545', '#fd7e14', '#ffc107', '#198754', '#20c997', '#0dcaf0', '#000'];

        $randomColor = rand(0, count($colors)-1);

        return $colors[$randomColor];
    }
}
