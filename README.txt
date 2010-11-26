HTML_FormPersister: keep HTML form "value" fields after unsuccessful POST request (from $_POST array)
(C) dkLab, http://dklab.ru/lib/HTML_FormPersister/

Modifies HTML-forms adding "value=..." fields to <input> tags according 
to STANDARD PHP $_GET and $_POST variable. Also supported <select> and 
<textarea>.


SYNOPSIS
--------

<?php
require_once 'HTML/FormPersister.php';

// Assign a value to a form field!
$_POST['third']['a']['b'] = "test value";

// Assign output post-processor to fill value="..." attributes.
ob_start(array('HTML_FormPersister', 'ob_formpersisterhandler'));
?>  

<form>
  <input type="text" name="simple" default="Enter your name">
  <input type="text" name="second[a][b]" default="Something">
  <select name="sel">
    <option value="1">first</option>
    <option value="2">second</option>
  </select>
  <input type="text" name="third[a][b]">
  <input type="submit">
</form>

Clicking the submit button, you see that values of text fields and 
selected element in list remain unchanged - the same as you entered before 
submitting the form.

And more, you may assign some values to $_POST (or $_GET) array and
expect these values will automagically appear in the form fields!
So don't think about value="<?=htmlspecialchars($var)?>" anymore.

You may view online demo of all HTML_FormPersister features at
http://en.dklab.ru/lib/HTML_FormPersister/demo/test/HTML_FormPersister/t_formpersister.php

The same method even works with <select multiple>, checkboxes etc. You do 
not need anymore to write "value=..." or "if (...) echo 'selected'" 
manually in your scripts, nor use dynamic form-field generators confusing
your HTML designer. Everything is done automatically based on $_GET and 
$_POST arrays.

Form fields parser is based on fast HTML_SemiParser library, which 
performes incomplete HTML parsing searching for only needed tags. On most 
sites (especially XHTML) it is fully acceptable. The parser is fast: if
there are no one form elements in the page, it returns immediately, don't
ever think about overhead costs of parsing.
