<div class="container text-center mt-4 position-relative">
    <div class="row">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- Back button -->
                <a href="{{ route('app.home') }}" class="btn btn-secondary btn-sm position-absolute"
                    style="top: 10px; right: 10px; background-color: #004d00";>
                    Back To Home
                </a>
            </div>
        </div>

        <!-- Main menu items -->
        @foreach ($main_menus as $item)
            <div class="col-md-3 mb-3">
                <a href="{{ route('app.QuerySearch', ['id' => $item->id, 'menu_name' => $item->menu_name]) }}"
                    class="text-decoration-none">
                    <div class="btn btn-outline-success d-flex flex-column justify-content-between text-start py-3"
                        style="min-height: 150px;">
                        <small>
                            {{ $item->menu_name }}
                        </small>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="col-md-3 mb-3">
            <a href="{{ route('app.QuerySearchPartial', ['id' => 23, 'menu_name' => 'How Quran Used Various Words to Describe, Emphasize, or articulate its Message']) }}"
                class="text-decoration-none">
                <div class="btn btn-outline-success d-flex flex-column justify-content-between text-start py-3"
                    style="min-height: 150px;">
                    <small>
                        How Quran Used Various Words to Describe, Emphasize, or articulate its Message.
                    </small>
                </div>
            </a>
        </div>
    </div>
</div>
