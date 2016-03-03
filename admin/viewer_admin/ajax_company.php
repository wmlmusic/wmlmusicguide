<?php
include('includes/inc-public.php');
include('includes/classes/class.user.php');

public function userExists()
{
    $user = User::all()->lists('company_email');
    if (in_array(Input::get('company_email'), $user)) {
        return Response::json(Input::get('company_email').' email exists');
    } else {
        return Response::json(Input::get('company_email').' email not found');
    }
}
?>