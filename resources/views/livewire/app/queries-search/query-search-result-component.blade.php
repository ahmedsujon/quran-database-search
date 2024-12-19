<div>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Word Or Category</th>
                    <th scope="col">Summary Description</th>
                    <th scope="col">Verse Description</th>
                    <th scope="col">Inference Flag</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($final_results as $item)
                    <tr>
                        <td scope="row">{{ $item->word_topic }}</td>
                        <td scope="row">1</td>
                        <td scope="row">1</td>
                        <td scope="row">1</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            {{ $final_results->links('livewire.app-pagination') }}
        </nav>
    </div>
</div>
