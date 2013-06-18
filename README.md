# Mime Type

A simple class used to get mime type and extension based on https://github.com/rafacgarciaa/php-mime

#Install

Just download or clone this repo 

#How To Use

    <?php

    include 'MimeType.php';

    $file = 'myClass.php';

    // Loading the file
    $mime = new MimeType($file);

    // or you can override the current file by using this function
    $mime->get($file);

    // get the mime type
    print $mime->type();

    // or get the extension
    print $mime->extension();

#Advanced
    
For more advantage use, please see the link here https://github.com/rafacgarciaa/php-mime. This extension just for simplicize the usage of Mime Class. 