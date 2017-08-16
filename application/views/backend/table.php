<html>
    <a href="<?php echo base_url('admin/test/add_pegawai')?>">Add</a>
    <table>

        <th>Foto</th><th>nama</th><th>alamat</th><th>telepon</th><th>status</th><th>Pegawai</th><th>Action</th>
        <?php foreach($pegawai as $p):?>
        <tr>
            <td><?php echo $p->foto?></td>
            <td><?php echo $p->nama?></td>
            <td><?php echo $p->alamat?></td>
            <td><?php echo $p->telepon?></td>
            <td><?php echo $p->status?></td>
            <td><?php echo $p->tipe_pegawai?></td>
            <td>
                <a href="<?php echo base_url('admin/test/update_pegawai/'.$p->id_supir)?>">Edit</a>
                <a href="<?php echo base_url('admin/test/delete_pegawai/'.$p->id_supir)?>">Delete</a>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</html>