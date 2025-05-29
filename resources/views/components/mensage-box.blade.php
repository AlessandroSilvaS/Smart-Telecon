<?php

    $bgColor = null;

    if($type && $type != null){

        switch ($type) {
            case 'success':
                
                $bgColor = '#28a745';

                break;
            
            case 'error':

                $bgColor = '#dc3545';

                break;

            case 'warning':

                $bgColor = '##ffc107';
    
                break;

            default:

                $bgColor = '#ffffff';

                break;
        }

    }else{
        echo 'error! \n type not defined';
    }
?>

<div style="width: {{$widthDimension}}; background-color: {{$bgColor}};">

    @if($title)

        <div class="title-mensage" style='color: white;'>

            {{$title}}
    
        </div>

    @endif


    @if($text)

        <div class="text-mensage" style='color: white;'>

            {{$text}}

        </div>
    @endif

    
</div>