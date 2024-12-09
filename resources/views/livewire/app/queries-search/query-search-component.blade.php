<div>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name of Query</th>
                    <th scope="col">Quran Verses</th>
                    <th scope="col">Associated Hadith</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($search_values as $search_value)
                    <tr>
                        <th scope="row">{{ $search_value->topic }}</th>
                        <td>yes</td>
                        <td>no</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

