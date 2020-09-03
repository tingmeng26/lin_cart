<?php
ini_set('display_errors', 1);   # 0不顯示 1顯示
error_reporting(E_ALL);         # report all errors
echo '上傳目錄:'.sys_get_temp_dir().'<br>';
echo '上傳目錄是否存在:'.file_exists(sys_get_temp_dir()).'<br>';
echo '上傳目錄權限:'.substr(sprintf('%o', fileperms(sys_get_temp_dir())), -4).'<br>';
echo '上傳目錄是否可讀取:'.is_readable(sys_get_temp_dir()).'<br>';
echo '上傳目錄是否可寫入:'.is_writable(sys_get_temp_dir()).'<br>';
echo '<hr>';
$filepath='upload';

echo '檔案目錄:'.$filepath.'<br>';
echo '檔案目錄是否存在:'.file_exists($filepath).'<br>';
echo '檔案目錄權限:'.substr(sprintf('%o', fileperms($filepath)), -4).'<br>';
echo '檔案目錄是否可讀取:'.is_readable($filepath).'<br>';
echo '檔案目錄是否可寫入:'.is_writable($filepath).'<br>';
exec ("find $filepath -type d -exec chmod 0777 {} +");
chmod($filepath,0777);


