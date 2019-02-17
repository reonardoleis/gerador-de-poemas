<div style="text-align: center;">
  <div style="display: inline-block; text-align: justify">
    <?php

define('NUMERO_DE_ESTROFES', 20);
$substantivos   = json_decode(file_get_contents('./substantivos.json'), true); 
$adjetivos      = json_decode(file_get_contents('./adjetivos.json'), true); 
$verbos         = json_decode(file_get_contents('./verbos.json'), true); 
$adverbios      = json_decode(file_get_contents('./adverbios.json'), true); 

$random_substantivo     = rand(0, count($substantivos['palavras'])-1);
$random_adjetivo        = rand(0, count($adjetivos['palavras'])-1);

$substantivo    = $substantivos['palavras'][$random_substantivo]['palavra'];
$adjetivo       = $adjetivos['palavras'][$random_adjetivo]['palavra'];

if($substantivos['palavras'][$random_substantivo]['genero'] == "M"){
    $artigo = 'o';
}else{
    $artigo = 'a';
}
if(substr($adjetivo, strlen($adjetivo)-1, strlen($adjetivo)) != 'e'){
    if($artigo == 'o'){
        $adjetivo = substr($adjetivo, 0, strlen($adjetivo)-1) . 'o';
    }else if($artigo == 'a'){
        $adjetivo = substr($adjetivo, 0, strlen($adjetivo)-1) . 'a';
    }
}

$titulo = ucfirst("$artigo $substantivo $adjetivo");
echo '<h3>' . $titulo . '</h3>';

for($i = 0; $i < NUMERO_DE_ESTROFES; $i++){
    for($j = 0; $j < 4; $j++){
        $poema = '';
        $random_substantivo     = rand(0, count($substantivos['palavras'])-1);
        $random_adjetivo        = rand(0, count($adjetivos['palavras'])-1);
        $random_verbo           = rand(0, count($verbos['palavras'])-1);
        $random_adverbio        = rand(0, count($adverbios['palavras'])-1);
        $substantivo    = $substantivos['palavras'][$random_substantivo]['palavra'];
        $adjetivo       = $adjetivos['palavras'][$random_adjetivo]['palavra'];
        $verbo          = $verbos['palavras'][$random_verbo]['palavra'];
        $adverbio       = $adverbios['palavras'][$random_adverbio]['palavra'];
        if($substantivos['palavras'][$random_substantivo]['genero'] == "M"){
            $artigo = 'o';
        }else if ($substantivos['palavras'][$random_substantivo]['genero'] == "F"){
            $artigo = 'a';
        }
        if(substr($adjetivo, strlen($adjetivo)-1, strlen($adjetivo)) != 'e' 
        and substr($adjetivo, strlen($adjetivo)-1, strlen($adjetivo)) != 'l'
        and substr($adjetivo, strlen($adjetivo)-1, strlen($adjetivo)) != 'r'){
            if($artigo == 'o'){
                $adjetivo = substr($adjetivo, 0, strlen($adjetivo)-1) . 'o';
            }else if($artigo == 'a'){
                $adjetivo = substr($adjetivo, 0, strlen($adjetivo)-1) . 'a';
            }
        }
        if(strpos($verbo, '-')){
            $verbo = substr($verbo, 0, strpos($verbo, '-'));
        }
        $verbo_presente = substr($verbo, 0, strlen($verbo)-1);
        if(substr($verbo_presente, strlen($verbo_presente)-1, strlen($verbo_presente)) == 'i'){
            $verbo_presente = substr($verbo_presente, 0, strlen($verbo_presente)-1) . 'e';
        }
        if($j == 0){
            $poema.=ucfirst("$artigo $substantivo é $adverbio $adjetivo ");
            if($adverbio == 'com'){
                $random_substantivo     = rand(0, count($substantivos['palavras'])-1);
                $poema.=" ".$substantivos['palavras'][$random_substantivo]['palavra'];
            }else if($adverbio == 'às'){
                $random_substantivo     = rand(0, count($substantivos['palavras'])-1);
                $poema.=" ".$substantivos['palavras'][$random_substantivo]['palavra']."s";
            }
        }else if($j == 1){
            $poema.=ucfirst("$verbo $artigo $substantivo, $adverbio");
        }else if($j == 2){
            
            $poema.=ucfirst("$verbo $artigo $substantivo");

        }else if($j == 3){
            
            $poema.=ucfirst("$adverbio $verbo $artigo $substantivo");
        }
       
        echo $poema."<br>";
    }
    echo "<br>";
}
?>
  </div>
</div>
