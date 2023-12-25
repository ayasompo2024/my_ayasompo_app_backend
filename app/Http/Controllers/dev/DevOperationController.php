<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use DirectoryIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DevOperationController extends Controller
{
    public function index()
    {
        $files = File::files('./../DOC');
        rsort($files);
        return view('dev.doc.index', compact(['files']));
        //return Storage::download('folder/file');
    }

    public function getContent($file)
    {
        $files = File::files('./../DOC');
        rsort($files);
        $content = File::get('./../DOC/' . $file);
        return view('dev.doc.content', compact(['files', 'content']));
    }

    public function showDeployUi()
    {
        if (!chdir('..'))
            die("Error changing directory");

        if (!($parentDir = getcwd()))
            die("Error getting current working directory");

        $repositoryName = 'https://github.com/ShineShineDev/aya-sompo';
        $localRepoPath = $parentDir . '/' . $repositoryName;

        if (!exec("git -C $localRepoPath pull --force", $output, $returnCode)) {
            die("Error executing git pull");
        }

        if ($returnCode === 0) {
            echo "Git pull successful!";
        } else {
            echo "Error executing git pull. Output:\n";
            echo "<pre>" . implode("\n", $output) . "</pre>";
        }
        // chdir('..');
        // $appRootFoler = getcwd();
        // $listing = shell_exec("ls -a $appRootFoler");
        // echo "<pre>$listing</pre>";
    }
    public function deploy()
    {
        $repositoryURL = 'https://github.com/ShineShineDev/';
        $output = '';
        $localRepoPath = getcwd();
        return $localRepoPath;
    }



}







