<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Cloud</title>
    <style>
    p {
        margin: 0;
        display: inline;
    }
    body {
        max-width: 100%;
        word-wrap: break-word;
    }
    </style>
</head>
<body>
    <?php

        function noHTML($input, $encoding = 'UTF-8') {
            return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);
        };

        $word_cloud_post = noHTML($_POST["word_cloud"]);

        $word_cloud_array = explode(" ", $word_cloud_post);

        $word_cloud_array_counted = array_count_values($word_cloud_array);

        foreach ($word_cloud_array_counted as $key => $val) {
            if ( $val > '10' ) {
                print_r("<p id='$key' style='font-size:".$val."em;color:aqua'>$key</p>");
            }
            elseif ( $val > '5' ) {
                print_r("<p id='$key' style='font-size:".$val."em;color:maroon'>$key</p>");
            }
            elseif ( $val > '3' ) {
                print_r("<p id='$key' style='font-size:".$val."em;color:yellow'>$key</p>");
            }
            else {
                print_r("<p id='$key' style='font-size:".$val."em;color:orange'>$key</p>");
            }
        };

    ?>
</body>
</html>