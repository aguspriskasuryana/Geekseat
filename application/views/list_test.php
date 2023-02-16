<section class="scrollable wrapper">
<!-- page content -->
<div class="right_col" role="main">
<div class="">
    
    <div class="clearfix"></div>

    <div class="row">

        <!-- part  -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>TEST</h2>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content2">

                      <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/test/calc'); ?>" method="post">
                      <?php echo $this->csrf->get_html(); ?>
                      <input id="id_test" name="id_test" type="hidden" >

                        <div class="form-group">
                            <div class="col-md-2 col-sm-6 col-xs-6 form-group has-feedback">
                                <label class="col-lg-2 control-label">Person-A</label>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 form-group has-feedback">
                                <input type="number" class="form-control has-feedback-left" id="ageofdeath_a" placeholder="Age of Death" name="ageofdeath_a" 
                                value="<?php if(isset($ageofdeath_a)){echo($ageofdeath_a);}?>">
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 form-group has-feedback">
                                <input type="number" class="form-control" id="yearofdeath_a" placeholder="Year of Death" name="yearofdeath_a" value="<?php if(isset($yearofdeath_a)){echo($yearofdeath_a);}?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-sm-6 col-xs-6 form-group has-feedback">
                                <label class="col-lg-2 control-label">Person-B</label>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 form-group has-feedback">
                                <input type="number" class="form-control has-feedback-left" id="ageofdeath_b" placeholder="Age of Death" name="ageofdeath_b" value="<?php if(isset($ageofdeath_b)){echo($ageofdeath_b);}?>">
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 form-group has-feedback">
                                <input type="number" class="form-control" id="yearofdeath_b" placeholder="Year of Death" name="yearofdeath_b" value="<?php if(isset($yearofdeath_b)){echo($yearofdeath_b);}?>">
                            </div>
                        </div>
                        <span id="confirmMessage" class="confirmMessage"></span>
                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Hitung</button> 
                        </div><div class="col-lg-offset-2 col-lg-10">
                            <p style="font-size:30px"> 
                            <?php 
                            if (isset($hasilhitung)){
                                if ($hasilhitung<1){
                                    echo($hasilhitung." Invalid");
                                } else {
                                    echo("Average of people killed on year = ".$hasilhitung);
                                }
                            }
                            ?>
                            <p>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            <!-- /part -->

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Year </th>
                                <th>Calc </th>
                                <th>villagers</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $arrlength = count($list_test);

                            for($x = 0; $x < $arrlength; $x++) {
                            ?>
                            <tr class="even pointer">
                                <td ><?php echo ($x+1); ?></td>
                                <td ><?php echo $list_test[$x][0]?></td>
                                <td ><?php echo $list_test[$x][1]?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
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
                    'iDisplayLength': 10,
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