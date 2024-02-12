<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.set.or.th/api/set/stock-info/list-by-symbols?symbols=AMC%2CBANPU%2CBCPG%2CIRPC%2CPERM%2CPSH%2CPSL%2CRICHY%2CTU%2CUNIQ%2CUVAN%2CSPRC%2CROJNA',
  // CURLOPT_URL => 'https://www.set.or.th/api/set/stock-info/list-by-symbols?symbols=AMC',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.5',
    'Accept-Encoding: gzip, deflate, br',
    'Connection: keep-alive',
    'Referer: https://www.set.or.th/th/market/product/stock/top-ranking?market=set',
    'Cookie: visid_incap_2046605=PF0UtJP9RGOspg+k7nsEw6Ozg2UAAAAAQUIPAAAAAADGMV4NNZqWjtLZjrzbZacT; visid_incap_2771851=xEwBMB99SKeaHoyIw0P9PaSzg2UAAAAAQUIPAAAAAAD3ljdxhyzabhZb8X8I+USC; _uid23453=5582C787.12; _gcl_au=1.1.502541069.1699345247; exp_history={go_expid:GusVq2U2QG2l2p9tGb5KTQ,msgt:lightbox_exit_banner,count:1}^|{go_expid:5AD93i4KR9-ZVNOhL9Vr2w-V2,msgt:popup,count:1}^|{go_expid:vZj2v2cjSuCT8gIzugw5hw,msgt:new_highlight,count:3}; _ga_ET2H60H2CB=GS1.1.1705566048.10.1.1705566375.60.0.0; _ga=GA1.3.946869798.1699345249; _ga_6WS2P0P25V=GS1.1.1705566048.10.1.1705566375.60.0.0; SET_COOKIE_POLICY=20231111093657; my-quote=^%^5B^%^22SCGD^%^22^%^2C^%^22HANA^%^22^%^2C^%^22PTTGC^%^22^%^5D; recent-search=^%^5B^%^22SCGD^%^22^%^2C^%^22hana^%^22^%^2C^%^22pttgc^%^22^%^2C^%^22PTT^%^22^%^5D; visid_incap_2685219=37zPuFICRsW2v6Pk5aArxrtsk2UAAAAAQUIPAAAAAAAtMINpoQAt1cWjb3dSjAzO; charlot=bb4a0cd4-1e6f-4fbb-9e20-2ab6e9778078; nlbi_2046605=s4/iOKty3FBegFyHU9DvIwAAAABZWcXxdT/qIbtBsBNtlAX8; incap_ses_422_2046605=MCg5doQSs1Aqrzi22D/bBWPfqGUAAAAAvApPyvQEx9GVQclCZppF5g==; incap_ses_422_2771851=qKTcYwZUVGVctji22D/bBWvfqGUAAAAA/ojDBcaHH6Xd8OTp7CQ5Pw==; _cbclose=1; _cbclose23453=1; _ctout23453=1; landing_url=https://www.set.or.th/th/home; api_call_counter=5; _gid=GA1.3.368016131.1705566048; route=f729b7927b6e6e08cc0e7b423f65adc2',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'Pragma: no-cache',
    'Cache-Control: no-cache'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$result = json_decode($response, true);

// print_r($result);
echo "<table align='center'>";

  $i = 0;
  foreach ($result as $key => $value) {
      // echo $result[$i]["symbol"]."\t".$result[$i]["last"]."<br/>";

      echo "<tr>
      <td align='left' width='60'>".$result[$i]["symbol"]."</td>
      <td align='right' width='50'>".number_format($result[$i]["last"],2)."</td>
      <td align='right' width='50'>".number_format($result[$i]["change"],2)."</td>      
      <td align='right' width='50'>".number_format($result[$i]["percentChange"],2)."</td>
      </tr>";
      
      $i++;
  }

  echo "</table>";

?>