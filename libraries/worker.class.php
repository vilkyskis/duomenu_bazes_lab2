<?php
/**
 * Darbininkų klasė
 *
 * @author Arminas Šablinskas IFF-6/3
 */

class workers {

    private $workers_table = '';

    public function __construct() {
        $this->workers_table = config::DB_PREFIX . 'darbuotojas';
    }

    /**
     * Darbuotojo išrinkimas
     * @param type $id
     * @return type
     */
    public function getWorker($id) {
        $query = "  SELECT *
					FROM {$this->workers_table}
					WHERE `Asmens_kodas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Gėrimų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getWorkerList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM {$this->workers_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Gėrimų kiekio radimas
     * @return type
     */
    public function getWorkerListCount() {
        $query = "  SELECT COUNT(`Asmens_kodas`) as `kiekis`
					FROM {$this->workers_table}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Gėrimo įrašymas
     * @param type $data
     */
    public function insertWorker($data) {
        $query = "  INSERT INTO {$this->workers_table}
								(
									`Asmens_kodas`, 
									`Vardas`, 
									`Pavarde`, 
									`Gimimo_data`, 
									`Pareigos`, 
									`fk_Parduotuvekodas`, 
									`fk_Fabrikasid_Fabrikas`, 
								)
								VALUES
								(
									'{$data['Asmens_kodas']}',
									'{$data['Vardas']}',
									'{$data['Pavarde']}',
									'{$data['Gimimo_data']}',
									'{$data['Pareigos']}',
									'{$data['fk_Parduotuvekodas']}',
									'{$data['fk_Fabrikasid_Fabrikas']}',
								)";
        mysql::query($query);
    }

    /**
     * Gėrimų atnaujinimas
     * @param type $data
     */
    public function updateWorker($data) {
        $query = "  UPDATE {$this->workers_table}
					SET
									`Vardas` = '{$data['Vardas']}',
									`Pavarde` = '{$data['Pavarde']}',
									`Gimimo_data`= '{$data['Gimimo_data']}',
									`Pareigos` = '{$data['Pareigos']}',
									`fk_Parduotuvekodas` = '{$data['fk_Parduotuvekodas']}',
									`fk_Fabrikasid_Fabrikas` = '{$data['fk_Fabrikasid_Fabrikas']}',
					WHERE `Asmens_kodas`='{$data['id']}'";
        mysql::query($query);
    }

    /**
     * Gėrimo šalinimas
     * @param type $id
     */
    public function deleteWorker($id) {
        $query = "  DELETE FROM {$this->workers_table}
					WHERE `Asmens_kodas`='{$id}'";
        mysql::query($query);
    }
}