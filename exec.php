<?php
//$helloにお金を入れくださいと代入
 $hello = 'お金を入れください';
//$helloを標準入力
 echo $hello;
 $money =trim(fgets(STDIN));
 
 //$numに購入したい飲み物・・・を代入
 $num = '購入したい飲み物No.を入力してください';
 //$numを呼び出し
 echo $num.PHP_EOL;
 //$drinksに1,2,3,4の数字を代入
 //1,2,3,4に飲み物の名前と値段を代入
 $drinks =[
    1 => ["name" => "お茶", "price" => 100],
    2 => ["name" => "コーラ" ,"price" => 120],
    3 => ["name" => "コーヒー", "price" => 150],
    4 => ["name" => "ビール", "price" =>230],
    ];
 $buyDrinksName =[];
  //$drinksの表示をループさせる
 while (true){
   foreach($drinks as $drink =>$value){
     echo $drink. $value["name"]. "価格".$value["price"]."円".PHP_EOL;
  }
  //0は精算として呼び出す
  echo "0精算".PHP_EOL;
  //$inputNo標準入力で情報を受け取る
  $inputNo = trim(fgets(STDIN));
  //もし表示入力でけとった数字が０の時ループを終了する
  if($inputNo ==0){
   break;
  }
  //$buydrinkに$drinksの中から表示入力で受け取った情報を$buydrinkに代入する
  $buydrink=$drinks[$inputNo];
  //$moneyで受け取った金額が購入したドリンクより小さいか判定する
  if ($money < $buydrink["price"]) {
  //$moneyで受け取った金額から購入したドリンクを引き算それを$billに代入する
  $bill =$money - $buydrink["price"];
  //購入金額が足りないので○○購入するにはいくら足りないかを表示する
  echo $buydrink["name"]."を買うには".abs($bill)."円足りません。".PHP_EOL;
  //continueを使いifの結果がtrueの場合はwhileのループをスキップする
  continue;
  }else {
  //ifの条件に当てはまらなかった場合はお釣りの計算をする
  $money = $money - $buydrink["price"];
  }
  //購入したドリンクの名前を$buyDrinksNameの中に情報を入れる
  $buyDrinksName[] =$buydrink["name"];
}
//購入したドリンクの名前を呼び出す
$buyDrinks = implode(',',$buyDrinksName);
echo $money.'円のお釣りです。';
