<div class="container mt-4">
    <!-- Search Field -->
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" class="form-control form-control-lg" id="searchQuery" placeholder="Search for a query..."
                aria-label="Search for a query" style="height: 40px;" />
        </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-bordered mt-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name of Query</th>
                <th scope="col">Quran Verses</th>
                <th scope="col">Associated Hadith</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($searchValues as $search_value) --}}
            <tr>
                <td scope="row">1</td>
                <td>2</td>
                <td>2</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
