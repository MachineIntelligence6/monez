{{-- Start of Static Parameters Modal  --}}
<div class="modal fade" id="feed-timeline-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content shadow shadow-5">
            <div class="modal-header border-bottom">
                <h5 class="text-uppercase modal-title">Feed Timeline</h5>
                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Feed Id</th>
                                <th>Feed Status</th>
                                <th>Assigned Channels</th>
                                <th>Total Searches</th>
                                <th>Priority Score</th>
                                <th>Notes</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

</div>{{-- End of Static Parameters Modal  --}}

@section('script-bottom')
<script type="text/javascript">
    $('#products-datatable').DataTable();
</script>
@endsection