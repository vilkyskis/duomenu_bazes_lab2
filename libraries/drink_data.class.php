<?php
/**
 * Maistingumo klasė
 *
 * @author Arminas Šablinskas IFF-6/3
 */

class drinkData {

    private $data_table = '';

    public function __construct() {
        $this->data_table = config::DB_PREFIX . 'maistingumas';
    }

    /**
     * Darbuotojo išrinkimas
     * @param type $id
     * @return type
     */
    public function getData($id) {
        $query = "  SELECT *
					FROM {$this->data_table}
					WHERE `id_Maistingumas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Gėrimų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getDataList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM {$this->data_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Gėrimų kiekio radimas
     * @return type
     */
    public function getDataListCount() {
        $query = "  SELECT COUNT(`Asmens_kodas`) as `kiekis`
					FROM {$this->data_table}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Gėrimo įrašymas
     * @param type $data
     */
    public function insertData($data) {
        $query = "  INSERT INTO {$this->data_table}
								(
									`energine_verte`, 
									`Riebalai`, 
									`Angliavandeniai`, 
									`Baltymai`, 
									`Druska`, 
									`id_Maistingumas`, 
								)
								VALUES
								(
									'{$data['energine_verte']}',
									'{$data['riebalai']}',
									'{$data['angliavandeniai']}',
									'{$data['baltymai']}',
									'{$data['druska']}',
									'{$data['id_maistingumas']}',

								)";
        mysql::query($query);
    }

    /**
     * Gėrimų atnaujinimas
     * @param type $data
     */
    public function updateData($data) {
        $query = "  UPDATE {$this->data_table}
					SET
									`energine_verte` = '{$data['energine_verte']}',
									`Riebalai` = '{$data['riebalai']}',
									`Angliavandeniai`= '{$data['angliavandeniai']}',
									`Baltymai` = '{$data['baltymai']}',
									`Druska` = '{$data['druska']}',
					WHERE `id_Maistingumas`='{$data['id_maistingumas']}'";
        mysql::query($query);
    }

    /**
     * Gėrimo šalinimas
     * @param type $id
     */
    public function deleteData($id) {
        $query = "  DELETE FROM {$this->data_table}
					WHERE `id_Maistingumas`='{$id}'";
        mysql::query($query);
    }
}