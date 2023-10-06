<?php

namespace App\Http\Controllers\backup;

use App\Http\Controllers\Controller;
use DirectoryIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataBaseBackupController extends Controller
{



    public function showBackupFile()
    {

        $sql_file = File::files('./../backup');
        rsort($sql_file);
        return view('backup.database_backup', compact(['sql_file']));
        //return Storage::download('folder/file');
    }

    public function backupAll()
    {
        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName = env('DB_HOST');
        $mysqlUserName = env('DB_USERNAME');
        $mysqlPassword = env('DB_PASSWORD');
        $DbName = env('DB_DATABASE');
        
        $file_name = 'db_backup_on_' . date('Y_m_d_H_i_s') . '.sql';


        $queryTables = \DB::select(\DB::raw('SHOW TABLES'));
        foreach ($queryTables as $table) {
            foreach ($table as $tName) {
                $tables[] = $tName;
            }
        }
        // $tables  = array("users","products","categories"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
        foreach ($tables as $table) {

            $show_table_query = "SHOW CREATE TABLE " . $table . "";
 
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }

        file_put_contents("./../backup/" . $file_name, $output);

        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);

    }

    public function index()
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}


//object(Symfony\Component\Finder\SplFileInfo)#1548 (4) { ["relativePath":"Symfony\Component\Finder\SplFileInfo":private]=> string(0) "" ["relativePathname":"Symfony\Component\Finder\SplFileInfo":private]=> string(8) "test.sql" ["pathName":"SplFileInfo":private]=> string(18) "../backup/test.sql" ["fileName":"SplFileInfo":private]=> string(8) "test.sql" }