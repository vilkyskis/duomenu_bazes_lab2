<?php
/**
 *
 * @author Arminas Šablinskas IFF-6/3
 */

class city {

    private $cities = '';

    public function __construct() {
        $this->cities = config::DB_PREFIX . 'miestai';
    }

    /**
     * Gėrimo išrinkimas
     * @param type $id
     * @return type
     */
    public function getCity($id) {
        $query = "  SELECT *
					FROM {$this->cities}
					WHERE `id_Miestas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Gėrimų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getCityList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM {$this->cities}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Gėrimų kiekio radimas
     * @return type
     */
    public function getCityListCount() {
        $query = "  SELECT COUNT(`id_Miestas`) as `kiekis`
					FROM {$this->cities}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Gėrimo įrašymas
     * @param type $data
     */
    public function insertCity($data) {
        $query = "  INSERT INTO {$this->cities}
								(
									`Pavadinimas`
								)
								VALUES
								(
									'{$data['Pavadinimas']}'
								)";
        mysql::query($query);
    }

    /**
     * Gėrimų atnaujinimas
     * @param type $data
     */
    public function updateCity($data) {
        $query = "  UPDATE {$this->cities}
					SET    `Pavadinimas`='{$data['Pavadinimas']}',
					WHERE `id_Miestas`='{$data['id']}'";
        mysql::query($query);
    }

    /**
     * Gėrimo šalinimas
     * @param type $id
     */
    public function deleteCity($id) {
        $query = "  DELETE FROM {$this->cities}
					WHERE `id_Miestas`='{$id}'";
        mysql::query($query);
    }
}