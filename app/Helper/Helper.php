<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('fileUpload')) {
    function fileUpload($file,$folder = null)
    {
        $getContent = file_get_contents($file);
        // Check if the content is empty or if the file doesn't exist
        if ($getContent === false) {
            return ['status' => false, 'message' => 'File not found or unable to read content'];
        }
        $fileInfo = pathinfo($file);
        $extension = $file->extension();
        $folderName = $folder;
        $image = $getContent;
        $fileName = time() . '.' . $extension;
        // Create directory if it doesn't exist
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName, 0775, true);
        }
        $realPath = 'public/' . $folderName;
        Storage::put($realPath . '/' . $fileName, $image);
        $path = $realPath . '/' . $fileName;
        return $path;
    }
}