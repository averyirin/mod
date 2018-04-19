<?php
/**
 * Author: Irin Avery
 * Desc: Start file for group_statistics plugin
 */
//group events export action handler
$action_path = elgg_get_plugins_path() . 'project_admin_toggle/actions/project_admin_toggle';
//register export action
elgg_register_action("project_admin_toggle/addProjectAdmin", $action_path . "/addProjectAdmin.php");
elgg_register_action("project_admin_toggle/removeProjectAdmin", $action_path . "/removeProjectAdmin.php");
//register plugin init
elgg_register_event_handler('init', 'system', 'project_admin_toggle_init');

//when the plugin is active
function project_admin_toggle_init()
{
    //register group_events_export library
    elgg_register_library('project_admin_toggle:lib', elgg_get_plugins_path() . 'project_admin_toggle/lib/project_admin_toggle.php');
    //load library
    elgg_load_library('project_admin_toggle:lib');
    //if we are in the portal/gallery url register libraries
    if (get_context() == 'project_admin_toggle') {
        //register page handler
        elgg_register_page_handler('project_admin_toggle', 'project_admin_toggle_page_handler');
    }
}

/**
 *Directs user to specified pages
 * portal/plugin_name/$page[0]/page[1]/page[2]
 * portal/gallery/$page[0]/page[1]/page[2]
 *
 * @param array $page
 * @return bool if the page has been found
 */
function project_admin_toggle_page_handler($page)
{
    //set page and group id
    $pageNav = $page[0];

    switch ($pageNav) {
        case "toggle":
                $current_user_guid = elgg_get_logged_in_user_guid()
                //call get_dashboard_view in our library
                $params = get_admin_toggle($current_user_guid);
                //one_sidebar, content, admin
                //or create your own layout in your plugin views > page > layouts > layout_name.php
                $body = elgg_view_layout('one_sidebar', $params);
            break;
    }

    //show the created page
    echo elgg_view_page($params['title'], $body);
    return true;
}
