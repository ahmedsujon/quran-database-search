<div>
    <div class="container text-center mt-4">
        <div class="row">
            @foreach ($main_menus as $item)
                <div class="col-md-3 mb-3">
                    <a href="{{ route('app.QuerySearch', ['id' => $item->id, 'menu_name' => $item->menu_name]) }}" class="text-decoration-none">
                        <div class="btn btn-outline-success d-flex flex-column justify-content-between text-start py-3" style="min-height: 150px;">
                            <small>
                                {{ $item->menu_name }}
                            </small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</div>
