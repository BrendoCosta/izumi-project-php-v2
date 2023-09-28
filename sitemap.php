<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    header('Content-type: application/xml; charset=utf-8');
    
    echo '<?xml version="1.0" encoding="UTF-8"?>';

?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
  <loc>https://izumiproject.com.br/</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos?p=animes</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos?p=mangas</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos?p=novels</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/equipe</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/participe</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/duvidas</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/doacoes</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/sobre</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<?php
    
    callDataBaseConfig();
    
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno($connection)) {
        
        callErrorPage(mysqli_connect_error($connection));
        mysqli_close($connection);
        die();
        
    } else {
        
        mysqli_set_charset($connection, "utf8mb4");
        
        $query = mysqli_prepare($connection, "SELECT * FROM ".DATABASE_TABLE_POST." ORDER BY id DESC");
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        
        if (mysqli_num_rows($result) > 0) {
            
            while($call = mysqli_fetch_assoc($result)) {
            
                $YEAR = $call["year"];
                $MONTH = $call["month"];
                $TITLE = $call["title"];
                $SLUG = $call["slug"];
                $DATE = $call["date"];
                $DATEISO = date("c", strtotime($DATE));
                
                echo "<url>\n";
                echo "  <loc>https://izumiproject.com.br/posts/$YEAR/$MONTH/$SLUG</loc>\n";
                echo "  <lastmod>$DATEISO</lastmod>\n";
                echo "  <priority>0.70</priority>\n";
                echo "</url>\n";
                
            }
            
        }
        else {
            
            callPageError("404");
            
        }
        
        mysqli_free_result($result);
        
    }
    
    mysqli_close($connection);
    
?>
<url>
  <loc>https://izumiproject.com.br/?pagina=1</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/?pagina=2</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/?pagina=4</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=2</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=3</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/mangas?id=1</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/mangas?id=2</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=1</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=9</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=10</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=6</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=7</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=4</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=5</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=11</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://izumiproject.com.br/projetos/animes?id=8</loc>
  <lastmod>2021-06-06T04:11:12+00:00</lastmod>
  <priority>0.64</priority>
</url>

</urlset>