  <?php
      //ライブラリ読み込み
      require_once './PHPExcel_1.7.8/Classes/PHPExcel.php';
      require_once './PHPExcel_1.7.8/Classes/PHPExcel/IOFactory.php';
  
      //Excel読み込み
      $filepath = "i.xlsx";
      $objReader = PHPExcel_IOFactory::createReader('Excel2010');
      $book = $objReader->load($filepath);
  
      //シート設定
      $book->setActiveSheetIndex(0);
      $sheet = $book->getActiveSheet();
  
      // セルから値を取得
      for($i = 0; $i < 5; $i++){
          for($j = 1; $j < 5; $j++){
              $objCell = $sheet->getCellByColumnAndRow($i, $j); //col,rowの並び
              $str = _getText($objCell);
              print "$i - $j : $str<br />\n";
          }
      }
  
      /**
       * 指定したセルの文字列を取得する
       *
       * 色づけされたセルなどは cell->getValue()で文字列のみが取得できない
       * また、複数の配列に文字列データが分割されてしまうので、その部分も連結して返す
       *
       *
       * @param $objCell Cellオブジェクト
       */
      function _getText($objCell = null)
      {
          if (is_null($objCell)) {
              return false;
          }
          $txtCell = "";
          //まずはgetValue()を実行
          $valueCell = $objCell->getValue();
          if (is_object($valueCell)) {
              //オブジェクトが返ってきたら、リッチテキスト要素を取得
              $rtfCell = $valueCell->getRichTextElements();
              //配列で返ってくるので、そこからさらに文字列を抽出
              $txtParts = array();
              foreach ($rtfCell as $v) {
                  $txtParts[] = $v->getText();
              }
              //連結する
              $txtCell = implode("", $txtParts);
          } else {
              if (!empty($valueCell)) {
                  $txtCell = $valueCell;
              }
          }
          return $txtCell;
      }
  ?>