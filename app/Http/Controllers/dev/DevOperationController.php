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
        $results = $this->gitOperations();
        foreach ($results as $result) {
            echo "<pre>" . $result . "</pre>";
        }
    }

    function gitOperations()
    {
        $consoleResult = [];

        // Attempt to change the directory
        if (!chdir('..')) {
            $consoleResult[] = "Error changing directory";
            return $consoleResult;
        }

        // Get the new current working directory
        if (!($appRootFolder = getcwd())) {
            $consoleResult[] = "Error getting current working directory";
            return $consoleResult;
        }

        $appRootFolderSafe = escapeshellarg($appRootFolder);

        // Git add
        $gitAddResult = shell_exec("git add . ");
        $consoleResult[] = $gitAddResult;

        // Git commit
        $commitMessage = "auto commit message on " . date('Y-m-d H:i:s');
        $escapedCommitMessage = escapeshellarg($commitMessage);
        $gitCommitResult = shell_exec("git commit -m $escapedCommitMessage");
        $consoleResult[] = $gitCommitResult;
        // Git fetch
        $gitFetchResult = shell_exec("git fetch");
        $consoleResult[] = $gitFetchResult;

        // Git pull
        $gitPullResult = shell_exec("git -C $appRootFolderSafe pull --force");
        $consoleResult[] = $gitPullResult;

        return $consoleResult;
    }

    public function deploy()
    {
        $repositoryURL = 'https://github.com/ShineShineDev/';
        $output = '';
        $localRepoPath = getcwd();
        return $localRepoPath;
    }



}








