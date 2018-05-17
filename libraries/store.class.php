<?php
/**
 *
 * @author Arminas Šablinskas IFF-6/3
 */

class store {

    private $stores = '';
    private $city = '';

    public function __construct() {
        $this->stores = config::DB_PREFIX . 'parduotuve';
        $this->city = config::DB_PREFIX . 'miestai';
    }

    /**
     * Gėrimo išrinkimas
     * @param type $id
     * @return type
     */
    public function getStore($id) {
        $query = "  SELECT *
					FROM {$this->stores}
					WHERE `kodas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Gėrimų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getStoreList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT {$this->stores}.`Pavadinimas`,
									`Adresas`,
									`internetine_svetaine`,
									`telefonas`,
									`el_pastas`,
							        `fk_Miestasid_Miestas`,
							        `kodas`,
							        {$this->city}.`Pavadinimas` miestopavadinimas
					FROM {$this->stores}
					LEFT JOIN {$this->city} ON {$this->stores}.`fk_Miestasid_Miestas`={$this->city}.`id`
					";
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Gėrimų kiekio radimas
     * @return type
     */
    public function getStoreListCount() {
        $query = "  SELECT COUNT(`kodas`) as `kiekis`
					FROM {$this->stores}";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Gėrimo įrašymas
     * @param type $data
     */
    public function insertStore($data) {
        $query = "  INSERT INTO {$this->stores}
								(
									`Pavadinimas`,
									`Adresas`,
									`internetine_svetaine`,
									`telefonas`,
									`el_pastas`,
									`fk_Miestasid_Miestas`,
								)
								VALUES
								(
									'{$data['Pavadinimas']}',
									'{$data['adresas']}',
									'{$data['internetine_svetaine']}',
									'{$data['telefonas']}',
									'{$data['el_pastas']}',
									'{$data['fk_Miestasid_Miestas']}',
								)";
        mysql::query($query);
    }

    /**
     * Gėrimų atnaujinimas
     * @param type $data
     */
    public function updateStore($data) {
        $query = "  UPDATE {$this->stores}
					SET    `Pavadinimas`='{$data['Pavadinimas']}',
					        `Adresas`='{$data['adresas']}',
					        `internetine_svetaine`='{$data['internetine_svetaine']}',
					        `telefonas`='{$data['telefonas']}',
					        `el_pastas`='{$data['el_pastas']}',
					        `fk_Miestasid_Miestas`='{$data['fk_Miestasid_Miestas']}',
					WHERE `kodas`='{$data['id']}'";
        mysql::query($query);
    }

    /**
     * Gėrimo šalinimas
     * @param type $id
     */
    public function deleteStore($id) {
        $query = "  DELETE FROM {$this->stores}
					WHERE `kodas`='{$id}'";
        mysql::query($query);
    }
}