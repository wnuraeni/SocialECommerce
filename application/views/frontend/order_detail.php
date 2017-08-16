<section class="content-wrapper">
<table>
    <th>Order Number</th>
    <th>Date Ordered</th>
    <th>Total Price</th>
    <th>Total Item</th>
    <th>Order Status</th>
    <th>Payment Status</th>
    <th>Shipping Status</th>
    <th>Actions</th>
<?php
foreach($order as $val) :
?>
    <tr>
        <td><?php echo $val->order_no?></td>
        <td><?php echo $val->date_ordered?></td>
        <td><?php echo $val->total_price?></td>
        <td><?php echo $val->total_item?></td>
        <td><?php echo $val->order_status?></td>
        <td><?php echo $val->payment_status?></td>
        <td><?php echo $val->shipping_status?></td>
        <td>
            <?php if($val->payment_status == 'pending'):?>
            <a href="<?php echo base_url('order/konfirmasi_pembayaran/'.$val->id_order)?>">Konfirmasi Pembayaran</a>
            <?php endif; ?>
            <br>
             <?php if($val->order_status == 'pending'):?>
            <a href="<?php echo base_url('order/cancel_order/'.$val->order_no)?>">Cancel</a>
            <?php endif; ?>
        </td>
    </tr>
<?php
endforeach;
?>    
</table>
</section>