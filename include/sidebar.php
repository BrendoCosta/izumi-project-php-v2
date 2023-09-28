<div class="sidebar-wrapper">
    <div class="sidewrapper">
        <div class="sidehead">Status dos Projetos</div>
        <div class="sidecontainer status-container">
            <?php
                
                $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
                if (mysqli_connect_errno($connection)) {
                    
                    callErrorPage(mysqli_connect_error($connection));
                    mysqli_close($connection);
                    die();
                    
                } else {
                    
                    mysqli_set_charset($connection, "utf8mb4");
            
                    $query = "SELECT * FROM " . DATABASE_TABLE_STATUS;
                    $stmt = mysqli_prepare($connection, $query);
                
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    while($call = mysqli_fetch_assoc($result)) {
                        
                        $PROJECT_URL        = $call["url"];
                        $PROJECT_TITLE      = $call["nome"];
                        $PROJECT_IMAGE      = $call["imagem"];
                        $PROJECT_STATUS     = $call["estado"];
                        $PROJECT_PERCENTAGE = $call["porcentagem"];
                        
                        ?>
                        <a href="<?= $PROJECT_URL ?>">
                            <div class="status-background" title="<?= $PROJECT_TITLE ?>" style="background-image: url(https://izumiproject.com.br/resize?url=<?= $PROJECT_IMAGE ?>&mwidth=400);">
                                <div class="status-wrapper">
                                    <p><b><?= $PROJECT_TITLE ?></b><br><span><?= $PROJECT_STATUS ?></span></p>
                                    <span class="rounded"><?= $PROJECT_PERCENTAGE ?>%</span>
                                </div>
                            </div>
                        </a>
                        <?php
                        
                    }
                    
                    mysqli_free_result($result);
                    mysqli_stmt_close($stmt);
                    
                    // LAST UPDATE
                    
                    $query = "SELECT UPDATE_TIME, TABLE_NAME FROM information_schema.tables WHERE table_schema = '".DATABASE_NAME."' AND TABLE_NAME = '".DATABASE_TABLE_STATUS."' ORDER BY UPDATE_TIME DESC LIMIT 1";
                    $stmt = mysqli_prepare($connection, $query);
                    
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    while($call = mysqli_fetch_assoc($result)) {
                        
                        //date_default_timezone_set("America/Phoenix");
                        
                        $datetime1 = new DateTime($call["UPDATE_TIME"]);
                        
                        date_default_timezone_set("America/Sao_Paulo");
                        
                        $datetime2 = new DateTime(date("Y-m-d H:i:s"));
                        
                        $interval = date_diff($datetime1, $datetime2);
                        
                        $years      = date_interval_format($interval, "%y");
                        $months     = date_interval_format($interval, "%m");
                        $days       = date_interval_format($interval, "%d");
                        $totalDays  = date_interval_format($interval, "%a");
                        $hours      = date_interval_format($interval, "%h");
                        $minutes    = date_interval_format($interval, "%i");
                        $seconds    = date_interval_format($interval, "%s");
                        
                        $display    = NULL;
                        
                        if ($years != 0) {
                            
                            $display = "$years ano(s) e $months mês(es) atrás";
                            
                        }
                        if ($years == 0 && $months != 0) {
                            
                            $display = "$months mês(es) e $days dia(s) atrás";
                            
                        }
                        if ($years == 0 && $months < 1) {
                            
                            $display = "$totalDays dia(s) atrás";
                            
                        }
                        if ($years == 0 && $months == 0 && $days == 0 && $hours != 0) {
                            
                            $display = "$hours hora(s) atrás";
                            
                        }
                        if ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes != 0) {
                            
                            $display = "$minutes minuto(s) atrás";
                            
                        }
                        if ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0) {
                            
                            $display = "alguns segundo(s) atrás";
                            
                        }
                        
                        ?>
                        <p class="status-update"><span class="iconify" data-icon="fa-regular:clock" data-inline="true"></span> Atualização: <?= $display ?>.</p>
                        <?php
                        
                    }
                    
                    mysqli_free_result($result);
                    mysqli_stmt_close($stmt);
                    
                }
                
                mysqli_close($connection);
                
            ?>
		</div>
	</div>
	<div class="sidewrapper">
		<div class="sidehead">Discord</div>
		<div class="sidecontainer discord">
			<iframe src="https://discordapp.com/widget?id=680168088993398939&theme=dark" width="100%;" height="100%" allowtransparency="true" frameborder="0"></iframe>
		</div>
	</div>
	<div class="sidewrapper">
		<div class="sidehead">Twitter</div>
		<div class="sidecontainer">
			<a class="twitter-timeline" data-theme="<?php getTheme(); ?>" data-tweet-limit="2" data-lang="pt" href="https://twitter.com/izumi_project?ref_src=twsrc%5Etfw">Tweets by izumi_project</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
</div>