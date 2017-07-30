<?php

// create curl resource
        
ini_set('display_errors', 0);
        // set url
        // $res= exec("curl -u testclient:testpass http://localhost/my-oauth-walkthrough/token.php -d 'grant_type=client_credentials'");
        // print_r($res);
        // exit;

        if ($_REQUEST['access_tkn']) {

            $token['url'] = "http://localhost/crudapi/token.php";
            
            $data = array("grant_type" => "client_credentials");                   
            $token['data_string'] = json_encode($data);  

            $objRes = curlexec($token);

            // display an authorization form
                if (empty($_POST)) {
                  exit('
                <form method="post">
                  <label>Do You Authorize TestClient?</label><br />
                  <input type="text" name="access_token" value="'.$objRes->access_token.'"/>
                  <input type="submit" name="authorized" value="yes">
                  <input type="submit" name="authorized" value="no">
                </form>');
                }
        }

        if ($_REQUEST['authorized']) {

       
//            print_r("sdfs");
        
            echo header('Content-Type: application/json');
            $res= exec("curl http://localhost/crudapi/resource.php -d 'access_token=".$_REQUEST['access_token']."'");


        
            echo $res;
            exit;

             // $token['url'] = "http://localhost/my-oauth-walkthrough/resource.php";
           
             // $data = array("access_token" => $_REQUEST['access_token']);           
             // $token['data_string'] = json_encode($data);  
             // // print_r($data); 

             // $objaurthRes = curlexec2($token);

             // print_r($objaurthRes );

        }

            // print the authorization code if the user has authorized your client

             
        // close curl resource to free up system resources
function curlexec2($param) {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $param['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param['data_string']);     

        //curl_setopt($ch, CURLOPT_USERPWD, "testclient:testpass");   
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);

        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                   
        //     'Content-Type: application/x-www-form-urlencoded'                                           
        //     )                                                                       
        // );  
        $output = curl_exec($ch);
        //echo $output;
        curl_close($ch);      
        // $output contains the output string
        
        return $output;
        

}        

function curlexec($param) {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $param['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param['data_string']);     

        curl_setopt($ch, CURLOPT_USERPWD, "testclient:testpass");   
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                   
            'Content-Type: application/json'                                           
            )                                                                       
        );  
        $output = curl_exec($ch);
        curl_close($ch);      
        // $output contains the output string
        
        return json_decode($output);
        

}