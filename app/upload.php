<?php


try {

    //  Validate File Upload
    //  File Size, File Type
    if(!isset($_FILES['file'])) {
        throw new \Exception("No file specified!");
    }
    
    if(strtolower($_FILES['file']['type']) != "application/pdf") {
        throw new \Exception("Invalid File Type. ". json_encode($_FILES['file']));
    }

    if($_FILES['file']['size'] > 2*1e+7) {
        throw new \Exception("Invalid file size");
    }

    //  Prepare pdftk processing
    $name = $_FILES['file']['name'];  
    $upload_path =  $_FILES['file']["tmp_name"];
    $convert_path = stream_get_meta_data(tmpfile())['uri'];
    
    //  Execute pdftk binary 
    $output=null;
    $retval=null;

    exec('pdftk '.$upload_path.' output '.$convert_path. '', $output, $retval);

    //  Check if execution was successful
    if($retval !== 0) {
        //  Cleanup
        unlink($upload_path);
        throw new \Exception("pdftk error");
    }

    $pdf = file_get_contents($convert_path);
    if(!$pdf) {
        throw new \Exception("Cannot get file contents.");
    }
    //  Generate base64 string from PDF
    $base64 = base64_encode($pdf);
    
    //  Send JSON Response
    $response = array(
        "base64" => $base64, 
        "name" => $name,
        "file"=>json_encode($_FILES['file'])
    );

    header('Content-Type: application/json');
    echo json_encode($response);

    //  Cleanup
    unlink($upload_path);
    unlink($convert_path);

} catch (\Exception $e) {
    //  Send Error Response
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: application/json');
    die("There was an error with your request. ($e)");
}

