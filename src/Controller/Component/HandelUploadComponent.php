<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * HandelUpload component
 */
class HandelUploadComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];



    public function upload($data, $field, $type)
    {   
        $postVid = $data[$field];
        if (!$postVid) {
            return ['status' => false, 'message' => 'No file uploaded. Please try again.'];
        }

        $name = $postVid->getClientFilename();
        
        $targetPath = WWW_ROOT . 'uploads' . DS . $type . DS . $name;
        $this->setPermission('uploads');
        if ($postVid->getSize() > 0 && $postVid->getError() == 0) {
            $dir = dirname($targetPath);
            if (!is_dir($dir)) {
                if (!mkdir($dir, 0755, true)) {
                    return ['status' => false, 'message' => 'Failed to create target directory.'];
                }
            }
            $postVid->moveTo($targetPath);
            if (file_exists($targetPath)) {
                if (filesize($targetPath) === $postVid->getSize()) {
                   

                    $data[$field] = $name;
                    return ['status' => true, 'data' => $data];
                } else {
                    unlink($targetPath);
                    return ['status' => false, 'message' => 'File upload failed. Incomplete file upload.'];
                }
            } else {
                return ['status' => false, 'message' => 'File upload failed. File not found after moving.'];
            }
        } else {
            $error = $postVid->getError();
            $errorMessage = 'Invalid file upload.';
            switch ($error) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $errorMessage = 'The uploaded file exceeds the allowed size.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errorMessage = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $errorMessage = 'No file was uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errorMessage = 'Missing a temporary folder.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errorMessage = 'Failed to write file to disk.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errorMessage = 'File upload stopped by extension.';
                    break;
            }
            return ['status' => false, 'message' => $errorMessage];
        }
    }


    public function setPermission($file){
        $directory = WWW_ROOT . $file;
        $perms = fileperms($directory);
        if (!is_writable($directory)) {
            chmod($directory, 0755);
        }
    }
}