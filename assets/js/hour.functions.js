$(document).ready(function () {
    var hoje=new Date();
    var dia= hoje.getDay();
    var hora = hoje.getHours();
    var semana=new Array(6);
    semana[0]='Domingo';
    semana[1]='Segunda-Feira';
    semana[2]='Terça-Feira';
    semana[3]='Quarta-Feia';
    semana[4]='Quinta-Feira';
    semana[5]='Sexta-Feira';
    semana[6]='Sábado';
    if(semana[dia] != 'Domingo'){ // SE FOR DIFERENTE DE DOMINGO ENTRA NA CONDIÇÃO
        if(semana[dia] == 'Sábado'){ // HORÁRIO ESPECIAL PARA SÁBADO
            if(hora <= 8 || hora >= 18){
                $(".phone").hide();
            }
        }else{
            if(hora <= 8 || hora >= 20){
                $(".phone").hide();
            }
        }
    }else{ //SE FOR DOMINGO NÃO ENTRA
        $(".phone").hide();
    }
    // setInterval("diasemana()", 3000);

});
// $(document).ready(function () {
//     diasemana();
// });