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

    public function showDeploymentUI()
    {
        return view('dev.show-deploy-ui');
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

        exec("git add . ", $output, $returnCode);

        exec("git remote -v", $output, $returnCode);
        array_push($consoleResult, $output);

        $commitMessage = "Auto commit message on " . date('Y-m-d H:i:s');
        $escapedCommitMessage = escapeshellarg($commitMessage);
        exec("git commit -m $escapedCommitMessage", $output, $returnCode);
        array_push($consoleResult, $output);

        // exec("git fetch", $output, $returnCode);
        // array_push($consoleResult, $output);

        // exec("git pull --force", $output, $returnCode);
        // array_push($consoleResult, $output);

        shell_exec("cd storage/logs && rm laravel.log");
        return $output;
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

}








