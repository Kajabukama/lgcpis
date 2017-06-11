<?php
    $now = time();
    if (isset($_GET['view'])) {
        $welcome = $profile = $message = $forum = $dashboard = $view_officers = $topics = $citizens = '';

        $view = $_GET['view'];
        if ($view == 'welcome') {
            $welcome ='active';
        }
        if ($view == 'profile') {
            $profile ='active';
        }
        if ($view == 'message') {
            $message ='active';
        }
        if ($view == 'forum') {
            $forum ='active';
        }
        if ($view == 'view-officers') {
            $view_officers ='active';
        }
        if ($view == 'topics') {
            $topics ='active';
        }
        if ($view == 'citizens') {
            $citizens ='active';
        }

    }

?>