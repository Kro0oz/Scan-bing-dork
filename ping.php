<?php

print "

 __  __      _  __           ___             ____   ___  _____ 
|  \/  |    | |/ /          / _ \           |___ \ / _ \| ____|
| \  / |_ __| ' / _ __ ___ | | | | ___ ____   __) | | | | |__  
| |\/| | '__|  < | '__/ _ \| | | |/ _ \_  /  |__ <| | | |___ \ 
| |  | | | _| . \| | | (_) | |_| | (_) / / _ ___) | |_| |___) |
|_|  |_|_|(_)_|\_\_|  \___/ \___/ \___/___(_)____/ \___/|____/ 
      
                                                   

   coded by Kro0oz (wis)
           bing dork
 http://pastebin.com/u/Kro0oz
 https://github.com/Kro0oz
      twitter/1337Kro
";


 // coded by Kro0oz (wis)
// usage : php wis.php

function getsource($url, $proxy) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if ($proxy) {
        $proxy = explode(':', autoprox());
        curl_setopt($curl, CURLOPT_PROXY, $proxy[0]);
        curl_setopt($curl, CURLOPT_PROXYPORT, $proxy[1]);
    }
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}

echo "\n\t ur dork here (: : ";$dork=trim(fgets(STDIN,1024));
$do=urlencode($dork);
        //$ip="200.58.111.34";
        $npage = 1;
        $npages = 30000;
        $allLinks = array();
        $lll = array();
        while($npage <= $npages) {
            $x = getsource("http://www.bing.com/search?q=".$do."&first=" . $npage."&FORM=PERE4", $proxy);
            if ($x) {
                preg_match_all('#<h2><a href="(.*?)" h="ID#', $x, $findlink);
                foreach ($findlink[1] as $fl) array_push($allLinks, $fl);
                $npage = $npage + 10;
                if (preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) break;
            } else break;
        }
        $URLs = array();
        foreach($allLinks as $url){
            $exp = explode("/", $url);
            $URLs[] = $exp[2];
        }
        $array = array_filter($URLs);
        $array = array_unique($array);
        $sss=count(array_unique($array));
		echo"\nToTaL SiTe : ". $sss.'';

        foreach ($array as $domain) {

            echo"\nhttp://".$domain.'/';

        }
?>
