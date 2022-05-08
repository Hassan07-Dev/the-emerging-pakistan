<?php


function sendSuccess($message, $data) {
    return array('status' => true, 'message' => $message, 'data' => $data);
}

function sendError($message, $data) {
    return array('status' => false, 'message' => $message, 'data' => $data);
}

function addFile($file, $path) {

    if ($file) {
        if ($file->getClientOriginalExtension() != 'exe') {
            $type = $file->getClientMimeType();

            if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp' || $type == 'application/pdf') {
                $destination_path = 'public/'.$path;
                $extension = $file->getClientOriginalExtension();
                $fileName = 'image_' . Str::random(15) . '.' . $extension;
                $file->move($destination_path, $fileName);
                $file_path = $path . $fileName;
                if($type == 'application/pdf'){
                    $data['type'] = 'pdf';
                }else{
                    $data['type'] = 'image';
                }
                $data['file_path'] = $file_path;
                return $data;
            } else if($type ==  'video/mp4' || $type ==  'video/webm' || $type == 'video/quicktime') {
                $destination_path = $path;
                if ($type ==  'video/webm')
                    $extension = 'webm';
                else
                    $extension = $file->getClientOriginalExtension();
                $new_ext = '';
                if($extension == 'mov' || $extension == 'MOV'){
                    $new_ext = 'video_' . Str::random(15) . '.' . 'mp4';
                    $fileName = 'video_' . Str::random(15) . '.' . $extension;
                }else{
                    $fileName = 'video_' . Str::random(15) . '.' . $extension;
                }
                $file->move($destination_path, $fileName);
                $file_path = $destination_path . $fileName;
                $video_path = $destination_path . $new_ext;
                if($extension == 'mov' || $extension == 'MOV'){}
                $movie = $file_path;
                $thumbnail = $destination_path.Str::random(15) .'.jpg';
                // Poster
                $ffmpeg = \FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($movie);
                $video
                    ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))
                    ->save($thumbnail);
                $data['type'] = 'video';
                $data['file_path'] = $file_path; // on live put $water_marked_video || on local $file_path
                $data['poster'] = $thumbnail;
                return $data;
            }else
            {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}
