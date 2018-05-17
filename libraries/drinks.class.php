<?php
/**
 * Gaiviųjų gėrimų redagavimo klasė
 *
 * @author Arminas Šablinskas IFF-6/3
 */

class drinks {

    private $gerimai_lentele = '';
    private $maistingumas_lentele = '';
    private $pakuote_lentele = '';


    public function __construct() {
        $this->gerimai_lentele = config::DB_PREFIX . 'gaivusis_gerimas';
        $this->maistingumas_lentele = config::DB_PREFIX . 'maistingumas';
        $this->pakuote_lentele = config::DB_PREFIX . 'pakuote';
    }

    /**
     * Gėrimo išrinkimas
     * @param type $id
     * @return type
     */
    public function getDrink($id) {
        $query = "  SELECT *
					FROM {$this->gerimai_lentele}
					WHERE `id_Gaivusis_gerimas`='{$id}'
					";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Gėrimų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getDrinkList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT *
					FROM {$this->gerimai_lentele}
							LEFT JOIN `{$this->pakuote_lentele}`
							ON `{$this->gerimai_lentele}`.`Pakuote`=`{$this->pakuote_lentele}`.`id_Pakuote`
					ORDER BY `id_Gaivusis_gerimas`
							" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Gėrimų tipo sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getDrinkTypeList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT *
					FROM {$this->pakuote_lentele}
					" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Gėrimų tipo kiekio radimas
     * @return type
     */
    public function getDrinkTypeListCount() {
        $query = "  SELECT COUNT(`id_Pakuote`) as `kiekis`
					FROM {$this->pakuote_lentele}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Gėrimų kiekio radimas
     * @return type
     */
    public function getDrinkListCount() {
        $query = "  SELECT COUNT(`id_Gaivusis_gerimas`) as `kiekis`
					FROM {$this->gerimai_lentele}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Gėrimo įrašymas
     * @param type $data
     */
    public function insertDrink($data) {
        $query = "  INSERT INTO {$this->gerimai_lentele}
								(`Pavadinimas`, 
									`Kiekis`, 
									`Vieneto_kaina`, 
									`Galiojimo_data`, 
									`Pagaminimo_data`, 
									`Pakuote`
								)
								VALUES
								(
									'{$data['Pavadinimas']}',
									'{$data['Kiekis']}',
									'{$data['Vieneto_kaina']}',
									'{$data['Galiojimo_data']}',
									'{$data['Pagaminimo_data']}',
    								'{$data['Pakuote']}'
								)";
        mysql::query($query);
    }

    /**
     * Gėrimų atnaujinimas
     * @param type $data
     */
    public function updateDrink($data, $id) {
        $query = "  UPDATE `{$this->gerimai_lentele}`
					SET    `Pavadinimas`='{$data['Pavadinimas']}',
									`Kiekis`='{$data['Kiekis']}',
									`Vieneto_kaina`='{$data['Vieneto_kaina']}',
									`Galiojimo_data`='{$data['Galiojimo_data']}',
									`Pagaminimo_data`='{$data['Pagaminimo_data']}',
									`Pakuote`='{$data['Pakuote']}'
					WHERE `id_Gaivusis_gerimas`='{$id}'
					";
        mysql::query($query);
    }

    /**
     * Gėrimo šalinimas
     * @param type $id
     */
    public function deleteDrink($id) {
        $query = "  DELETE FROM {$this->gerimai_lentele}
					WHERE `id_Gaivusis_gerimas`='{$id}'";
        mysql::query($query);
    }
}