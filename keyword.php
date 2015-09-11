<?php
require('include/config.php');
require('include/functions/main.php');
$popKeywords = get_keywords(100);

include $cg['viewdir'] . '/keyword_v.php';
?>