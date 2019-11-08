<?
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    return curl_exec($ch);
    curl_close ($ch);
}

function getcontent($URL,$POST='')
{
$useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
//Initialize the Curl session
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
if($POST!=''){
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

}
$data = curl_exec($ch);


if($POST!=''){ 
    $redir = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    return $redir;
}else{
    return $data;
} 
curl_close($ch);
}
function get_news($url){
    $get_ketqua888 = getcontent($url); 
    $data=array();
    preg_match('/<h2 class="sapo">(.*?)<\/h2>/is', $get_ketqua888, $mota); 
    $data['mota']=trim($mota[1]);
    preg_match('/<div class="content">(.*?)<style>/is', $get_ketqua888, $noidung); 
    preg_match('/<meta id="pageMetaNewsKeyword"(.*?)content="(.*?)"(.*?)\/>/is', $get_ketqua888, $keywords);
    $data['noidung']='<div>'.trim($noidung[1]);
    $data['keywords']=trim($keywords[2]);
    return $data;
}