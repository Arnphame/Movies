<?php
/**
 * Created by PhpStorm.
 * User: Arn
 * Date: 2018-05-19
 * Time: 13:08
 */

class studios
{
    private $studios_table = '';
    private $movies_table = '';

    public function __construct()
    {
        $this->studios_table = 'studio';
        $this->movies_table = 'movie';
    }

    public function getStudio($id) {
        $query = "  SELECT *
					FROM {$this->studios_table}
					WHERE `id_Studio`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getStudioList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT *
					FROM {$this->studios_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }


    public function updateStudio($data) {
        $query = "  UPDATE `{$this->studios_table}`
					SET    `Name`='{$data['Name']}',
						   `Country`='{$data['Country']}',
						   `Founder`='{$data['Founder']}',
						   `Year`='{$data['Year']}',
						   `Revenue`='{$data['Revenue']}'
					WHERE `id_Studio`='{$data['id_Studio']}'";
        mysql::query($query);
    }

    /**
     * Automobilio įrašymas
     * @param type $data
     */
    public function insertStudio($data) {
        $query = "  INSERT INTO `{$this->studios_table}` 
								(
									`Name`,
									`Country`,
									`Founder`,
									`Year`,
									`Revenue`
								) 
								VALUES
								(
									'{$data['Name']}',
									'{$data['Country']}',
									'{$data['Founder']}',
									'{$data['Year']}',
									'{$data['Revenue']}'
								)";
        mysql::query($query);
    }

    public function deleteStudio($id) {
        $query = "  DELETE FROM `{$this->studios_table}`
					WHERE `id_Studio`='{$id}'";
        mysql::query($query);
    }


    public function getStudioListCount() {
        $query = "  SELECT COUNT(`id_Studio`) as `kiekis`
					FROM {$this->studios_table}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }
    public function getStudiosReport($dateFrom, $dateTo) {
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->studios_table}`.`Year`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->studios_table}`.`Year`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->studios_table}`.`Year`<='{$dateTo}'";
            }
        }

        $query = "SELECT `id_Studio`,
                          `{$this->studios_table}`.`Name`,
                           count(`{$this->movies_table}`.`fk_StudioID`) AS `Studijos`,
                           sum(`{$this->movies_table}`.`Runtime`) AS `bendras_runtime`
                           FROM `{$this->studios_table}`
                           INNER JOIN `{$this->movies_table}`
                                ON `{$this->studios_table}`.`id_Studio`=`{$this->movies_table}`.`fk_StudioID`
                           {$whereClauseString}
                           GROUP BY `{$this->studios_table}`.`id_Studio` ORDER BY `bendras_runtime` DESC";
        $data = mysql::select($query);
        return $data;
    }

    public function getStatsOfStudiosReport($dateFrom, $dateTo) {
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->studios_table}`.`Year`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->studios_table}`.`Year`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->studios_table}`.`Year`<='{$dateTo}'";
            }
        }

        $query = "SELECT   count(`{$this->movies_table}`.`fk_StudioID`) AS `Studijos`,
                           sum(`{$this->movies_table}`.`Runtime`) AS `bendras_runtime`
                           FROM `{$this->studios_table}`
                           INNER JOIN `{$this->movies_table}`
                                ON `{$this->studios_table}`.`id_Studio`=`{$this->movies_table}`.`fk_StudioID`
                           {$whereClauseString}";
         $data = mysql::select($query);
        return $data;
    }
}