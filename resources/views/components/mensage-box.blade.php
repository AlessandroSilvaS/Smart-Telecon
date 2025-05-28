<?php

    $bgColor = null;

    if($type && $type != null){

        switch ($type) {
            case 'sucess':
                
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

<div>

    @if($title)

        <div class="title-mensage">

            {{$title}}
    
        </div>

    @end

    @if($text)

        <div class="text-mensage">

            {{$text}}

        </div>

    @end

    @if($includeButton == true)

        {{$includeButton}}

    @endif
</div>