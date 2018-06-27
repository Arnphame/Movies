<?php
/**
 * Created by PhpStorm.
 * User: Arn
 * Date: 2018-05-19
 * Time: 13:08
 */

class awards
{
    private $awards_table = '';
    private $movies_table = '';
    private $awards_types_table = '';

    public function __construct()
    {
        $this->awards_table = 'award';
        $this->movies_table = 'movie';
        $this->awards_types_table = 'award_types';
    }

    public function getAward($id) {
        $query = "  SELECT `{$this->awards_table}`.`Name`,
						   `{$this->awards_table}`.`Year`,
						   `{$this->awards_table}`.`Country`,
						   `{$this->awards_table}`.`Type`,
						   `{$this->awards_table}`.`fk_Movieid_Movie` AS `movie`,
						   `{$this->awards_table}`.`id_Award`
					FROM `{$this->awards_table}`
					WHERE `{$this->awards_table}`.`id_Award`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getAwardsList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT `{$this->awards_table}`.`Name`,
						   `{$this->awards_table}`.`Year`,
						   `{$this->awards_table}`.`Country`,
						   `{$this->awards_types_table}`.`name` AS `Type`,
						   `{$this->movies_table}`.`Name` as `movie`,
						   `{$this->awards_table}`.`id_Award`
					FROM `{$this->awards_table}`
						LEFT JOIN `{$this->awards_types_table}`
							ON `{$this->awards_table}`.`Type`=`{$this->awards_types_table}`.`id_Award_types`
						LEFT JOIN `{$this->movies_table}`
							ON `{$this->awards_table}`.`fk_Movieid_Movie`=`{$this->movies_table}`.`id_Movie`" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }


    public function updateAward($data) {
        $query = "  UPDATE `{$this->awards_table}`
					SET    `Name`='{$data['Name']}',
						   `Year`='{$data['Year']}',
						   `Country`='{$data['Country']}',
						   `Type`='{$data['Type']}',
						   `fk_Movieid_Movie`='{$data['movie']}'
					WHERE `id_Award`='{$data['id_Award']}'";
        mysql::query($query);
    }

    /**
     * Automobilio įrašymas
     * @param type $data
     */
    public function insertAward($data) {
        $query = "  INSERT INTO `{$this->awards_table}` 
								(
									`Name`,
									`Year`,
									`Country`,
									`Type`,
									`fk_Movieid_Movie`
								) 
								VALUES
								(
									'{$data['Name']}',
									'{$data['Year']}',
									'{$data['Country']}',
									'{$data['Type']}',
									'{$data['movie']}'
								)";
        mysql::query($query);
    }

    public function deleteAward($id) {
        $query = "  DELETE FROM `{$this->awards_table}`
					WHERE `id_Award`='{$id}'";
        mysql::query($query);
    }


    public function getAwardListCount() {
        $query = "  SELECT COUNT(`{$this->awards_table}`.`id_Award`) AS `kiekis`
					FROM `{$this->awards_table}`
						LEFT JOIN `{$this->awards_types_table}`
							ON `{$this->awards_table}`.`Type`=`{$this->awards_types_table}`.`id_Award_types`
						LEFT JOIN `{$this->movies_table}`
							ON `{$this->awards_table}`.`fk_Movieid_Movie`=`{$this->movies_table}`.`id_Movie`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function getAwardTypesList() {
        $query = "  SELECT *
					FROM `{$this->awards_types_table}`";
        $data = mysql::select($query);

        return $data;
    }

    public function getMoviesList() {
        $query = "  SELECT *
					FROM `{$this->movies_table}`";
        $data = mysql::select($query);

        return $data;
    }
}