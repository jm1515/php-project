<?php
require_once("model/SearchEstablishmentModel.php");
require_once("view/EstablishmentView.php");

class SearchEstablishmentController extends GenericController
{
    private $result;
    private $services;
    function __construct()
    {
        parent::__construct(new SearchEstablishmentModel(), new EstablishmentView());
        $this->searchEstablishment();
    }

    public function show(){
        parent::getView()->show($this->result, $this->services);
    }

    private function searchEstablishment(){
        $this->services = array();
        if (isset($_GET['search'])) {
            $this->result = parent::getModel()->getAllEstablishments();
            for ($i = 0; $i < sizeof($this->result); $i++) {
                array_push($this->services, parent::getModel()->getEstablishmentServices($this->result[$i]['residence_id']));
            }
        } else {
            if (isset($_GET['department'])) {
                $department = htmlspecialchars($_GET['department']);
            }else {
                $department = null;
            }
            if (isset($_GET['service'])) {
                $service = htmlspecialchars($_GET['service']);
            }else {
                $service = null;
            }
            if (isset($_GET['price'])) {
                $price = htmlspecialchars($_GET['price']);
                if ($price == '1500'){
                    $pricemin = 0;
                    $pricemax = 1500;
                }else if ($price == '2000'){
                    $pricemin = 1500;
                    $pricemax = 3000;
                } else {
                    $pricemin = 3000;
                    $pricemax = 100000;
                }
            }else {
                $pricemin = null;
                $pricemax = null;
            }
            if (isset($_GET['name'])) {
                $name = htmlspecialchars($_GET['name']);
            }else {
                $name = null;
            }
            $this->result = parent::getModel()->searchEstablishment($service, $department, $pricemin, $pricemax, $name);

            for ($i = 0; $i < sizeof($this->result); $i++) {
                $this->services[$i] = parent::getModel()->getEstablishmentServices($this->result[$i]['residence_id']);
            }
        }
    }
}
