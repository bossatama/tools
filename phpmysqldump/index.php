<?php
/* 
 * 設定項目
 * すべて設定してください
 */
// データベースホスト名
$host = "";
// データベースユーザ名
$user = "";
// データベースパスワード
$password = "";
// データベース名
$dbname = "";
// ダンプファイルの保存先（このファイルのある場所に保存。フルパスが良いかも？）
$file_path = "./";
/* 設定ここまで */

// ファイル名
$filename = 'dbdump_' . date('YmdHis') . '.sql';

// ダンプコマンド発行
$command = "mysqldump " . $dbname . " --host=" . $host . " --user=" . $user . " --password=" . $password . " > " . $file_path . $filename;

// ダンプ実行
system($command);

//ブラウザへ強制ダウンロード
$file = $file_path . $filename;

if (is_writable($file)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $file . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    // ファイルの消去
    unlink($file);
}
