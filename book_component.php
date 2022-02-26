<?php
function inputElement($icone,$placeholder,$name,$value)
{
    $ele = "
    <div class='input-group mb-2'>
               <div class='input-group-prepend'>
                  <div class='input-group-text bg-warning'>
                  $icone
                    </div>
                </div>
                    <input type='text' value= '$value' name= '$name' autocomplete='off' class='form-control'
                    id='inlineFormInputGroup' placeholder='$placeholder'>

            </div>
            ";

            echo $ele;
}

function buttonElement($btnid,$styleclass,$text,$name,$attr){

    $btn="
    
    <button name='$name' '$attr' class='$styleclass' id='$btnid' >$text</button>
    
    ";
    
    echo $btn;
}
