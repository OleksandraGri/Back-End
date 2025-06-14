<?php
class Programmer extends Human {
    private $languages;
    private $experience;

    public function __construct($height, $weight, $age, $languages = [], $experience = 0) {
        parent::__construct($height, $weight, $age);
        $this->languages = $languages;
        $this->experience = $experience;
    }

    public function getLanguages() {
        return $this->languages;
    }

    public function setLanguages($languages) {
        $this->languages = $languages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function addLanguage($language) {
        $this->languages[] = $language;
    }
    
    protected function messageAtBirth() {
        echo "Програміст народив дитину! Вітаємо нового батька програміста! <br>";
    }

    public function cleanRoom() {
        echo "Програміст прибирає кімнату. <br>";
    }

    public function cleanKitchen() {
        echo "Програміст прибирає кухню. <br>";
    }
}
?>
