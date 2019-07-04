<?php

// Calendarクラス
class Calendar
{
  // プロパティの定義
  public $prev;
  public $next;
  public $yearMonth;
  public $yearMonthCaption;
  private $_thisMonth;

  // コンストラクタ
  public function __construct()
  {
    // 例外処理
    try {
      // GETの情報がない場合、XXXX-XXではない場合
      if (!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/', $_GET['t'])) {
        throw new \Exception();
      }
      // 受け取ったパラメータを使って、日付の情報として変数に格納する
      $this->_thisMonth = new \DateTime($_GET['t']);
    } catch (\Exception $e) {
      // 例外になったら、当月の情報を変数に格納
      $this->_thisMonth = new \DateTime('first day of this month');
    }

    // プロパティの値のセット
    $this->prev = $this->_createPrevLink();
    $this->next = $this->_createNextLink();
    // ある月の情報から年と月の情報を取得する
    $this->yearMonth = $this->_thisMonth->format('F Y');
    $this->yearMonthCaption = $this->_thisMonth->format('F Y');
  }

  // メソッドの定義
  // 前月へのリンクする情報
  private function _createPrevLink()
  {
    // オブジェクトの複製
    $dt = clone $this->_thisMonth;
    // 1か月前にしてXXXX-XXでまとめる
    return $dt->modify('-1 month')->format('Y-m');
  }

  // 翌月へのリンクする情報
  private function _createNextLink()
  {
    // オブジェクトの複製
    $dt = clone $this->_thisMonth;
    // 1か月後にしてXXXX-XXでまとめる
    return $dt->modify('+1 month')->format('Y-m');
  }

  public function show()
  {
    $tail = $this->_getTail();
    $body = $this->_getBody();
    $head = $this->_getHead();
    // 出力する変数を連結してまとめる
    $html = '<tr>' . $tail . $body . $head . '</tr>';
    echo $html;
  }

  private function _getTail()
  {
    // 前月の日付の情報を埋める
    $tail = '';
    // ある月の前月の末日の情報
    $last = new \DateTime('last day of ' . $this->yearMonth . ' -1 month');
    // 前月の情報でtdを埋める
    while ($last->format('w') < 6) {
      $tail = sprintf('<td class="gray">%d</td>'. PHP_EOL,  $last->format('d')) . $tail;
      $last->sub(new \DateInterval('P1D'));
    }
    return $tail;
  }

  private function _getBody()
  {
    $body = '';
    // 期日の開始日
    $begin = new \DateTime('first day of ' . $this->yearMonth);
    // 期日の終了日
    $end = new \DateTime('first day of ' . $this->yearMonth . ' +1 month');
    // 日付の間隔
    $interval = new \DateInterval('P1D');
    // 上記の項目をDatePeriodクラスに渡す
    $daterange = new \DatePeriod($begin, $interval ,$end);
    
    // インスタンスから日付の情報を取り出す
    foreach ($daterange as $day) {
      // 日付の情報が0であればtrタグを閉じて開く
      if ($day->format('w') === '0') {
        $body .= '</tr><tr>'. PHP_EOL;
      }
      // 日付の情報をformatメソッドで出力
      $body .= sprintf('<td class="week_%d">%d</td>'. PHP_EOL, $day->format('w'), $day->format('d'));
    }
    return $body;
  }

  private function _getHead()
  {
    // 翌月の日付の情報を取得する
    $head = '';
    $end = new \DateTime('first day of ' . $this->yearMonth . '+1 month');

    while ($end->format('w') > 0) {
      $head .= sprintf('<td class="gray">%d</td>'. PHP_EOL,  $end->format('d'));
      $end->add(new \DateInterval('P1D'));
    }
    return $head;
  }
}
