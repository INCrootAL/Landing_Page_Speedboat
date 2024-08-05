<?
   $arResult["MORE_PHOTO"] = array();
   if(isset($arResult["PROPERTIES"]["IMG_PORTFOLIO"]["VALUE"]) 
	   && is_array($arResult["PROPERTIES"]["IMG_PORTFOLIO"]["VALUE"]));
   {
      foreach($arResult["PROPERTIES"]["IMG_PORTFOLIO"]["VALUE"] as $file)
      {
         $file = CFile::GetFileArray($file);		 
         if(is_array($file))
            $arResult["IMG_PORTFOLIO"][] = $file;
      }
   }
?>