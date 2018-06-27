<?php
/**
 * Created by PhpStorm.
 * User: Arn
 * Date: 2018-05-19
 * Time: 13:08
 */

class movies
{
    private $genres_table = '';
    private $movies_table = '';
    private $studios_table = '';
    private $awards_table = '';
    private $nominations_table = '';

    public function __construct()
    {
        $this->genres_table = 'movie_genres';
        $this->movies_table = 'movie';
        $this->studios_table = 'studio';
        $this->awards_table = 'award';
        $this->nominations_table = 'nomination';
    }

    public function getMovie($id) {
        $query = "  SELECT `{$this->movies_table}`.`Name`,
						   `{$this->movies_table}`.`Year`,
						   `{$this->movies_table}`.`Is_Released`,
						   `{$this->movies_table}`.`Runtime`,
						   `{$this->movies_table}`.`Box_Office`,
						   `{$this->movies_table}`.`Genre`,
						   `{$this->movies_table}`.`id_Movie`,
						   `{$this->movies_table}`.`fk_StudioID` AS `studio`
					FROM `{$this->movies_table}`
					WHERE `{$this->movies_table}`.`id_Movie`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getMovieList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT `{$this->movies_table}`.`Name`,
						   `{$this->movies_table}`.`Year`,
						   `{$this->movies_table}`.`Is_Released`,
						   `{$this->movies_table}`.`Runtime`,
						   `{$this->movies_table}`.`Box_Office`,
						   `{$this->genres_table}`.`name` AS `Genre`,
						   `{$this->movies_table}`.`id_Movie`,
						   `{$this->studios_table}`.`Name` AS `studio`
					FROM `{$this->movies_table}`
						LEFT JOIN `{$this->studios_table}`
							ON `{$this->movies_table}`.`fk_StudioID`=`{$this->studios_table}`.`id_Studio`
						LEFT JOIN `{$this->genres_table}`
							ON `{$this->movies_table}`.`Genre`=`{$this->genres_table}`.`id_Movie_genres`" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }


    public function updateMovie($data) {
        $query = "  UPDATE `{$this->movies_table}`
					SET    `Name`='{$data['Name']}',
						   `Year`='{$data['Year']}',
						   `Is_Released`='{$data['Is_Released']}',
						   `Runtime`='{$data['Runtime']}',
						   `Box_Office`='{$data['Box_Office']}',
						   `Genre`='{$data['Genre']}',
						   `fk_StudioID`='{$data['studio']}'
					WHERE `id_Movie`='{$data['id_Movie']}'";
        mysql::query($query);
    }

    /**
     * Automobilio įrašymas
     * @param type $data
     */
    public function insertMovie($data) {
        $query = "  INSERT INTO `{$this->movies_table}` 
								(
									`Name`,
									`Year`,
									`Is_Released`,
									`Runtime`,
									`Box_Office`,
									`Genre`,
									`fk_StudioID`
								) 
								VALUES
								(
									'{$data['Name']}',
									'{$data['Year']}',
									'{$data['Is_Released']}',
									'{$data['Runtime']}',
									'{$data['Box_Office']}',
									'{$data['Genre']}',
									'{$data['studio']}'
								)";
        mysql::query($query);
    }

    public function deleteMovie($id) {
        $query = "  DELETE FROM `{$this->movies_table}`
					WHERE `id_Movie`='{$id}'";
        mysql::query($query);
    }


    public function getMovieListCount() {
        $query = "  SELECT COUNT(`{$this->movies_table}`.`id_Movie`) AS `kiekis`
					FROM `{$this->movies_table}`
						LEFT JOIN `{$this->studios_table}`
							ON `{$this->movies_table}`.`fk_StudioID`=`{$this->studios_table}`.`id_Studio`
						LEFT JOIN `{$this->genres_table}`
							ON `{$this->movies_table}`.`Genre`=`{$this->genres_table}`.`id_Movie_genres`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function getGenresList() {
        $query = "  SELECT *
					FROM `{$this->genres_table}`";
        $data = mysql::select($query);

        return $data;
    }

    public function getStudiosList() {
        $query = "  SELECT *
					FROM `{$this->studios_table}`";
        $data = mysql::select($query);

        return $data;
    }

    public function getMoviesAwardsReport($dateFrom, $dateTo){
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->movies_table}`.`Year`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->movies_table}`.`Year`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->movies_table}`.`Year`<='{$dateTo}'";
            }
        }

        $query = "SELECT `{$this->movies_table}`.`Name` as `filmoPav`,
                         `{$this->nominations_table}`.`Name`,
                         `{$this->awards_table}`.`Name` as `awardName`,
                         if(`{$this->nominations_table}`.`Is_Winner` = 1, 'Nugalejo', 'Nenugalejo') as `nugalejo`,
                         `t`.`Pergaliu_Sk`
                         FROM `{$this->movies_table}`
                            INNER JOIN `{$this->nominations_table}`
                                ON `{$this->movies_table}`.`id_Movie` = `{$this->nominations_table}`.`fk_Movieid_Movie`
                            LEFT JOIN `{$this->awards_table}`
                                ON `{$this->nominations_table}`.`fk_Awardid_Award` = `{$this->awards_table}`.`id_Award`
                            LEFT JOIN (
                                SELECT `{$this->movies_table}`.`id_Movie`,
                         sum(if(`{$this->nominations_table}`.`Is_Winner` = 1,1,0) ) as `Pergaliu_sk`
                         FROM `{$this->movies_table}`
                            INNER JOIN `{$this->nominations_table}`
                                ON `{$this->movies_table}`.`id_Movie` = `{$this->nominations_table}`.`fk_Movieid_Movie`
                            LEFT JOIN `{$this->awards_table}`
                                ON `{$this->nominations_table}`.`fk_Awardid_Award` = `{$this->awards_table}`.`id_Award`
                                {$whereClauseString}
                         GROUP BY `{$this->movies_table}`.`id_Movie`
                            ) `t` ON `t`.`id_Movie` = `{$this->nominations_table}`.`fk_Movieid_Movie`
                                {$whereClauseString}";
        $data = mysql::select($query);
        return $data;
    }

    public function getCountOfWins($dateFrom, $dateTo){
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->movies_table}`.`Year`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->movies_table}`.`Year`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->movies_table}`.`Year`<='{$dateTo}'";
            }
        }
        $query = "SELECT sum(if(`{$this->nominations_table}`.`Is_Winner` = 1,1,0) ) as `Pergaliu_sk`
                         FROM `{$this->nominations_table}`
                            LEFT JOIN `{$this->movies_table}`
                                ON `{$this->nominations_table}`.`fk_Movieid_Movie` = `{$this->movies_table}`.`id_Movie`
                         {$whereClauseString}";
        $data = mysql::select($query);
        return $data;

    }
}