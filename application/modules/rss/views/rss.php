<? header('Content-Type: text/xml; charset=utf-8');echo '<?xml version="1.0" encoding="utf-8" ?>
';?>
<rss version="2.0" xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
  <channel>
    <title>Tin mới nhất - Việt Ô tô RSS</title>
    <description>Vietoto Việt Ô tô RSS</description>
    <pubDate><?php echo gmdate(DATE_RSS, time()); ?></pubDate>
    <generator>Vietoto.Vietoto.com.vn:http://vnexpress.net/rss</generator>
    <link>http://vietoto.com.vn/rss</link> 
<?
foreach($rss as $news)
{
      $NoiDung=strip_tags($news['content']);
      $NoiDung=''.substr($NoiDung,0,200).'';
      $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
      echo'
      <item>
      <title>'.$news['title'].'</title>
      <description><![CDATA['.$NoiDung.']]></description>
      <pubDate>'.gmdate(DATE_RSS, strtotime($news['date'])).'</pubDate>
      <link>'.$news['link'].'</link>
      <guid>'.$news['link'].'</guid>
      </item>
        ';
} 
?>
</channel>
</rss>