<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared/title-meta', ['title' => $title])
    @include('layouts.shared/head-css')

    {{-- @include('layouts.shared/head-css', ["demo" => "modern"]) --}}
</head>

<body @yield('body-extra')>
    <!-- Begin page -->
    @auth
        @if (Auth::user()->role == 'Advertiser')
            @foreach (Auth::user()->advertiser->unreadNotifications as $notification)
                <div style="background-color: red" id="{{ $notification->id }}">
                    <span style="color: white">{{ $notification->data['message'] }}</span> <button
                        onclick="markMessageAsRead('{{ $notification->id }}')">remove</button>
                </div>
            @endforeach
        @elseif (Auth::user()->role == 'Publisher')
            @foreach (Auth::user()->publisher->unreadNotifications as $notification)
                <div style="background-color: red" id="{{ $notification->id }}">
                    <span style="color: white">{{ $notification->data['message'] }}</span> <button
                        onclick="markMessageAsRead('{{ $notification->id }}')">remove</button>
                </div>
            @endforeach
        @endif
    @endauth
    <div id="wrapper">
        @include('layouts.shared/topbar')

        @include('layouts.shared/left-sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
            <!-- content -->

            @include('layouts.shared/footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        function markMessageAsRead(id) {
            $.ajax({
                url: '{{ route('mark-message-read', '') }}/' + id,
                type: "GET",
                success: (response) => {
                    $('#'+id).remove();
                    console.log('message mark as read');
                },
                error: (error) => {
                    console.log(error);
                }
            });
        }
    </script>
    @include('layouts.shared/right-sidebar')

    @include('layouts.shared/footer-script')

</body>

</html>
