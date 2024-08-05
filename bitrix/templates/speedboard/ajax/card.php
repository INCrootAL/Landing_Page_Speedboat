<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$id = $_POST['id'];
$viwe = $_POST['viwe'];
if ($viwe == "del") {
    $arChart = $_SESSION['BX_CART'];
    if (is_array($arChart)) {
        $arChart = array_diff($arChart, [$id]);
    };
    $_arChart = array_values($arChart);
    $_SESSION['BX_CART'] = $_arChart;
    if (is_array($_SESSION['BX_CART'])) {
        echo "<table class=item_".$key.">";
        echo "<tr><th></th><th class='ph-cart-item-inf'>Фото</th><th>Название</th><th class='op-cart-item-inf'>Заезд-Выезд</th><th>Цена</th><th>Предоплата</th></tr>";
        foreach ($_SESSION['BX_CART'] as $key=>$sessionID) {
            echo "<tr class='cart_about". " item_".$key. "'" .">";
            $arIBlockElement = false;
            if (CModule::IncludeModule('iblock') && ($arIBlockElement = GetIBlockElement($sessionID))) {
                $arProps = $arIBlockElement['PROPERTIES'];
                //Is array for verifacation 
                $arrayData = array(20,31,24,32,23,19,27,28,33);
                $arrayPicty = array(19,23,27);
                $arrayPrepay = array(22,26,30);
                $arraySumm = array(21,25,29);
                $arrayPrePay = array(22,30,26);
                foreach($arProps as $property_code=>$arValue) {
                    if(!is_array($arValue['VALUE'])) {
                        if (!in_array($arValue["ID"],$arrayData)) {
                            if (in_array($arValue["ID"],$arraySumm)) {
                                echo "<td class='price_tour_".$key."'>".$arValue['VALUE']."</td>";
                            } else if (in_array($arValue["ID"],$arrayPrePay)) {
                                echo "<td class='prepayer_tour_".$key."'>".$arValue['VALUE']."</td>";
                            }
                        };
                        if (in_array($arValue["ID"],$arrayPicty)) {
                            if(!empty($arValue['VALUE'])) {
                                echo "<td class='item-close' onclick='deletIsBuy(".$sessionID.")'>"."</td>";
                                echo "<td class='ph-cart-item-inf'>".ShowImage($arValue['VALUE'], 150, 150, 'border="0"', '', true)."</td>";
                                echo "<td>".$arIBlockElement['NAME']."</td>";
                                echo "<input style='display:none' id='input_name_tour' name='TOUR_WITH_DATE_CALLBACK".$key."' type='text'  value='".$arIBlockElement['NAME']."'>";
                                foreach($arProps as $property_code=>$arValue1) {
                                    if (in_array($arValue1["ID"],$arrayPrepay)) {
                                        echo "<td class='item-time-race'>";
                                        $date_start = "date_fld_".$key;
                                        $date_finish = "date_fld_finish_".$key;
                                        $APPLICATION->IncludeComponent(
                                            "bitrix:main.calendar",
                                            "castom-for-cart-calendar",
                                            Array(
                                                "FORM_NAME" => $sessionID,
                                                "HIDE_TIMEBAR" => "Y",
                                                "INPUT_NAME" => $date_start,
                                                "INPUT_NAME_FINISH" => $date_finish,
                                                "INPUT_VALUE" => "",
                                                "INPUT_VALUE_FINISH" => "",
                                                "SHOW_INPUT" => "Y",
                                                "SHOW_TIME" => "N"
                                            )
                                        );
                                        echo "</td>";
                                    }
                                }
                            } else {
                                echo "<td class='item-close' onclick='deletIsBuy(".$sessionID.")'>"."</td>";?>
                                <td class="no-photo-item" style="background-image: url('/bitrix/templates/partner_teal/components/bitrix/catalog.section/castom_section_main/images/no_photo.png'); "></td>
                                <?echo "<td>".$arIBlockElement['NAME']."</td>";
                                echo "<input style='display:none' id='input_name_tour' name='TOUR_WITH_DATE_CALLBACK".$key."' type='text'  value='".$arIBlockElement['NAME']."'>";
                                foreach($arProps as $property_code=>$arValue1) {
                                    if (in_array($arValue1["ID"],$arrayPrepay)) {
                                        echo "<td class='item-time-race'>";
                                        $date_start = "date_fld_".$key;
                                        $date_finish = "date_fld_finish_".$key;
                                        $APPLICATION->IncludeComponent(
                                            "bitrix:main.calendar",
                                            "castom-for-cart-calendar",
                                            Array(
                                                "FORM_NAME" => $sessionID,
                                                "HIDE_TIMEBAR" => "Y",
                                                "INPUT_NAME" => $date_start,
                                                "INPUT_NAME_FINISH" => $date_finish,
                                                "INPUT_VALUE" => "",
                                                "INPUT_VALUE_FINISH" => "",
                                                "SHOW_INPUT" => "Y",
                                                "SHOW_TIME" => "N"
                                            )
                                        );
                                        echo "</td>";
                                    }
                                }
                            }
                        };
                    } else {
                        if (!in_array($arValue["ID"],$arrayData)) {
                            echo $arValue['NAME'].": ".$arValue['VALUE'];
                        }
                    }
                }
            }
            echo "</tr>";
        };
        echo "</table>";
        if (empty($_SESSION['BX_CART'])) {
            echo "<div class='empty-items'></div>";
        }

    };// else {
        
    //}
    ?>
<?} else {
    if (!empty($_SESSION['BX_CART'])) {
        $arChart = $_SESSION['BX_CART'];
    }
    if (is_array($arChart)) {
        for ($i=0; $i < count($arChart); $i++) {
            if (!in_array($id ,$arChart)) {
                array_push($arChart, $id);
            };
        };
    } else {
        $arChart[] = $id;
    };

    $_SESSION['BX_CART'] = $arChart;

    if (is_array($_SESSION['BX_CART'])) {
        echo "<table class=item_".$key.">";
        echo "<tr><th></th><th class='ph-cart-item-inf'>Фото</th><th>Название</th><th class='op-cart-item-inf'>Заезд-Выезд</th><th>Цена</th><th>Предоплата</th></tr>";
        foreach ($_SESSION['BX_CART'] as $key=>$sessionID) {
            echo "<tr class='cart_about". " item_".$key. "'" .">";
            $arIBlockElement = false;
            if (CModule::IncludeModule('iblock') && ($arIBlockElement = GetIBlockElement($sessionID))) {
                $arProps = $arIBlockElement['PROPERTIES'];
                //Is array for verifacation 
                $arrayData = array(20,31,24,32,23,19,27,28,33);
                $arrayPicty = array(19,23,27);
                $arrayPrepay = array(22,26,30);
                $arraySumm = array(21,25,29);
                $arrayPrePay = array(22,30,26);
                foreach($arProps as $property_code=>$arValue) {
                    if(!is_array($arValue['VALUE'])) {
                        if (!in_array($arValue["ID"],$arrayData)) {
                            if (in_array($arValue["ID"],$arraySumm)) {
                                echo "<td class='price_tour_".$key."'>".$arValue['VALUE']."</td>";
                            } else if (in_array($arValue["ID"],$arrayPrePay)) {
                                echo "<td class='prepayer_tour_".$key."'>".$arValue['VALUE']."</td>";
                            }
                        };
                        if (in_array($arValue["ID"],$arrayPicty)) {
                            if(!empty($arValue['VALUE'])) {
                                echo "<td class='item-close' onclick='deletIsBuy(".$sessionID.")'>"."</td>";
                                echo "<td class='ph-cart-item-inf'>".ShowImage($arValue['VALUE'], 150, 150, 'border="0"', '', true)."</td>";
                                echo "<td>".$arIBlockElement['NAME']."</td>";
                                echo "<input style='display:none' id='input_name_tour' name='TOUR_WITH_DATE_CALLBACK".$key."' type='text'  value='".$arIBlockElement['NAME']."'>";
                                foreach($arProps as $property_code=>$arValue1) {
                                    if (in_array($arValue1["ID"],$arrayPrepay)) {
                                        echo "<td class='item-time-race'>";
                                        $date_start = "date_fld_".$key;
                                        $date_finish = "date_fld_finish_".$key;
                                        $APPLICATION->IncludeComponent(
                                            "bitrix:main.calendar",
                                            "castom-for-cart-calendar",
                                            Array(
                                                "FORM_NAME" => $sessionID,
                                                "HIDE_TIMEBAR" => "Y",
                                                "INPUT_NAME" => $date_start,
                                                "INPUT_NAME_FINISH" => $date_finish,
                                                "INPUT_VALUE" => "",
                                                "INPUT_VALUE_FINISH" => "",
                                                "SHOW_INPUT" => "Y",
                                                "SHOW_TIME" => "N"
                                            )
                                        );
                                        echo "</td>";
                                    }
                                }
                            } else {
                                echo "<td class='item-close' onclick='deletIsBuy(".$sessionID.")'>"."</td>";?>
                                <td class="no-photo-item" style="background-image: url('/bitrix/templates/partner_teal/components/bitrix/catalog.section/castom_section_main/images/no_photo.png'); "></td>
                                <?echo "<td>".$arIBlockElement['NAME']."</td>";
                                echo "<input style='display:none' id='input_name_tour' name='TOUR_WITH_DATE_CALLBACK".$key."' type='text'  value='".$arIBlockElement['NAME']."'>";
                                foreach($arProps as $property_code=>$arValue1) {
                                    if (in_array($arValue1["ID"],$arrayPrepay)) {
                                        echo "<td class='item-time-race'>";
                                        $date_start = "date_fld_".$key;
                                        $date_finish = "date_fld_finish_".$key;
                                        $APPLICATION->IncludeComponent(
                                            "bitrix:main.calendar",
                                            "castom-for-cart-calendar",
                                            Array(
                                                "FORM_NAME" => $sessionID,
                                                "HIDE_TIMEBAR" => "Y",
                                                "INPUT_NAME" => $date_start,
                                                "INPUT_NAME_FINISH" => $date_finish,
                                                "INPUT_VALUE" => "",
                                                "INPUT_VALUE_FINISH" => "",
                                                "SHOW_INPUT" => "Y",
                                                "SHOW_TIME" => "N"
                                            )
                                        );
                                        echo "</td>";
                                    }
                                }
                            }
                        };
                    } else {
                        if (!in_array($arValue["ID"],$arrayData)) {
                            echo $arValue['NAME'].": ".$arValue['VALUE'];
                        }
                    }
                }
            }
            echo "</tr>";
        };
        echo "</table>";?>
   <? };
};
?>