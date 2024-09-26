<?php

/*
*classe TCriteria
*Esta classe prova uma interface utilizada para definição de critérios
*/

class TCriteria extends TExpression {
    private $expressions; //armazena alista de instruções
    private $operators; //armazemna a lista de operadores
    private $properties; //propriedades do criterio
    //metodo Construtor
    function __construct(){
        $this->expressions = array();  
        $this->operators = array();
    }
    /*
    *Metodo Add
    *adiciona uma expressão ao criterio
    *@param $expressions= expressão (objeto TExpression)
    *@param $operator= operador lògio de comparação
    */
    public function add(TExpression $expression,$operator=self::AND_OPERATOR) {    
//na primeira vez, não precisamos de operador lógico para concatenar
if(empty($this->expressions)){
    $operator = NULL:
}
//agrega o resultado da expressao a lista de expressões
$this->expressions[] = $expression;
$this->operators[] = $operator;

    }
    /*Método dump()
    *retorna a expressão final
    */
     public function dump(){
        //concatena a lista de expressoes
        if(count($this->xpressions)>0){
            $result='';
            foreach($this->expressions as $i=>$expression){
                $operator=$this->operators[$i];
                //concatena o operador com a respectiva expressão
                $result.=$operator.$expression->dump();
            }
            $result= trim($result);
            return"({$result})";
        }
     }

/*metodo setPropriety
*definde o valor de uma propriedade
*@param $property=propriedade
*@param $value=valor
*/
public function setProperty($property,$value){
    if(isset($value)){
        $this->properties[$property]=$value;
    }
    else{
        $this->properties[$property]=NULL;
    }
}
/*metodo getProperty()
*retorna o valor da propriedade
*@param $property= propriedade
]*/
public function getProperty($property){
    if(isset($this->properties[$property]))
    {return$this->properties[$property];
    }
}
}
     ?>