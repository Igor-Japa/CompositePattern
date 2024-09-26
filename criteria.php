<?php
//carrega as classes necessárias

include_once 'TExpression.class.php';
include_once 'TCriteria.class.php';
include_once 'TFilter.class.php';

//aqui vemos um exemplo de criterio utilizando o operador OR
//a idade deve ser menor que 16 anos e amior que 60 anos

$criteria = new TCriteria();
$criteria->add(new TFilter('idade','<','16'), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade','>','60'), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "<br>\n";

//aqui vemos um exemplo do criterio utilizando o operador lógico AND
//justamente com os operadores de conjunto IN(dentro do conjunto) e
//NOT IN(fora dos conjunto)
//a idade deve estar dentro do conjunto (24,25,26) e deve estra fora do conjunto (10)
$criteria= new TCriteria;
$criteria->add(new TFilter("idade","in",array(24,25,26)));
$criteria->add(new TFilter("idade","NOT IN",array(10)));
echo  $criteria->dump();
echo "<br>\n";
//aqui vemos um exemplo de criterio utilizando o  operador de comparação
// o nome deve inicar por "pedro" ou deve iniciar por "maria".
$criteria= new TCriteria;
$criteria->add(new TFilter("nome","like",'pedro%'), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('nome','like','maria%'), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo '<br>\n';
//aqui vemos um exemplo de criterio utilizando os operadores "=" e IS NOT
//neste caso  o telefone não pode conter o valor (IS NOT NULL);
//e o genero deve ser feminino(sexo='f')

$criteria= new TCriteria;
$criteria->add(new TFilter('telefone','IS NOT', NULL));
$criteria->add(new TFilter('sexo','=', 'F'));
echo $criteria->dump();
echo '<br>\n';

//aqui vemos o uso deos operadores de compração IN e NOT IN juntamente
//com conjuntos de strings. Nesse caso a UF deve estar entre (RS, SC, PR)
//nõa deve estar entre (AC,PI)

$criteria= new TCriteria;
$criteria->add(new TFilter("UF",'NOT IN',array('RS','SC','PR')));
    $criteria->add(new TFilter('UF','NOT IN',array('AC','PI')));
    echo $criteria->dump();
    echo "<br>\n";
    
    //nestes caso temos o uso de um criterio completo
    //o primeiro critério aponta para o sexo ='F' (sexo feminino) e idade >18

    $criteria1= new TCriteria;  
    $criteria1->add(new TFilter("sexo","=", 'F'));
    $criteria1->add(new TFilter('idade','>','18'));
    
    //o segundi critério aponta para o sexo = 'M'
    //e didad emenir que 16
    $criteria2= new TCriteria;
    $criteria2->add(new TFilter('sexo','=','M'));
    $criteria2->add(new TFilter('idade','<','16'));

    //agora juntamos os dois critérios utilizando o operador lógico OR
    // o resultado deve conter "mulheres maiores de 18 anos" OU "homens menores de 18 anos"
    $criteria= new TCriteria;
    $criteria->add($criteria1,TExpression::OR_OPERATOR);
    $criteria->add($criteria2,TExpression::OR_OPERATOR);
    echo $criteria->dump();
    echo "<br>\n";
    ?>