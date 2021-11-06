<?php
header("Content-type: text/xml");
echo '<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
echo '   
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
for($i=1;$i<=114;$i++)
    {
        echo '<url>';
        echo '<loc>http://arini.website/alquran/read.php?surat='.$i.'</loc>';
        echo '<changefreq>weekly</changefreq>';
        echo '</url>';
     }
echo '</urlset>';
?>