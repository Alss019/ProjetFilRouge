<?php
    // Fonction de redirection vers une page avec un delai en ms
    function redirection($dest, $duree){
        echo '
        <script>
            setTimeout(()=>{
                document.location.href="'.$dest.'"; 
            }, '.$duree.');
        </script>';
    }

    function cleanInput(?string $input):?string{
        return htmlspecialchars(strip_tags(trim($input)));
    }

    function dd(...$vars){
        foreach($vars as $var){
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }
    }
