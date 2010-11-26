--TEST--
HTML_FormPersister: checkbox with empty value
--FILE--
<?php
require dirname(__FILE__) . '/init.php';
ob_start();
$_POST['33_8'] = "";
$_POST['33_9'] = true;
?>
<form method="get">
<input name="33_7" type="checkbox" value="" id="show_reg_bus" />
<input name="33_8" type="checkbox" value="" id="show_reg_bus" />
<input name="33_9" type="checkbox" value="" id="show_reg_bus" />
</form>
<?echo HTML_FormPersister::ob_formpersisterhandler(ob_get_clean())?>

--EXPECT--
<form method="get" action="">
<input name="33_7" type="checkbox" value="" id="show_reg_bus" />
<input name="33_8" type="checkbox" value="" id="show_reg_bus" checked="checked" />
<input name="33_9" type="checkbox" value="" id="show_reg_bus" />
</form>
