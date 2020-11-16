<?php

function highlight_num($file)
{
  $lines = implode(range(1, count(file($file))), '<br />');
  $content = highlight_file($file, true);

 
  echo '
    <style type="text/css">
        .num {
        float: left;
        color: gray;
        font-size: 12px;   
        font-family: courier;
        text-align: right;
        margin-right: 6pt;
        padding-right: 6pt;
        border-right: 1px solid gray;}

        body {margin: 0px; margin-left: 5px;}
        td {vertical-align: top;}
        code {white-space: nowrap;}
    </style>';
   
   
   
    echo "<table><tr><td class=\"num\">\n$lines\n</td><td>\n$content\n</td></tr></table>";
}
if(isset($_GET['page']))
	highlight_num($_GET['page'] . '.php');
else
	echo 'Er is niets meegegeven'
?>
