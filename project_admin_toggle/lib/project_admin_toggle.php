<?php

function get_admin_toggle($userGuid){

  $return = array();

  $isAdmin = (get_entity($userGuid)->project_admin == '1');
  $content = var_dump($isAdmin);
  $vars = array('userGuid'=>$userGuid);
  $content .= elgg_view_form('project_admin_toggle/addProjectAdmin', array(), $vars);
  $content .= elgg_view_form('project_admin_toggle/removeProjectAdmin', array(), $vars);


  $title = "Toggle Project Admin"


  elgg_push_breadcrumb($title);

  $return['content'] = $content;
  $return['title'] = $title;
  return  $return;
}

?>
