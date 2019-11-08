<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    //upload file through UI
    public function fileUpload(Request $request)
    {
        //$file = $request->file('file');
        //$file->getSize();
        return view('file');
    }
    //return/show file information ( file name, file size, file extension )
    //create a button to encrypt the file, with the ability of naming and give a location to the file
    //create a button to decrypt file, ability to choose name and location

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function store(Request $request)
    {
        $fileToEncrypt = $request->file('fileToEncrypt');
        $fileToDecrypt = $request->file('fileToDecrypt');

        $fileName = $request->input('fileName');
        $fileNameDecryption = $request->input('$fileNameDecryption');
        $fileLocation = $request->input('fileLocation');

        switch ($request->input('action')) {
            case 'save':
                $fileSize = $request->file('fileToEncrypt')->getSize();
                $fileSizeHumanReadable = $this->formatSizeUnits($fileSize);
                $fileName = $request->file('fileToEncrypt')->getClientOriginalName();
                $fileExtension = $request->file('fileToEncrypt')->getClientOriginalExtension();

                $fileInformation = array($fileSizeHumanReadable, $fileExtension, $fileName);
                return redirect()->back()->with('status', $fileInformation);
                break;

            case 'encryptFile':

                try {
                    $fileContent = $fileToEncrypt->get();
                } catch (FileNotFoundException $e) {
                    return 'File Not Found';
                }
                // Encrypt the Content
                $encryptedContent = encrypt($fileContent);
                if ($fileLocation === null) {
                    Storage::put($fileName, $encryptedContent);
                }


                //store file in path that was given
                return redirect()->back()->with('stats', 'Encrypted Successfully');
                break;

            case 'decryptFile':
                $fileToDecryptOriginalName = $fileToDecrypt->getClientOriginalName();
                $encryptedContent = Storage::get($fileToDecryptOriginalName);
                $decryptedContent = decrypt($encryptedContent);

                return response()->streamDownload(function () use ($decryptedContent) {
                    echo $decryptedContent;
                }, $fileNameDecryption);
                break;
        }
    }
}
