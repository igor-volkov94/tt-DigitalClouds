<?php

if (!function_exists("pre"))
{
    /**
     * Функция вывода массива
     *
     * @param array $var массив, который необходимо вывести
     * @param boolean $all выводить для всех на печать (по умолчанию выводит для адмиистраторов)
     * @param boolean $hide спрятать методом display:none
     **/
    function pre($var, $all=false, $hide=false){
        global $USER;
        if($USER->IsAdmin()||$all){
            $trace = debug_backtrace();
            $arPre = array('file'=>$trace[0]['file'],'line'=>$trace[0]['line']);
            $pre = '<pre id="pre" style="'.(($hide)?'display:none;':'/*display:none;*/').'">'.print_r($var, true).'</pre>';
            $pre .= '<pre id="pre_file" style="display:none;">'.print_r($arPre, true).'</pre>';
            echo $pre;
        }
    }
}

if (!function_exists("printLogs"))
{
    /**
     * Функция логирования
     * по умолчанию печатает в "/local/var/logs/printLogs.log"
     * обазательно добавьте файл .htaccess deny from all
     *
     * @param array $arFields массив, который необходимо записать в лог
     * @param string $namePrintFileLog куда печатать. Можно передать название, тогда по умолчанию будет печатать в /local/var/logs/
     **/
    function printLogs($arFields, $namePrintFileLog = "printLogs.log"){
        $defaultFileDir = '/local/var/logs';
        $arDirFile = explode('/', $namePrintFileLog);
        if (count($arDirFile) > 1) {
            $fileName = array_pop($arDirFile);
            $dirFile = implode('/', $arDirFile);
        }else{
            $dirFile = $defaultFileDir;
            $fileName = $namePrintFileLog;
        }

        $arFileName = explode('.', $fileName);
        if (empty($arFileName[1])) {
            $fileName .= '.txt';
        }

        $trace = debug_backtrace();
        $date = date("Y-m-d H:i:s");
        $file = str_replace($_SERVER["DOCUMENT_ROOT"], '', $trace[0]['file']);
        $arInfo = array('file'=>$file,'line'=>$trace[0]['line'], 'date'=>$date);
        mkdir($_SERVER["DOCUMENT_ROOT"].$dirFile, 0775, true); // создаем директорию если ее нет, т.к. file_put_contents не делает этого
        file_put_contents($_SERVER["DOCUMENT_ROOT"].'/'.$dirFile.'/'.$fileName, print_r(array("PRINT_R" => $arFields, "INFO" => $arInfo), true), FILE_APPEND);
    }
}

if (!function_exists("getImageProp"))
{
    /**
     * Функция для обрезки фотографиий с помощью ResizeImageGet
     *
     * @param $img - либо id изображения, либо массив, описывающий изображение
     * @param $w - ширина изображения, до которой необходимо обрезать
     * @param $h - высота изображения, до которой необходимо обрезать
     * @param $trigger - Возвращаем массив или только src
     * @param $filter - фильтр
     **/

    function getImageProp($img, $w, $h, $trigger = 0, $filter = Array()){
        $res = CFile::ResizeImageGet($img, Array("width" => $w,"height" => $h), BX_RESIZE_IMAGE_PROPORTIONAL, true, $filter);
        return ($trigger) ? $res['src'] : $res;
    }
}