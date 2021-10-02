<?php

//ktra user dang nhap
if (!function_exists('get_data_user')) {
    function get_data_user($guest, $column = 'id')
    {
        return Auth::guard($guest)->user() ? Auth::guard($guest)->user()->$column : null;
    }
}

// lay link anh

if (!function_exists('url_file')) {
    function url_file($image, $folder = '')
    {
        if (!$image) {
            return '/image/no-image.jpg';
        }
        $explode = explode('__', $image);


        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '../'.'public'.'/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
if (!function_exists('url_file2')) {
    function url_file2($image, $folder = '')
    {
        if (!$image) {
            return '/image/no-image.jpg';
        }
        $explode = explode('__', $image);


        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return './'.'./'.'public'.'/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
if (!function_exists('url_file3')) {
    function url_file3($image, $folder = '')
    {
        if (!$image) {
            return '/image/no-image.jpg';
        }
        $explode = explode('__', $image);


        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '../../'.'public'.'/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
//up  load anh

if (!function_exists('upload_image')) {
    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;
        //lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];
        //Lay thong tin anh
        $info = new SplFileInfo($baseFilename);
        //duoi file
        $ext = strtolower($info->getExtension());
        //ktra dinh dang file
        if (!$extend) {
            $extend = ['png', 'jpg', 'jpeg', 'webp'];
        }
        if (!in_array($ext, $extend)) {
            return $data['code'] = 0;
        }
        //tao file moi
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $fileName = date('Y-m-d__') . \Illuminate\Support\Str::slug($nameFile) . '.' . $ext;;
        //thu muc goc de uploads

        $path = public_path() . '/uploads/' . date('Y/m/d/');
        if ($folder) {
            $path = public_path() . '/uploads/' . $folder . '/' . date('Y/m/d/');
        }

        if (!\File::exists($path)) {
            mkdir($path, 0777, true);
        }
        //di chuyen file vao thu muc
        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $fileName);

        $data = [
            'name' => $fileName,
            'code' => $code,
            'path' => $path,
            'path_img' => 'uploads/' . $fileName
        ];
        return $data;
    }
}
