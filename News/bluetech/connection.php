<?php
session_start();
$d = (array_reverse(explode('/', $_SERVER['SCRIPT_FILENAME'])));
unset($d[0]);
$websitepath = implode("/", array_reverse($d));
//echo $websitepath;
//debug($d);
//include($websitepath . "/resizeimage.php");
ini_set('display_errors', 0);
//unset($_SESSION['cartitems']);
//mysql_connect("localhost", "aasthask_u", "aastha?-p");
mysql_connect("localhost", "root", "");
mysql_select_db("news_portal");
$adminpath = "files/";
$catalog = "catalog/";

function debug($str) {
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

function imgresize($imgpath, $w, $h) {
    global $catalog;
   
    $filename = array_reverse(explode("/", $imgpath));    
    if (file_exists($catalog . $filename[0])) {
        mkdir($catalog . $w . "x" . $h);
        if (!file_exists($catalog . $w . "x" . $h . '/' . $filename[0])) {
            $imager = new SimpleImage();
            $imager->load($imgpath);
            $imager->resize($w, $h);
            $imager->save($catalog . $w . "x" . $h . '/' . $filename[0]);
        }
    }
    return $catalog . $w . "x" . $h . '/' . $filename[0];
}

function getoptn($cname, $text, $value, $dbt, $class, $mult = "", $selectedvalue = "", $all = "") {
    $sql = "SELECT " . $text . "," . $value . " FROM " . $dbt . " order by " . $text;
    $q = mysql_query($sql) or die(mysql_error());
    $data = "<select name=\"$cname\" class=\"$class\" $mult>";
    if ($all == 'All') {
        $data.='<option value="%%">' . $all . '</option>';
    } elseif ($all == 'None') {
        $data.='<option value="">' . $all . '</option>';
    } else {
        $data.="";
    }
    while ($row = mysql_fetch_array($q)) {
        if ($selectedvalue == $row[$value]) {
            $data.= '<option  value="' . $row[$value] . '" selected="selected">' . $row[$text] . '</option>';
        } else {
            $data.='<option  value="' . $row[$value] . '">' . $row[$text] . '</option>';
        }
    }
    $data.="</select>";
    return $data;
}


function getTextBetweenTags($string, $tagname) {
    $pattern = "/<$tagname>([\w\W]*?)<\/$tagname>/";
    preg_match($pattern, $string, $matches);
    return $matches[1];
}

function dmy2mysql($input) {
    $output = false;
    $d = preg_split('#[-/:. ]#', $input);
    if (is_array($d) && count($d) >= 3) {
        if (checkdate($d[1], $d[0], $d[2]) || ($d[0] == "00" && $d[1] == "00")) {
            $output = "$d[2]-$d[1]-$d[0]";
        }
        if ($d[3])
            $output.=' ' . $d[3] . ':' . $d[4];
    }
    return $output;
}

//pro

function mysql2dmy($input) {
    $output = false;
    $input1 = $input;
    $input = substr($input, 0, 10);
    $d = explode('-', $input);
    if (is_array($d) && count($d) >= 3) {
        if (checkdate($d[1], $d[2], $d[0]) || ($d[2] == "00" && $d[1] == "00")) {
            $output = "$d[2]/$d[1]/$d[0]";
        }
        if (substr($input1, 11))
            $output.=" " . substr($input1, 11);
    }
    return $output;
}

//products and categories tree view

function getuser($id) {
    $sql = "select * from users where id='" . $id . "'";
    $q = mysql_query($sql);
    $r = mysql_fetch_assoc($q);
    return $r;
}

function getpeople($id) {
    $sql = "select * from people where id='" . $id . "'";
    $q = mysql_query($sql);
    $r = mysql_fetch_assoc($q);
    return $r;
}

function getclient($id) {
    $sql = "select * from clients where id='" . $id . "'";
    $q = mysql_query($sql) or die(mysql_error());
    $r = mysql_fetch_assoc($q);
    return $r;
}

function runSQL($rsql) {

    $db['default']['hostname'] = "localhost";
    $db['default']['username'] = 'root';
    $db['default']['password'] = "digpal251988";
    $db['default']['database'] = "ijs";

    $db['live']['hostname'] = 'localhost';
    $db['live']['username'] = '';
    $db['live']['password'] = '';
    $db['live']['database'] = '';

    $active_group = 'default';

    $base_url = "http://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

    $connect = mysql_connect($db[$active_group]['hostname'], $db[$active_group]['username'], $db[$active_group]['password']) or die("Error: could not connect to database");
    $db = mysql_select_db($db[$active_group]['database']);

    $result = mysql_query($rsql) or die($rsql);
    return $result;
    mysql_close($connect);
}

function countRec($fname, $tname) {
    $sql = "SELECT count($fname) FROM $tname ";
    $result = runSQL($sql);
    while ($row = mysql_fetch_array($result)) {
        return $row[0];
    }
}

function constructWhere($s) {
    $qwery = "";
    //['eq','ne','lt','le','gt','ge','bw','bn','in','ni','ew','en','cn','nc']
    $qopers = array(
        'eq' => " = ",
        'ne' => " <> ",
        'lt' => " < ",
        'le' => " <= ",
        'gt' => " > ",
        'ge' => " >= ",
        'bw' => " LIKE ",
        'bn' => " NOT LIKE ",
        'in' => " IN ",
        'ni' => " NOT IN ",
        'ew' => " LIKE ",
        'en' => " NOT LIKE ",
        'cn' => " LIKE ",
        'nc' => " NOT LIKE ");
    if ($s) {
        $jsona = json_decode($s, true);
        if (is_array($jsona)) {
            $gopr = $jsona['groupOp'];
            $rules = $jsona['rules'];
            $i = 0;
            foreach ($rules as $key => $val) {
                $field = $val['field'];
                $op = $val['op'];
                $v = $val['data'];
                if ($v && $op) {
                    $i++;
                    // ToSql in this case is absolutley needed
                    $v = ToSql($field, $op, $v);
                    if ($i == 1)
                        $qwery = " AND ";
                    else
                        $qwery .= " " . $gopr . " ";
                    switch ($op) {
                        // in need other thing
                        case 'in' :
                        case 'ni' :
                            $qwery .= $field . $qopers[$op] . " (" . $v . ")";
                            break;
                        default:
                            $qwery .= $field . $qopers[$op] . $v;
                    }
                }
            }
        }
    }
    return $qwery;
}

function getStringForGroup($group) {
    $i_ = '';
    $sopt = array('eq' => "=", 'ne' => "<>", 'lt' => "<", 'le' => "<=", 'gt' => ">", 'ge' => ">=", 'bw' => " {$i_}LIKE ", 'bn' => " NOT {$i_}LIKE ", 'in' => ' IN ', 'ni' => ' NOT IN', 'ew' => " {$i_}LIKE ", 'en' => " NOT {$i_}LIKE ", 'cn' => " {$i_}LIKE ", 'nc' => " NOT {$i_}LIKE ", 'nu' => 'IS NULL', 'nn' => 'IS NOT NULL');
    $s = "(";
    if (isset($group['groups']) && is_array($group['groups']) && count($group['groups']) > 0) {
        for ($j = 0; $j < count($group['groups']); $j++) {
            if (strlen($s) > 1) {
                $s .= " " . $group['groupOp'] . " ";
            }
            try {
                $dat = getStringForGroup($group['groups'][$j]);
                $s .= $dat;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    if (isset($group['rules']) && count($group['rules']) > 0) {
        try {
            foreach ($group['rules'] as $key => $val) {
                if (strlen($s) > 1) {
                    $s .= " " . $group['groupOp'] . " ";
                }
                $field = $val['field'];
                $op = $val['op'];
                $v = $val['data'];
                if ($op) {
                    switch ($op) {
                        case 'bw':
                        case 'bn':
                            $s .= $field . ' ' . $sopt[$op] . "'$v%'";
                            break;
                        case 'ew':
                        case 'en':
                            $s .= $field . ' ' . $sopt[$op] . "'%$v'";
                            break;
                        case 'cn':
                        case 'nc':
                            $s .= $field . ' ' . $sopt[$op] . "'%$v%'";
                            break;
                        case 'in':
                        case 'ni':
                            $s .= $field . ' ' . $sopt[$op] . "( '$v' )";
                            break;
                        case 'nu':
                        case 'nn':
                            $s .= $field . ' ' . $sopt[$op] . " ";
                            break;
                        default :
                            $s .= $field . ' ' . $sopt[$op] . " '$v' ";
                            break;
                    }
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    $s .= ")";
    if ($s == "()") {
        //return array("",$prm); // ignore groups that don't have rules
        return " 1=1 ";
    } else {
        return $s;
        ;
    }
}

function ToSql($field, $oper, $val) {
    // we need here more advanced checking using the type of the field - i.e. integer, string, float
    switch ($field) {
        case 'id':
            return intval($val);
            break;
        case 'amount':
        case 'tax':
        case 'total':
            return floatval($val);
            break;
        default :
            //mysql_real_escape_string is better
            if ($oper == 'bw' || $oper == 'bn')
                return "'" . addslashes($val) . "%'";
            else if ($oper == 'ew' || $oper == 'en')
                return "'%" . addcslashes($val) . "'";
            else if ($oper == 'cn' || $oper == 'nc')
                return "'%" . addslashes($val) . "%'";
            else
                return "'" . addslashes($val) . "'";
    }
}

function Strip($value) {
    if (get_magic_quotes_gpc() != 0) {
        if (is_array($value))
            if (array_is_associative($value)) {
                foreach ($value as $k => $v)
                    $tmp_val[$k] = stripslashes($v);
                $value = $tmp_val;
            }
            else
                for ($j = 0; $j < sizeof($value); $j++)
                    $value[$j] = stripslashes($value[$j]);
        else
            $value = stripslashes($value);
    }
    return $value;
}

function array_is_associative($array) {
    if (is_array($array) && !empty($array)) {
        for ($iterator = count($array) - 1; $iterator; $iterator--) {
            if (!array_key_exists($iterator, $array)) {
                return true;
            }
        }
        return !array_key_exists(0, $array);
    }
    return false;
}

function numbertotext($number) {
    if (($number < 0) || ($number > 999999999)) {
        throw new Exception("Number is out of range");
    }

    $Gn = floor($number / 1000000);  /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000);     /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);      /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);       /* Tens (deca) */
    $n = $number % 10;               /* Ones */

    $res = "";

    if ($Gn) {
        $res .= numbertotext($Gn) . " Million";
    }

    if ($kn) {
        $res .= (empty($res) ? "" : " ") .
                numbertotext($kn) . " Thousand";
    }

    if ($Hn) {
        $res .= (empty($res) ? "" : " ") .
                numbertotext($Hn) . " Hundred";
    }

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
        "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
        "Seventy", "Eigthy", "Ninety");

    if ($Dn || $n) {
        if (!empty($res)) {
            $res .= " and ";
        }

        if ($Dn < 2) {
            $res .= $ones[$Dn * 10 + $n];
        } else {
            $res .= $tens[$Dn];

            if ($n) {
                $res .= "-" . $ones[$n];
            }
        }
    }

    if (empty($res)) {
        $res = "zero";
    }

    return $res;
}

function xml2array($contents, $get_attributes = 1, $priority = 'tag') {
    if (!$contents)
        return array();

    if (!function_exists('xml_parser_create')) {
        //print "'xml_parser_create()' function not found!"; 
        return array();
    }

    //Get the XML parser of PHP - PHP must have this module for the parser to work 
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss 
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);

    if (!$xml_values)
        return; //Hmm... 


        
//Initializations 
    $xml_array = array();
    $parents = array();
    $opened_tags = array();
    $arr = array();

    $current = &$xml_array; //Refference 
    //Go through the tags. 
    $repeated_tag_index = array(); //Multiple tags with same name will be turned into an array 
    foreach ($xml_values as $data) {
        unset($attributes, $value); //Remove existing values, or there will be trouble 
        //This command will extract these variables into the foreach scope 
        // tag(string), type(string), level(int), attributes(array). 
        extract($data); //We could use the array by itself, but this cooler. 

        $result = array();
        $attributes_data = array();

        if (isset($value)) {
            if ($priority == 'tag')
                $result = $value;
            else
                $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode 
        }

        //Set the attributes too. 
        if (isset($attributes) and $get_attributes) {
            foreach ($attributes as $attr => $val) {
                if ($priority == 'tag')
                    $attributes_data[$attr] = $val;
                else
                    $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr' 
            }
        }

        //See tag status and do the needed. 
        if ($type == "open") {//The starting of the tag '<tag>' 
            $parent[$level - 1] = &$current;
            if (!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag 
                $current[$tag] = $result;
                if ($attributes_data)
                    $current[$tag . '_attr'] = $attributes_data;
                $repeated_tag_index[$tag . '_' . $level] = 1;

                $current = &$current[$tag];
            } else { //There was another element with the same tag name 
                if (isset($current[$tag][0])) {//If there is a 0th element it is already an array 
                    $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                    $repeated_tag_index[$tag . '_' . $level]++;
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag], $result); //This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag . '_' . $level] = 2;

                    if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                        unset($current[$tag . '_attr']);
                    }
                }
                $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
                $current = &$current[$tag][$last_item_index];
            }
        } elseif ($type == "complete") { //Tags that ends in 1 line '<tag />' 
            //See if the key is already taken. 
            if (!isset($current[$tag])) { //New Key 
                $current[$tag] = $result;
                $repeated_tag_index[$tag . '_' . $level] = 1;
                if ($priority == 'tag' and $attributes_data)
                    $current[$tag . '_attr'] = $attributes_data;
            } else { //If taken, put all things inside a list(array) 
                if (isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array... 
                    // ...push the new element into that array. 
                    $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;

                    if ($priority == 'tag' and $get_attributes and $attributes_data) {
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag . '_' . $level]++;
                } else { //If it is not an array... 
                    $current[$tag] = array($current[$tag], $result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag . '_' . $level] = 1;
                    if ($priority == 'tag' and $get_attributes) {
                        if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                            unset($current[$tag . '_attr']);
                        }

                        if ($attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                        }
                    }
                    $repeated_tag_index[$tag . '_' . $level]++; //0 and 1 index is already taken 
                }
            }
        } elseif ($type == 'close') { //End of tag '</tag>' 
            $current = &$parent[$level - 1];
        }
    }

    return($xml_array);
}
