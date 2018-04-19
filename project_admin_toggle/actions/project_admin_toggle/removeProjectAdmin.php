<?php

$userGuid = (int) get_input("userGuid");
get_entity($userGuid)->deleteMetadata('project_admin');
