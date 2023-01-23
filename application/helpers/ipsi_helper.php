<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        if ($role_id == 1 && $menu == 'user') {
            redirect('auth/blocked');
        } else if ($role_id == 2 && $menu == 'admin') {
            redirect('auth/blocked');
        }
    }
}
