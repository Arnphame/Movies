<?php
/**
 * Created by PhpStorm.
 * User: Arn
 * Date: 2018-05-19
 * Time: 13:08
 */

class people
{
    private $nationality_table = '';
    private $person_table = '';
    private $profession_table = '';
    private $has_person = '';

    public function __construct()
    {
        $this->nationality_table = 'nationality';
        $this->person_table = 'person';
        $this->profession_table = 'profession';
        $this->has_person = 'has_person';
    }

    public function getPerson($personalNumber) {
        $query = "  SELECT `{$this->person_table}`.`Name`,
						   `{$this->person_table}`.`Surname`,
						   `{$this->person_table}`.`Personal_No`,
						   `{$this->person_table}`.`Salary`,
						   `{$this->person_table}`.`Sex`,
						   `{$this->person_table}`.`Age`,
						   `{$this->person_table}`.`Experience`,
						   `{$this->has_person}`.`fk_Professionid_Profession` AS `profesija`,
						   `{$this->person_table}`.`fk_NationalityISO` AS `nationality`
					FROM `{$this->person_table}`, `{$this->has_person}`
					WHERE `{$this->person_table}`.`Personal_No`='{$personalNumber}'";
        $data = mysql::select($query);

        return $data[0];
    }
    public function getProfession($personalNumber) {
        $query = "  SELECT `{$this->has_person}`.`fk_Professionid_Profession` AS `profesija`
					FROM `{$this->has_person}`
					WHERE `{$this->has_person}`.`fk_PersonPersonal_No`='{$personalNumber}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getPeopleList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT `{$this->person_table}`.`Name`,
						   `{$this->person_table}`.`Surname`,
						   `{$this->person_table}`.`Personal_No`,
						   `{$this->person_table}`.`Salary`,
						   `{$this->person_table}`.`Sex`,
						   `{$this->person_table}`.`Age`,
						   `{$this->person_table}`.`Experience`,
						   `{$this->profession_table}`.`Title` AS `Profesija`,
						   `{$this->nationality_table}`.`Name` AS `nationality`
					FROM `{$this->person_table}`
					    LEFT JOIN `{$this->has_person}`
					        ON `{$this->person_table}`.`Personal_No`=`{$this->has_person}`.`fk_PersonPersonal_No`
					    LEFT JOIN `{$this->profession_table}`
					        ON `{$this->profession_table}`.`id_Profession`=`{$this->has_person}`.`fk_Professionid_Profession`
						LEFT JOIN `{$this->nationality_table}`
							ON `{$this->person_table}`.`fk_NationalityISO`=`{$this->nationality_table}`.`ISO`" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }


    public function updatePerson($data) {
        $query = "  UPDATE `{$this->person_table}`
					SET    `Name`='{$data['Name']}',
						   `Surname`='{$data['Surname']}',
						   `Personal_No`='{$data['Personal_No']}',
						   `Salary`='{$data['Salary']}',
						   `Sex`='{$data['Sex']}',
						   `Age`='{$data['Age']}',
						   `Experience`='{$data['Experience']}',
						   `fk_NationalityISO`='{$data['nationality']}'
					WHERE `Personal_No`='{$data['Personal_No']}'";
        mysql::query($query);
    }

    /**
     * Automobilio įrašymas
     * @param type $data
     */
    public function insertPerson($data) {
        $query = "  INSERT INTO `{$this->person_table}` 
								(
									`Name`,
									`Surname`,
									`Personal_No`,
									`Salary`,
									`Sex`,
									`Age`,
									`Experience`,
									`fk_NationalityISO`
								) 
								VALUES
								(
									'{$data['Name']}',
									'{$data['Surname']}',
									'{$data['Personal_No']}',
									'{$data['Salary']}',
									'{$data['Sex']}',
									'{$data['Age']}',
									'{$data['Experience']}',
									'{$data['nationality']}'
								)";
        mysql::query($query);
    }

    public function updateProfession($data) {
        $query = "  UPDATE `{$this->has_person}`
					SET    `fk_Professionid_Profession`='{$data['fk_Professionid_Profession']}',
						   `fk_PersonPersonal_No`='{$data['fk_PersonPersonal_No']}'
					WHERE `fk_Professionid_Profession`='{$data['fk_Professionid_Profession']}'";
        mysql::query($query);
    }

    public function updateProfessions($data) {
        $this->deleteProfession($data['Personal_No']);

        if(isset($data['profesijos']) && sizeof($data['profesijos']) > 0) {
            foreach($data['profesijos'] as $key=>$val) {
                $profesija = $val;
                $query = "  INSERT INTO `{$this->has_person}`
										(
											`fk_Professionid_Profession`,
											`fk_PersonPersonal_No`
										)
										VALUES
										(
											'{$profesija}',
											'{$data['Personal_No']}'
										)";
                mysql::query($query);
            }
        }
    }



    public function deletePerson($personalNo) {
        $query = "  DELETE FROM `{$this->person_table}`
					WHERE `Personal_No`='{$personalNo}'";
        mysql::query($query);
    }

    public function deleteProfession($id) {
        $query = "  DELETE FROM `{$this->has_person}`
					WHERE `fk_PersonPersonal_No`='{$id}'";
        mysql::query($query);
    }


    public function getPeopleCount() {
        $query = "  SELECT COUNT(`{$this->person_table}`.`Personal_No`) AS `kiekis`
					FROM `{$this->person_table}`
						LEFT JOIN `{$this->has_person}`
					        ON `{$this->person_table}`.`Personal_No`=`{$this->has_person}`.`fk_PersonPersonal_No`
					    LEFT JOIN `{$this->profession_table}`
					        ON `{$this->profession_table}`.`id_Profession`=`{$this->has_person}`.`fk_Professionid_Profession`
						LEFT JOIN `{$this->nationality_table}`
							ON `{$this->person_table}`.`fk_NationalityISO`=`{$this->nationality_table}`.`ISO`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function getNationalityList() {
        $query = "  SELECT *
					FROM `{$this->nationality_table}`";
        $data = mysql::select($query);

        return $data;
    }

    public function getProfessionList() {
        $query = "  SELECT *
					FROM `{$this->profession_table}`";
        $data = mysql::select($query);

        return $data;
    }
}