<?php

namespace App\Helpers;

class ToastrMessage
{




    public static function message($typeMessage = "success", $title = "Hello", $message, $position = "topRight")
    {

        $datas = [];
        if (is_array($message)) {
            $data = [];
            foreach ($message as $key => $messages) {
                foreach ($messages as $value) {

                    $data[] = $value;
                }
            }
            $datas = $data;
            $final = implode("<br>", $datas);

            return
                "iziToast.{$typeMessage}({
        title: '$title',
        message: '$final',
        position: '$position'
      });";
        } else {
            return
                "iziToast.{$typeMessage}({
            title: '$title',
            message: '$message',
            position: '$position'
          });";
        }
    }
}
