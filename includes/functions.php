<?php
    
function isEmpty($formValue){

    if(empty($formValue)){

        return true;

    }else{

        return false;
        
    }
}

function printWarningIfFromDataIsMissing($isThisMissing){

    if($isThisMissing){
        ?>
        <p class="formWarning">Obligatoriskt fält</p>
        <?php
        }
}

    
     
