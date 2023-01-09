<?php

class Countries extends ControllerClass
{
    private $countryModel;

    public function __construct()
    {
        $this->countryModel = $this->model('Country');
    }

    public function index($land = null, $age = null)
    {
        $records = $this->countryModel->getCountries();

        var_dump($records);
        $rows = '';
        foreach ($records as $value)
        {
            $rows .= "  <tr>
                            <td>$value->Name</td>
                            <td>$value->CapitalCity</td>
                            <td>$value->Continent</td>
                            <td>$value->Population</td>
                        </tr>";
        }

        $data = [
            'title' => "het land: " . $land . " is " . $age . " jaar oud",
            'rows' => $rows
        ];
        $this->view('countries/index', $data);
    }
}