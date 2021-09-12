<?php

class Countries {
    public $country;
    private $fileName = 'countries.txt';

    public function getContent() {
        if (isset($_POST['country'])) {
            $this->country = $_POST['country'];
            return true;
        } else {
            return false;
        }
    }

    public function checkContent() {
        if ($this->getContent()) {
            $content = file_get_contents($this->fileName);
            $arCountries = explode("\n", $content);
            $flag = 0;
            foreach ($arCountries as $item) {
                if (trim(strtolower($item)) == trim(strtolower($this->country))) {
                    $flag = 1;
                }
            }
            if ($flag == 0 && trim($this->country) != '') {
                $fp = fopen($this->fileName, 'a');
                fwrite($fp, $this->country . PHP_EOL);
                fclose($fp);
                $arCountries[] = $this->country;
                echo json_encode($arCountries);
            } else {
                return false;
            }
        }
    }

}
$obj = new Countries();
$obj->checkContent();
