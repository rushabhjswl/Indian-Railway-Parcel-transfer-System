<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
          $file = 'luggage_rates.pdf';
          $filename = 'luggage_rates.pdf';
          header('Content-type: application/pdf');
         header('Content-Disposition: inline; filename="' . $filename . '"');
         // header('Content-Transfer-Encoding: binary');
       //   header('Content-Length: ' . filesize($file));
       //   header('Accept-Ranges: bytes');
          @readfile($filename);
?>
    </body>
</html>
