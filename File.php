<?php

/**
 * File
 * @description Class for storing
 */
class File{
    //the attributes accept for File
    private $accept = [
        'png' => 'image/png',   
        'pdf' => 'application/pdf',
        'zip' => 'application/zip',
    ];
    private $size = 5000000;//the size of the file 5MB
    private $filterType = [];
    private $file = [];
    
    /**
     * __construct
     *
     * @param  array $file
     * @param  string $filterType
     * @return void
     * @example __construct(['file], 'jpg,png')
     */
    public function __construct(array $file, string $filterType){
        $this->file = $file;
        $this->filterType = explode(',', $filterType);
    }
    
    /**
     * validateFormat
     *
     * @return bool
     * @description validate format
     */
    public function validateFormat(): bool{
        if(count($this->filterType) > 0){
            $statusOld = false;
            foreach($this->filterType as $filter){
                if(isset($this->accept[$filter])){
                    if($this->file['type'] == $this->accept[$filter]){
                        $statusOld = $statusOld || true;
                    }
                }else{
                    return false;
                }
            }
            return $statusOld;
        }
        return true;
    }
    public function validateSize($size = 0){
        if($size > 0)
            $this->size = $size;
        if($this->file['size'] <= $this->size){
            return true;
        }
        return false;
    }
    public function upload($route = './'){
        if($this->file['error'] == 0){
            $fileName = $route . $this->file['name'];
            move_uploaded_file($this->file['tmp_name'],$fileName);
        }
    }

}