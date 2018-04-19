<?php

?>

<div class="formBox">
    <div>
        <?php

        echo elgg_view('input/text', array(
            'name' => 'userGuid',
            'value' => $vars['userGuid'],
        ));

        echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('submit')));
        ?>
    </div>
</div>
