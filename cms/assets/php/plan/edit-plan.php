<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

    $titulo = mysqli_real_escape_string($conexao, trim($_POST['edit-titulo']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['edit-descricao']));
    $preco = mysqli_real_escape_string($conexao, trim($_POST['edit-price']));
    $id = $_POST['id'];

    if($_FILES['edit-image']['size'] > 0){
        $query = "SELECT * FROM `tb02_planos` WHERE tb02_id=$id";
        $result = $conexao->query($query);
        if($result->num_rows>0) { 
            while ($linha = $result->fetch_assoc()){ 
                $fotoBanco = $linha["tb02_imagem"];       
            }
        } 
        
        if ($result) {		
            unlink("../../../../assets/img/plan/".$fotoBanco);	
        }

        $images = $_FILES['edit-image'];

        $tmp_name = $images['tmp_name'];
        $type = $images['type'];

        addProductImage($tmp_name, $type, $titulo, $descricao, $id);
        
    }else{
        $queryImage = "UPDATE `tb02_planos` SET `tb02_titulo`='".$titulo."',`tb02_descricao`='".$descricao."', `tb02_preco`='".$preco."' WHERE `tb02_id` = $id";
        $resultadoImage = mysqli_query($conexao, $queryImage);
    }

    function addProductImage($tmp_name, $type, $titulo, $descricao, $id){
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

            $queryImage = "UPDATE `tb02_planos` SET `tb02_titulo`='".$titulo."',`tb02_descricao`='".$descricao."',`tb02_imagem`='".$filename."', `tb02_preco`='".$preco."' WHERE `tb02_id` = $id";
            $resultadoImage = mysqli_query($conexao, $queryImage);
        }
    }
?>