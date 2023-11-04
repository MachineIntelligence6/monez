@extends('layouts.vertical', ['title' => 'Activity Reports'])

@section('content')

<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
<style>
div.dt-buttons {
    float: right;
}    
</style>
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Monez</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                        <li class="breadcrumb-item active">Activity Reports</li>
                    </ol>
                </div>
                <h4 class="page-title">Activity Reports</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="row mb-3 justify-content-end">
                        <div class="col-auto">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept=".csv">
                                        <label class="btn btn-primary" for="customFile">Export CSV</label>
                                    </div>
                                </div>
                                <div class="col-auto dropleft" style="min-width: 160px">
                                    <button class="btn btn-secondary waves-effect waves-light dropdown-toggle" type="button" data-toggle="dropdown" data-target="#show-columns-dropdown" aria-haspopup="true" aria-expanded="false">
                                        Show Columns
                                    </button>
                                                                       
                                    <div id="show-columns-dropdown" class="dropdown-menu">
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="channel-path">
                                                <label class="custom-control-label w-100" for="channel-path" data-column="0">Channel Path</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="referer">
                                                <label class="custom-control-label w-100" for="referer" data-column="1">Referer</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="location">
                                                <label class="custom-control-label w-100" for="location" data-column="2">Location</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="latency">
                                                <label class="custom-control-label w-100" for="latency" data-column="3">Latency (seconds)</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="useragent">
                                                <label class="custom-control-label w-100" for="useragent" data-column="4">UserAgent</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="screen-resolution">
                                                <label class="custom-control-label w-100" for="screen-resolution" data-column="5">Screen Resolution</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="device">
                                                <label class="custom-control-label w-100" for="device">Device</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="os">
                                                <label class="custom-control-label w-100" for="os">OS</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="browser">
                                                <label class="custom-control-label w-100" for="browser">Browser</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="row mb-2 align-items-center justify-content-between">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-auto" style="min-width: 170px;">
                                    <select class="form-control" name="partener-type" id="partner-type" data-toggle="select2">
                                        <option selected disabled>Select Type</option>
                                        <option value="publishers">Publishers</option>
                                        <option value="advertisers">Advertisers</option>
                                    </select>
                                </div>
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control" name="parteners" disabled id="partners" data-target-dropdown="#partners-dropdown" data-toggle="select2">
                                        <option value="" selected disabled></option>
                                        <option value="all">All</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="partners-dropdown" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label w-100" for="customCheck1">Partner 1</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label w-100" for="customCheck2">Partner 2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control" disabled id="feeds-channels" data-target-dropdown="#types-dropdown" data-toggle="select2">
                                        <option value="" selected disabled></option>
                                        <option value="all">All</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="types-dropdown" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="feed1">
                                                <label class="custom-control-label w-100" for="feed1">Feed 1</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="feed2">
                                                <label class="custom-control-label w-100" for="feed2">Feed 2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control selectperiod" id="select-period" disabled name="period" data-toggle="select2" required>
                                        <option>Select Period</option>
                                        <option value="">Yesterday</option>
                                        <option value="">Today</option>
                                        <option value="">Month to Date</option>
                                        <option value="">Previous Month</option>
                                        <option value="custom-range">Custom Range</option>
                                    </select>
                                    <input type="text" id="range-datepicker" style="width: 0; height: 0; overflow: hidden;" class="form-control border-0 p-0 custom-range-date-picker" placeholder="Start Date to End Date">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">Go</button>
                        </div>
                    </div> -->
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th>Date & Time Of Search</th>
                                    <th>Query</th>
                                    <th>Advertiser</th>
                                    <th>Feed</th>
                                    <th>Publisher</th>
                                    <th>Channel</th>
                                    <th>SubId</th>
                                    <th>Channel Path</th>
                                    <th>Referer</th>
                                    <th>No. of redirects</th>
                                    <th>Alert</th>
                                    <th>IP Address</th>
                                    <!-- Location = City + Country  -->
                                    <th>Location</th>
                                    <th>GEO</th>
                                    <th>Latency (Seconds)</th>
                                    <th>UserAgent</th>
                                    <th>Screen Resolution</th>
                                    <th>Device</th>
                                    <th>OS</th>
                                    <th>Browser</th>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Advertiser</th>
                                    <th>Feed</th>
                                    <th>Publisher</th>
                                    <th>Channel</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <!-- Location = City + Country  -->
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>                                
                            </thead>
                            <tbody>
                                @foreach ($channelSearchs as $channelSearch)
                                    <tr>
                                        <td>{{$channelSearch->created_at}}</td>
                                        <td>{{$channelSearch->query}}</td>
                                        <td>{{$channelSearch->advertiser ? $channelSearch->advertiser->company_name : '--'}}</td>
                                        <td>{{$channelSearch->feed}}</td>
                                        <td>{{$channelSearch->channel->publisher->company_name}}</td>
                                        <td>{{$channelSearch->channel->channelId}}</td>
                                        <td>{{$channelSearch->subid}}</td>
                                        <td>{{$channelSearch->channel->channelpath->channel_path}}</td>
                                        <td>{{$channelSearch->referer}}</td>
                                        <td>{{$channelSearch->no_of_redirects}}</td>
                                        <td>{{$channelSearch->alert}}</td>
                                        <td>{{$channelSearch->ip_address}}</td>
                                        <td>{{$channelSearch->location}}</td>
                                        <td>{{$channelSearch->geo}}</td>
                                        <td>{{$channelSearch->latency}}</td>
                                        <td>{{$channelSearch->user_agent}}</td>
                                        <td>{{$channelSearch->screen_resolution}}</td>
                                        <td>{{$channelSearch->device}}</td>
                                        <td>{{$channelSearch->os}}</td>
                                        <td>{{$channelSearch->browser}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->


@endsection

@section('script')
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>


<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>


<script src="{{asset('assets/js/custom/custom-multiselect-dropdown.js')}}"></script>


<!-- Page js-->
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>
<script src="{{asset('assets/js/modal-init.js')}}"></script>

<!-- dataTables scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<!-- <script src="https://datatables.net/download/build/nightly/jquery.dataTables.js"></script> -->

<script type="text/javascript">
    let table = $('#products-datatable').DataTable({
        orderCellsTop: true,
        dom: 'Bfrtip',  
        buttons: [
            {
                extend: 'colvis',
                columns: ':not(.noVis)',
                text: 'Show Columns'            
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                },
                text:'Export CSV'
            }
            ],
            initComplete: function () {
            this.api().columns([2,3,4,5]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $("#products-datatable thead tr:eq(1) th").eq(column.index()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
            } );
        },
        searching: true,
        filter: true,
        paging: true,
        info: true,
        order: [], 
        language: {
        searchPlaceholder: "Search records",
        search: "",
      },       
           
        "lengthMenu": [
            [50, 100, 250, 500],
            [50, 100, 250, 500]
        ],
  } );
  
  table.on('draw', function () {
    table.columns().indexes().each( function ( idx ) {
//       var select = $(table.column( idx ).header()).find('select');
      var select = $("#products-datatable thead tr:eq(1) th").eq(table.column( idx )).find('select');
      
      if ( select.val() === '' ) {
        select
          .empty()
          .append('<option value=""/>');

        table.column(idx, {search:'applied'}).data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' );
        } );
      }
    } );
  } );

    $(".selectperiod").on("select2:close", function() {
        let value = $(this).val()
        if (value === "custom-range") {
            setTimeout(() => {
                $(".custom-range-date-picker").flatpickr({
                    mode: "range"
                }).toggle()
            }, 0);
            $(".custom-range-date-picker").change((e) => {
                let renderedContainer = $(this).siblings(".select2-container")
                    .find(".select2-selection__rendered");
                renderedContainer.text("Custom Range " + `( ${$(e.target).val()} )`);
            });
        }
    })

    //Filters Flow

    $("#partner-type").on("change", (e) => {
        
        if ($(e.target).val() !== "") {
            let selectedText = $("#partner-type option:selected").text();
            
            let partnersRenderContainer = $("#partners")
                .removeProp("disabled")
                .siblings(".select2-container")
                .find(".select2-selection__rendered");
            partnersRenderContainer.text("Select " + selectedText);

            let fchRenderContainer = $("#feeds-channels")
                .siblings(".select2-container")
                .find(".select2-selection__rendered");
            fchRenderContainer.text("Select " + ($("#partner-type").val() === "advertisers" ? "Feeds" : "Channels"));
        }
    });

    $("#partners").change((e) => {
        if ($(e.target).val() !== "") {
            $("#feeds-channels")
                .removeProp("disabled")
        }
    });
    $("#feeds-channels").change((e) => {
        if ($(e.target).val() !== "") {
            $("#select-period")
                .removeProp("disabled");
        }
    });

    $("[data-toggle='dropdown']").click(function() {
        $($(this).attr("data-target")).toggleClass("d-block");
    })

    $(document).on('click', (e) => {
        console.log(e.target)
        $('.dropdown-menu').each((_, searchDrop) => {
            if (!searchDrop.parentNode.contains(e.target)) {
                $(searchDrop).removeClass("d-block");
            }
        })
    })
</script>
@endsection
