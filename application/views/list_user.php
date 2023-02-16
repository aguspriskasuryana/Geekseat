<section class="scrollable wrapper">
<!-- page content -->
<div class="right_col" role="main">
<div class="">
    
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users <small>list</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="<?php echo site_url('user/tambah_user'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Num </th>
                                <th>Name </th>
                                <th>Username</th>
                                <th>Email </th>
                                <th>Role </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $no=1;
                                foreach($list_user as $list){
                                    
                            ?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $no++; ?></td>
                                <td class=" "><?php echo $list['nama_lengkap']?></td>
                                <td class=" "><?php echo $list['username']?></td>
                                <td class=" "><?php echo $list['email']?></td>
                                <td class=" "><?php echo $list['nama_role']?></td>
                                <td class=" last">
                                    <a href="<?php echo site_url('user/edit_user/'.$list['id_user']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit Pass"><i class="fa fa-key"></i></a>
                                    <a href="<?php echo site_url('user/edit_user_detail/'.$list['id_user']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo site_url('user/hapus/'.$list['id_user']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>

                    </table>

                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                Konfirmasi Hapus!
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Akan Menghapus User?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <a href="#" class="btn btn-danger danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /modals -->
                </div>
            </div>
        </div>

   </div>
</div>

</div>
<!-- /page content -->

</section>

<!-- Datatables -->
<script src="<?php echo base_url('asset'); ?>/js/datatables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/datatables/tools/js/dataTables.tableTools.js"></script>
<script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': true,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers"
                    
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
</script>

<script type="text/javascript">       
$('.btn_delete').click(function(e){
    e.preventDefault();
                    var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>