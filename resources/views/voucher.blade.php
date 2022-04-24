@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="row align-items-center">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Voucher #</span>
                                    <input data-index="0" type="text" id="inVoucher" class="form-control" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Account</span>
                                    <input data-index="3" type="text" id="inAccountName" class="form-control" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Create Date</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">From</span>
                                    <input type="text" id="inDateFrom" class="form-control" aria-describedby="basic-addon3" placeholder="YYYY-DD-MM HH">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">To</span>
                                    <input type="text" id="inDateTo" class="form-control" aria-describedby="basic-addon3" placeholder="YYYY-DD-MM HH">
                                </div>
                            </div>
                            <div class="col">
                                <span class="input-group-text">Status</span>
                                <select id="inBrand" data-index="2" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected>View All</option>
                                    <option value="AVIS">AVIS</option>
                                    <option value="Budget">Budget</option>
                                </select>

                            </div>
                        </div>

                        <button type="button" class="btn btn-primary m-3" id="btnClearFilters">
                            Clear Filters
                        </button>

                    </div>
                </div>
                <table id="vouchersInfo" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Voucher#</th>
                            <th>CBA</th>
                            <th>Brand</th>
                            <th>Account Name</th>
                            <th>Issuer Name</th>
                            <th>Voucher Status</th>
                            <th>Past Due</th>
                            <th>Payment File</th>
                            <th>Customer Last Name</th>
                            <th>Confirmation #</th>
                            <th>Issue IATA</th>
                            <th>Gross Amount</th>
                            <th>GSA Net Amount</th>
                            <th>ABG Net Amount</th>
                            <th>User</th>
                            <th>Create Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $voucher)
                            <tr>
                                <td>{{ $voucher->number }}</td>
                                <td>{{ $voucher->account }}</td>
                                <td>{{ $voucher->company->name }}</td>
                                <td>{{ $voucher->organizationAccountName->name }}</td>
                                <td>{{ $voucher->organizationIssuerName->name }}</td>
                                <td>{{ $voucher->voucherState->name }}</td>
                                <td>{{ $voucher->past_due }}</td>
                                <td>{{ $voucher->payment_file }}</td>
                                <td>{{ $voucher->booking->last_name }}</td>
                                <td>{{ $voucher->booking_number}}</td>
                                <td>{{ $voucher->iata_code }}</td>
                                <td>{{ $voucher->gross_amount }}</td>
                                <td>{{ $voucher->gsa_amount }}</td>
                                <td>{{ $voucher->abg_amount }}</td>
                                <td>{{ $voucher->user_name }}</td>
                                <td>{{ $voucher->issue_date }}</td>
                            </tr>
                        @endforeach
                        <!-- <tr>
                            <td scope="row">ASDFJ6761A</td>
                            <td>AV768000107419</td>
                            <td>Avis</td>
                            <td>LQ</td>
                            <td>Representaciones</td>
                            <td>LQ</td>
                            <td>Representaciones</td>
                            <td>Issued</td>
                            <td>Awaiting</td>
                            <td>Payment</td>
                            <td>DANIEL</td>
                            <td>ABBY</td>
                            <td>15873943CR1</td>
                            <td>0101651P</td>
                            <td>Jazmin</td>
                            <td>2014-03-03</td>
                        </tr>
                        <tr>
                            <td scope="row">NVR6677A</td>
                            <td>AV768000107419</td>
                            <td>Avis</td>
                            <td>LQ</td>
                            <td>Representaciones</td>
                            <td>LQ</td>
                            <td>Representaciones</td>
                            <td>Issued</td>
                            <td>Awaiting</td>
                            <td>Payment</td>
                            <td>DANIEL</td>
                            <td>ABBY</td>
                            <td>15873943CR1</td>
                            <td>0101651P</td>
                            <td>Martin</td>
                            <td>2016-07-01</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.js"></script>
    <script>

        var table;

        // Data Table
        table = $('#vouchersInfo').DataTable({
            "scrollX": true,
            dom: 'B<"clear">lfrtip',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Export',

                }
            ]
        });

        // Filtros de busqueda
        $("#inVoucher").keyup(function(){
            table.column($(this).data('index')).search(this.value).draw();
        });
        $("#inAccountName").keyup(function(){
            table.column($(this).data('index')).search(this.value).draw();
        });
        $("#inBrand").change(function(){
            table.column($(this).data('index')).search(this.value).draw();
        });
        $("#inDateFrom, #inDateTo").keyup(function(){
            table.draw();
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {

                var dateFrom = $('#inDateFrom').val();
                var dateTo = $('#inDateTo').val();

                var indexCol = 15;

                dateFrom = dateFrom.replace(/-/g, "");
                dateTo= dateTo.replace(/-/g, "");

                var dateCol = data[indexCol].replace(/-/g, "");
                if (dateFrom === "" && dateTo === "")
                {
                    return true;
                }
                if(dateFrom === "")
                {
                    return dateCol <= dateTo;
                }
                if(dateTo === "")
                {
                    return dateCol >= dateFrom;
                }

                return dateCol >= dateFrom && dateCol <= dateTo;

            }
        );

        $("#btnClearFilters").on('click',function(){
            $("#inVoucher").val('');
            $("#inAccountName").val('');
            $("#inBrand").val('');
            $("#inDateFrom").val('');
            $("#inDateTo").val('');

            table.search('').columns().search('').draw();
        });

    </script>
@endsection
