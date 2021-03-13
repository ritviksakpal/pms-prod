<?php
function buttonElement($btnid, $styleclass, $text, $name, $attr)
{
    $btn = "<button name='$name' class='$styleclass' id='$btnid' '$attr' >$text</button>";

    echo $btn;
}
