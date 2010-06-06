<?php
    require_once 'config.php';
    
    class SvnRepoRepository {
        function getAll() {
            $dp = opendir(SVN_PARENT);
            while ( ( $file = readdir($dp)) !== false) {
                if ( $file[0] == "." ) continue;	
                if ( is_dir ( SVN_PARENT  ."/$file" ) ) {
                    $repositories[] = $file;    
                }
            }
            closedir($dp);
            sort($repositories);
        }
    }