<?php 
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	echo shell_exec("git pull https://github.com/Leadera/ecoman_repo.git 2>&1");
?>