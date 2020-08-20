<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

    $titulo = mysqli_real_escape_string($conexao, trim($_POST['name']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));

    $images = $_FILES['photo'];

    $tmp_name = $images['tmp_name'];
    $type = $images['type'];

    addProductImage($tmp_name, $type, $titulo, $descricao);


    function addProductImage($tmp_name, $type, $titulo, $descricao){
        global $conexao;
        switch($type) {
            case 'image/jpg':
            case 'image/jpeg':
                $o_img = imagecreatefromjpeg($tmp_name);
                break;
            case 'image/png':
                $o_img = imagecreatefrompng($tmp_name);
                break;
        }

        if(!empty($o_img)){
            $width = 800;
            $height = 600;
            $ratio = $width / $height;

            list($o_width, $o_height) = getimagesize($tmp_name);

            $o_ratio = $o_width / $o_height;

            if($ratio > $o_ratio) {
                $img_w = $height * $o_ratio;
                $img_h = $height;
            } else {
                $img_h = $width / $o_ratio;
                $img_w = $width;
            }

            if($img_w < $width) {
                $img_w = $width;
                $img_h = $img_w / $o_ratio;
            }
            if($img_h < $height) {
                $img_h = $height;
                $img_w = $img_h * $o_ratio;
            }

            $px = 0;
            $py = 0;

            if($img_w > $width) {
                $px = ($img_w - $width) / 2;
            }

            if($img_h > $height) {
                $py = ($img_h - $height) / 2;
            }


            $img = imagecreatetruecolor( $width, $height );
            imagecopyresampled($img, $o_img, -$px, -$py, 0, 0, $img_w, $img_h, $o_width, $o_height);

            $filename = md5(time().rand(0,999).rand(0,999)).'.jpg';
            imagejpeg($img, '../../../../assets/img/plan/'.$filename);

            $queryImage = "INSERT INTO `tb02_planos`(`tb02_titulo`, `tb02_descricao`, `tb02_imagem`, `tb02_ativo_index`) VALUES ('".$titulo."', '".$descricao."', '".$filename."', 0)";
            print_r($queryImage);
            $resultadoImage = mysqli_query($conexao, $queryImage);
        }
    }
?>