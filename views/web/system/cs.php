<?php
use app\common\HelloWidget;
?>
<?= HelloWidget::widget([
    'data' => $data,
    'scenario' => 'system',
    'exclude' => ['sex']
]); ?>
