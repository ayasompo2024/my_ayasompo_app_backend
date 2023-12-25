<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use DirectoryIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function terminal()
    {
        return view('dev.terminal');
    }

    //AJAX
    public function command(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "command" => "required",
        ]);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);
        $output = '';
        if (!chdir('..')) {
            $consoleResult[] = "Error changing directory";
            return $consoleResult;
        }
        getcwd();
        exec($req->command, $output, $returnCode);
        return $output;
    }

    function OneClickDeploy()
    {
        $output = '';
        $consoleResult = [];
        if (!chdir('..')) {
            $consoleResult[] = "Error changing directory";
            return $consoleResult;
        }
        getcwd();

        $gitAddResult = shell_exec("git add . ");
        $consoleResult[] = "add ..." . $gitAddResult;

        $commitMessage = "auto commit message on " . date('Y-m-d H:i:s');
        $escapedCommitMessage = escapeshellarg($commitMessage);
        $gitCommitResult = shell_exec("git commit -m $escapedCommitMessage");
        $consoleResult[] = "commit ..." . $gitCommitResult;

        $gitFetchResult = shell_exec("git fetch");
        $consoleResult[] = "fetch .." . $gitFetchResult;

        exec("tree", $output, $returnCode);
        return $output;
    }

}








