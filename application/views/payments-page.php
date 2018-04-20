
<?php require_once(APPPATH . 'views/header-page.php'); ?>       

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/pure-min.css">
<style>
    horizontal .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: left;
    }
    label {
        padding-top: 8px;
        text-align: left;
    }
    .form-horizontal .control-label {
        padding-top: 8px;
        text-align: left;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #printableArea, #printableArea * {
            visibility: visible;
        }
        #printableArea{
            position: absolute;
            left: 0;
            top: 0;
        }
    }

</style>
<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 5px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 0px solid #888;
        width: 98%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #1DAB93;
        color: white;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
        padding: 2px 16px;
        background-color: #FFFF;
        color: white;
    }
</style>
</head>
<body>
    <?php echo $this->session->flashdata('msg'); ?>


    <div class=" col-md-12  col-sm-12 x_panel">
        <h2>PAYMENTS/RECEIPT</h2>  

        <button id="myBtn" class="btn btn-primary">ADD </button>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times</span>
                    <h2>NEW PAYMENT</h2>
                </div>
                <div class="modal-body">            

                    <form  enctype="multipart/form-data" class="form-horizontal"  action='<?= base_url(); ?>index.php/payment/save'  method="post">

                        <div class="col-md-6 col-sm-6 item form-group">
                            <label class="control-label col-md-2 col-sm-2">Select client</label>
                            <div class="col-md-4 col-sm-4">
                                <input class="easyui-combobox form-control" name="client" id="client" style="width:70%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/client',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 ">File/Case</label>
                            <div class="col-md-3 col-sm-3 ">

                                <input class="easyui-combobox form-control" name="file" id="file" style="width:70%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/files',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>

                        </div>
                        <div class=" item form-group col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">C/O</label>
                            <div class="col-md-3 col-sm-3 ">

                                <input class="easyui-combobox form-control" name="laywer" id="lawyer" style="width:70%;height:26px" data-options="
                                       url:'<?php echo base_url() ?>index.php/task/users',
                                       method:'get',
                                       valueField:'name',
                                       textField:'name',
                                       multiple:false,
                                       panelHeight:'auto'
                                       ">
                            </div>
                            <label class="control-label col-md-3 col-sm-3">Date</label>
                            <div class="col-md-3 col-sm-3 ">                                   
                                <input class="easyui-datebox" name="date" id="date"/>                                    
                            </div>

                        </div> 


                        <div class="printableArea" id="printableArea">
                            <div class=" col-md-12 col-sm-12">                       
                                <?php
                                echo $this->session->userdata('top');
                                ?>

                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-4 col-sm-4 ">
                                    <img  height="50px" width="100px" class="" src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('orgimage'); ?>" alt="logo" />
                                    <br>

                                    <h1 class="count green"><b>RECEIPT</b></h1>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <?php
                                    echo '<br><br>';
                                    echo "TIN " . $this->session->userdata('tin') . '<br>';
                                    echo "Receipt Number: " . $no = "" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s') . '<br>';
                                    // echo "Date: " . date('Y-m-d');
                                    ?>
                                    Date: <input id="dater" style="border:0;outline:0; height:32px;  border-bottom: 0px solid grey; width: 100%;"   name="dater" type="text">

                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <b> <h2><?php echo $this->session->userdata('name'); ?></h2></b>
                                    <p style="word-wrap:break-word; overflow-wrap: break-word;word-break: break-word;"><?php echo $this->session->userdata('address'); ?></p>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">                               
                                <table class="pure-table" style="width:100%;">


                                    <tbody>
                                        <tr>
                                            <td >Client</td> 
                                            <td colspan="2"><input id="clientname" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey; width: 100%;"   name="clientname" placeholder="Client" required="required" type="text">
                                            </td> 



                                        </tr>
                                        <tr>
                                            <td >For services rendered</td> 
                                            <td colspan="2" > <textarea   style="border:0;outline:0; height:32px;width: 100%;  border-bottom: 1px solid grey;"  class="col-md-9 col-sm-9" id="form-field-9" name="note" data-maxlength="10"></textarea>
                                            </td> 



                                        </tr>
                                        <tr class="pure-table-odd">
                                            <td colspan="3" > <h4>Payment Details</h4></td> 



                                        </tr>
                                        <tr>
                                            <td >Fee/Debit Note No</td> 
                                            <td ><input id="no" style="border:0;outline:0; height:32px;width: 100%;  border-bottom: 1px solid grey;"   name="no" value="<?php
                                                echo $this->session->userdata('code') . "/" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s');
                                                ?>"   type="text"></td> 
                                            <td ></td> 


                                        </tr>
                                        <tr>
                                            <td ></td> 
                                            <td ></td> 
                                            <td ></td> 


                                        </tr>

                                        <tr class="pure-table-odd">
                                            <td></td>
                                            <td>DETAILS</td>
                                            <td>AMOUNT</td>

                                        </tr>

                                        <tr>
                                            <td ></td>  
                                            <td>Professional fees(<sub>vat applicable</sub>)</td>
                                            <td><input id="fee" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"    name="fee" value=""   type="text">


                                        </tr>

                                        <tr>
                                            <td ></td>  
                                            <td>Disbursement</td>                                            
                                            <td> <input id="disbursement" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"    name="disbursement" value=""   type="text">
                                            </td>
                                        </tr>                                  
                                        <tr class="pure-table-odd" >                                      
                                            <td ></td>  
                                            <td><strong>SUB TOTAL</strong></td>
                                            <td><input id="total" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"  name="total" value="" type="text">
                                            </td>
                                        </tr>    
                                        <tr >                                      
                                            <td ></td>  
                                            <td colspan="1"></td>  
                                            <td colspan="1"></td>

                                        </tr> 
                                        <tr >                                      
                                            <td ></td>  
                                            <td>V.A.T(%)</td>                               
                                            <td> <input id="vat" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"  name="vat" value=""   type="text"> </td>


                                        </tr>

                                        <tr >                                      
                                            <td ></td>  
                                            <td>V.A.T</td>                               
                                            <td><input id="vatamount" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"   name="vatamount" value=""   type="text">
                                            </td>


                                        </tr>
                                        <tr >                                      
                                            <td ></td>  
                                            <td><span class=" blue"><strong>TOTAL</strong></span></td>                               
                                            <td><input id="sum" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"   name="sum" value=""   type="text">
                                            </td>

                                        </tr>
                                        <tr >
                                            <td ></td>  
                                            <td>Received on behalf of client</td>

                                            <td><input id="payment" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;" name="payment" value=""   type="text">
                                            </td>

                                        </tr>

                                        <tr >
                                            <td ></td>  
                                            <td>Balance</td>
                                            <td><input id="balance" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;" name="balance" value=""   type="text">
                                            </td>

                                        </tr> 
                                        <tr class="pure-table-odd">
                                            <td ></td>  
                                            <td>Method</td>
                                            <td>
                                                <div class="control-group">                                                 
                                                    <select class="form-control" id="method" style="border:0;outline:0; height:32px;width: 100%;  border-bottom: 1px solid grey;" name="method" >                                                         
                                                        <option value="Cash" >Cash</option>
                                                        <option value="Cheque" >Cheque</option>

                                                    </select>
                                                </div>
                                            </td>

                                        </tr> 
                                        <tr>
                                            <td >Amount Recieved</td> 
                                            <td colspan="2" > <input id="amount" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"  name="amount" placeholder="" required="required" type="text">
                                            </td> 



                                        </tr>
                                        <tr>
                                            <td >The sum of(in words)</td> 
                                            <td colspan="2"  ><input id="words" style="border:0;outline:0; height:32px;  border-bottom: 1px solid grey;width: 100%;"   name="words" placeholder=""  type="text">
                                            </td> 



                                        </tr>
                                        <tr>
                                            <td >Received with thanks</td> 
                                            <td colspan="2"  > <input id="reciever" style="border:0;outline:0; height:32px;width: 100%; border-bottom: 1px solid grey;"  name="reciever" value="<?php echo $this->session->userdata('username'); ?>"   type="text">
                                            </td> 



                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div> 
                        <div class="col-md-12 col-sm-12">
                            <input type="button" class="btn btn-default align-right printdiv-btn btn-primary icon-ok" value="print" />
                            <button id="send" type="submit" class="btn btn-success align-right">Submit</button>
                            <button  class="btn btn-primary align-right"  data-dismiss="modal">Cancel</button>
                        </div>


                    </form>




                </div>
                <div class="modal-footer">
                    <h3>Modal Footer</h3>
                </div>
            </div>

        </div>

        <div class="x_content scroll">

            <table id="datatable" class="table table-striped table-bordered scroll ">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>INVOICE</th>                   
                        <th>CLIENT</th>
                        <th>FILE</th>
                        <th>DETAILS</th> 
                        <th>AMOUNT PAID</th>
                        <th>V.A.T</th> 
                        <th>FEES</th>
                        <th>DISBURSEMENT</th>
                        <th>TOTAL AMOUNT</th>
                        <th>BALANCE</th>
                        <th>RECEIVED BY</th>
                        <th>APPROVED</th>
                        <th>OFFSET BALANCE</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    // var_dump($pay);
                    foreach ($pay as $loop) {
                        ?>  
                        <tr class="odd">
                            <td id="invoice:<?php echo $loop->date; ?>" contenteditable="true">
                                <span class="green"><?php echo $loop->date; ?></span>                      
                            </td>

                            <td id="invoice:<?php echo $loop->invoice; ?>" contenteditable="true">
                                <span class="green"><?php echo $loop->invoice; ?></span>                      
                            </td>

                            <td><?php echo $loop->client; ?></td>
                            <td><?php echo $loop->file; ?></td>
                            <td id="details:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                            <td><?php echo number_format(($loop->disbursement + $loop->fees + $loop->vat) - $loop->balance, 2); ?></td>
                            <td><?php echo number_format(($loop->vat), 2); ?></td>
                            <td><?php echo number_format($loop->fees, 2); ?></td>
                            <td><?php echo number_format($loop->disbursement, 2); ?></td>
                            <td><?php echo number_format(($loop->disbursement + $loop->fees + $loop->vat), 2); ?></td>
                            <td><?php echo number_format($loop->balance, 2); ?></td>
                            <td id="received:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->received; ?></td>
                            <td id="approved:<?php echo $loop->invoice; ?>" contenteditable="true"><?php echo $loop->approved; ?></td>

                            <td class="td-actions">

                                <a href="<?php echo base_url() . "index.php/payment/offset/" . $loop->disbursementID . "/" . $loop->approved; ?>" class="tooltip-info qualification" data-rel="tooltip" title="verify">
                                    <img  height="30px" width="30px" class="nav-user-photo" src="<?= base_url(); ?>images/Bill-32.png" alt="account" />
                                </a>
                            </td>


                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php require_once(APPPATH . 'views/footer-page.php'); ?>

    <script type="text/javascript">
        function ExportToExcel(datatable) {
            var htmltable = document.getElementById('datatables');
            var html = htmltable.outerHTML;
            window.open('data:application/vnd.ms-excel,' + ';filename=exportData.xlsx;' + encodeURIComponent(html));
            var result = "data:application/vnd.ms-excel,";
            this.href = result;
            this.download = "my-custom-filename.xls";
            return true;
        }

    </script>
    <script>
        $(document).ready(function () {
            $(function () {
                //acknowledgement message
                var message_status = $("#status");
                $("td[contenteditable=true]").blur(function () {
                    var field_id = $(this).attr("id");
                    var value = $(this).text();
                    $.post('<?php echo base_url() . "index.php/document/updater/"; ?>', field_id + "=" + value, function (data) {
                        if (data != '')
                        {
                            message_status.show();
                            message_status.text(data);
                            //hide the message
                            setTimeout(function () {
                                message_status.hide()
                            }, 4000);
                        }
                    });
                });

            });
            var total = 0;
            var vat = 0;
            var sum = 0;
            var fee = 0;
            var disbursement = 0;
            var balance = 0;
            var payment = 0;


            $('#clientname').click(function () {

                $("#clientname").val($("input[name=client]").val());
                $("#dater").val($("input[name=date]").val());
            });
            $('#total').click(function () {
                fee = 0;
                disbursement = 0;

                if ($("#fee").val() !== "") {

                    fee = parseFloat($("#fee").val());
                }
                if ($("#disbursement").val() !== "") {

                    disbursement = parseFloat($("#disbursement").val());
                }

                total = parseFloat(fee + disbursement);
                $("#total").val(total);

            });
            $('#sum').click(function () {
                sum = 0;
                if ($("vat").val() === "") {
                    alert("Please insert percentage V.A.T(%)");
                    return;
                }
                if ($("#disbursement").val() === "") {
                    disbursement = 0;
                    total = parseFloat(fee);
                }
                sum = parseFloat(vat) + parseFloat(total);
                $("#sum").val(sum);


            });
            $('#balance').click(function () {
                payment = parseInt($("#payment").val());
                balance = parseFloat(sum) - parseFloat(payment).toFixed(1);
                $("#balance").val(balance);
                $("#amount").val(payment);
                $("#words").val(toWords(payment));
            });

            $('#vatamount').click(function () {
                vat = 0;
                if ($("vat").val() === "") {
                    alert("Please insert percentage V.A.T(%)");
                    return;
                }
                if ($("#fee").val() === "") {

                    fee = 0;
                    vat = 0;
                } else {
                    vat = parseFloat((parseFloat($("#vat").val()) / 100) * fee).toFixed(1);
                    $("#vatamount").val(vat);

                }

            });


        });
        $(document).on('click', '.printdiv-btn', function (e) {
            e.preventDefault();

            var $this = $(this);
            //  var originalContent = $('body').html();
            var printArea = $this.parents('.printableArea').html();

            $('body').html(printArea);
            window.print();
            $('body').html(printArea);
        });


    </script>
    <script>
        var th = ['', 'thousand', 'million', 'billion', 'trillion'];
        var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
        var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

        function toWords(s) {
            s = s.toString();
            s = s.replace(/[\, ]/g, '');
            if (s != parseFloat(s))
                return 'not a number';
            var x = s.indexOf('.');
            if (x == -1)
                x = s.length;
            if (x > 15)
                return 'too big';
            var n = s.split('');
            var str = '';
            var sk = 0;
            for (var i = 0; i < x; i++) {
                if ((x - i) % 3 == 2) {
                    if (n[i] == '1') {
                        str += tn[Number(n[i + 1])] + ' ';
                        i++;
                        sk = 1;
                    } else if (n[i] != 0) {
                        str += tw[n[i] - 2] + ' ';
                        sk = 1;
                    }
                } else if (n[i] != 0) { // 0235
                    str += dg[n[i]] + ' ';
                    if ((x - i) % 3 == 0)
                        str += 'hundred ';
                    sk = 1;
                }
                if ((x - i) % 3 == 1) {
                    if (sk)
                        str += th[(x - i - 1) / 3] + ' ';
                    sk = 0;
                }
            }

            if (x != s.length) {
                var y = s.length;
                str += 'point ';
                for (var i = x + 1; i < y; i++)
                    str += dg[n[i]] + ' ';
            }
            return str.replace(/\s+/g, ' ');
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>