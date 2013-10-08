<?php

class Ip_Banner_Model_Resource_Slide extends Mage_Core_Model_Resource_Db_Abstract
{

    protected function _construct()
    {
        $this->_init('banner/slide', 'slide_id');
    }

    public function loadByAttribute($attr, $value)
    {
        $table = $this->getMainTable();
        $read = $this->_getReadAdapter();
        $where = $read->quoteInto("$attr = ?", $value);
        $sql = $read->select()
            ->from($table, array('slide_id'))
            ->where($where);
        return $read->fetchOne($sql);
    }

}