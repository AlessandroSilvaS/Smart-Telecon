<?php

    $bgColor = null;

    if($typeMensage && $typeMensage != null){

        switch ($typeMensage) {
            case 's':
                
                $bgColor = '#28a745';

                break;
            
            case 'e':

                $bgColor = '#dc3545';

                break;

            case 'w':

                $bgColor = '#ffc107';
    
                break;

            default:

                $bgColor = '#ffffff';

                break;
        }

    }else{
        echo 'error! \n type not defined';
    }
?>

<div style="width: {{$widthDimension}}; min-height: 100px; background-color: {{$bgColor}}; margin: 0 auto; border-radius: 15px">


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