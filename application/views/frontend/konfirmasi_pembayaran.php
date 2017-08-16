<section class="content-wrapper">
    <form action="<?php echo base_url('order/konfirmasi_pembayaran')?>" method="POST" enctype="multipart/form-data">
        <label>ID Order</label><input type="text" name="no_order" value="<?php echo (!empty($order))?$order->order_no:''?>">
        <label>Total</label><input type="text" name="total" value="<?php echo (!empty($order))?$order->total_price:'' ?>">
        <label>Bukti Pembayaran</label><input type="file" name="bukti_pembayaran">
        <input type="submit" name="submit" value="Submit">
    </form>
</section>