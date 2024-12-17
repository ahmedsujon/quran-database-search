<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" class="form-control form-control-lg" id="searchQuery" placeholder="Search for a query..."
                aria-label="Search for a query" style="height: 40px;" wire:model.live="searchTerm"
                wire:keyup='resetPage' />
        </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-bordered mt-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Word Or Category</th>
                <th scope="col">Summary Description</th>
                <th scope="col">Verse Description</th>
                <th scope="col">Inference Flag</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($querySearchResults as $item)
                <tr>
                    <td scope="row">{{ $item->word_topic }}</td>
                    <td>{{ $item->ayat_summary_des }}</td>
                    <td></td>
                    <td>{{ $item->inferance_flag }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        {{ $querySearchResults->links('livewire.app-pagination') }}
    </nav>
</div>
