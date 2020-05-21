<?php
namespace app;


class MainClass
{
    public float $realNumber;
    public float $complexNumber;

    public function __construct($realNumber, $complexNumber)
    {
        $this->realNumber = $realNumber;
        $this->complexNumber = $complexNumber;
    }

    public function __toString()
    {
        return "({$this->realNumber},{$this->complexNumber})";
    }

    public function getRealNumber():float
    {
        return $this->realNumber;
    }

    public function getComplexNumber():float
    {
        return $this->complexNumber;
    }

    public function add(MainClass $add)
    {
        $this->realNumber += $add->getRealNumber();
        $this->complexNumber += $add->getComplexNumber();
    }

    public function mult(MainClass $mult){
        $q = $this->realNumber;
        $w = $this->complexNumber;
        $this->realNumber = ($this->realNumber)*($mult->getRealNumber())-($this->complexNumber)*$mult->getComplexNumber();

        $this->complexNumber = ($q)*($mult->getComplexNumber())+($w)*$mult->getRealNumber();
    }

    public function sub(MainClass $sub){
        $this->realNumber -= $sub->getRealNumber();
        $this->complexNumber -= $sub->getComplexNumber();
    }

    public function div(MainClass $div){
        $q = $this->realNumber;
        $w = $this->complexNumber;
        $this->realNumber = ($this->realNumber*$div->getRealNumber()+$this->complexNumber*$div->getComplexNumber())/(pow($div->getRealNumber(),2)+pow($div->getComplexNumber(), 2));
        $this->complexNumber = (-$q*$div->getComplexNumber()+$w*$div->getRealNumber())/(pow($div->getComplexNumber(),2)+pow($div->getRealNumber(),2));
    }

    public function abs(){
        return sqrt(pow($this->realNumber,2)+pow($this->complexNumber,2));
    }

}