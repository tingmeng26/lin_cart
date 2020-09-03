<?php

class coderSQLStr {
    public $SQL = '';
    public $nullDate = '1900-01-01';
    public function __construct() {
        $this->SQL = '';
    }
    public function andSQL($sql) {
        if ($sql != "") {
            $this->SQL.= ($this->SQL == "") ? '' . $sql : ' AND ' . $sql;
        }
    }
    public function orSQL($sql) {
        if ($sql != "") {
            $this->SQL.= ($this->SQL == "") ? '' . $sql : ' OR ' . $sql;
        }
    }
    public function Add($sql) {
        if ($sql != "") {
            $this->SQL.= $sql;
        }
    }
    public static function in($column, $ary) {
        if (count($ary) > 0) {
            $c = count($ary);
            $str = implode("','", $ary);

            return $column . ' in (' . $str . ')';
        }

        return '';
    }
    public static function equal($column, $value, $equal = '=') {

        return $column . ' ' . $equal . ' \'' . $value . '\'';
    }
    public static function getNumRangeSQL($column, $start, $end) {
        $str = "";
        $start = (int)$start;
        $end = (int)$end;
        if ($start > 0 && $end > 0) {
            $str = $column . ' BETWEEN ' . $start . ' AND ' . $end;
        } else if ($start > 0) {
            $str = $column . ' >= ' . $start;
        } else if ($end > 0) {
            $str = $column . ' <= ' . $end;
        }
		
        return $str;
    }
    public static function getStrRangeSQL($column, $start, $end) {
        $str = "";
        if ($start != "" && $end != "") {
            $str = $column . ' BETWEEN \'' . $start . '\' AND \'' . $end . '\'';
        } else if ($start != "") {
            $str = $column . ' > \'' . $start . '\'';
        } else if ($end != "") {
            $str = $column . ' < \'' . $end . '\'';
        }

        return $str;
    }
    public static function getDateRangeSQL($column, $start, $end,$havetime=false) {
        $str = "";
        if($havetime){
            $start = isDateTime($start) ? $start : '';
            $end = isDateTime($end) ? $end : '';

            if ($start != "") {
                $sdate = date("Y-m-d H:i", strtotime($start));
                $str.= " $column>='$sdate' ";
            }
            if ($end != "") {
                $edate = date("Y-m-d H:i", strtotime($end));
                $str.= ($str == '' ? '' : ' AND ') . " $column<'$edate' ";
            }
        }else{
            $start = isDate($start) ? $start : '';
            $end = isDate($end) ? $end : '';

            if ($start != "") {
                $sdate = date("Y-m-d", strtotime($start));
                $str.= " $column>='$sdate' ";
            }
            if ($end != "") {
                $edate = date("Y-m-d", strtotime($end . " +1 days"));
                $str.= ($str == '' ? '' : ' AND ') . " $column<'$edate' ";
            }
        }

        return $str == '' ? '' : '(' . $str . ')';
    }
    public static function getOnOffSQL($sdate, $edate) {
        global $null_date;
        return "({$sdate} <> '0000-00-00' OR {$edate} <> '0000-00-00') AND ({$sdate}<curdate() AND ({$edate}>curdate() or {$edate}='0000-00-00'  ))";
    }
}
?>