<div class="body-sec">
<section class="content-wrapper">
    <div class="content-container container">
    
    <div class="col-left">
        <div class="block man-block">
                <div class="block-title">Menu</div>
                <ul>

                    <?php
                        $login_iduser = $this->session->userdata('id_user');
                    ?>
<li><a href="<?php echo base_url('account/view_profile/'.$login_iduser)?>">View Profile</a></li>

                    <li><a href="<?php echo base_url('order/order_history/'.$login_iduser)?>">Order History</a></li>
                    <li><a href="<?php echo base_url('order/konfirmasi_pembayaran')?>">Konfirmasi Pembayaran</a></li>
                </ul>
            </div>
    </div>
    
    <div class="col-main">
<h4 class="legend">Order History</h4>
<hr>
<?php echo $this->pagination->create_links();?>
<table>
    <tr>
        <th>
            Order Name
        </th>
        <th>
            Date Ordered
        </th>
        <th>
            Total Price
        </th>
        <th>
            Total Item
        </th>
        <th>
            Payment Status
        </th>
        <th>
            Shipping Status
        </th>
        <th>
            Action
        </th>
    </tr>
<?php
foreach ($order as $val) :
?>
    <tr>
        <td><?php echo $val->order_number?></td>
        <td><?php echo date('d-M-y H:i',strtotime($val->date_ordered))?></td>
        <td><?php echo $val->total_price?></td>
        <td><?php echo $val->total_item?></td>
        <td><?php echo $val->payment_status?></td>
        <td><?php echo $val->shipping_status?></td>
        <td>
	<a href="<?php echo base_url('order/detail/'.$val->id_order); ?>">Detail</a>
            <?php if($val->payment_status == 'pending') : ?>
            <a href="<?php echo base_url('order/konfirmasi_pembayaran/'.$val->id_order)?>">Bayar</a> | 
            <?php endif; ?>
            
            <?php if($val->payment_status == 'pending') : ?>
            <a href="<?php echo base_url('order/cancel_order/'.$val->order_number)?>">Cancel</a>
            <?php endif; ?>
        </td>
        <td></td>
    </tr>
<?php
endforeach;
?>
    
                </table>
            </div>
        </div>
    </section>
</div>

<style>
table {
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 640px;
border-collapse:
collapse; border-spacing: 0;
}

td, th {
border: 1px solid transparent; /* No more visible border */
height: 30px;
transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
background: #DFDFDF;  /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
vertical-align: middle;
}

/* Cells in even rows (2,4,6...) are one color */
tr:nth-child(even) td { background: #F1F1F1; }

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
tr:nth-child(odd) td { background: #FEFEFE; }

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
</style>