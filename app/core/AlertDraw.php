<?php

namespace App\Core;

class AlertDraw
{
    public static function draw(): void
    {

        if (Session::has('alert')) {
            $alert = Session::get('alert');
            echo '
                <div class="alert alert-' . $alert['status'] . '">
                    ' . $alert['message'] . '
                 </div>
            ';
            Alert::clearAlert();
        }

    }
}