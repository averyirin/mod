<?php

$userGuid = (int) get_input("userGuid");

get_entity($userGuid)->project_admin = '1';
