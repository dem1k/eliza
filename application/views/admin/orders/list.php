
<table class="extended">
    <thead>
    <tr>
        <th width="50%">Заказ</th>
        <th>Пользователь</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
        <? foreach ($orders as $order): ?>
    <tr>
        <td>
            <a href="/admin/orders/order_show/<?php echo $order->id?>"> № <?php echo $order->id?>  от <?php echo date('d.m.Y  [H:i]',strtotime($order->created_at))?></a>
        </td>
        <td>
            <?php echo $order->username?>
        </td>
        <td>
            <?php echo $order->status?>
        </td>
    </tr>
        <? endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Заказ</th>
        <th>Пользователь</th>
        <th>Статус</th>
    </tr>
    </tfoot>
</table>
<div class="clear"></div>

